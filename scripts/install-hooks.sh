#!/usr/bin/env bash
set -euo pipefail

has_subtree() { git subtree -h >/dev/null 2>&1; }

repo_root=$(git rev-parse --show-toplevel 2>/dev/null || true)
if [[ -z "${repo_root}" ]]; then
  echo "Not in a git repository." >&2
  exit 1
fi
cd "$repo_root"

hooks_dir=".git/hooks"
mkdir -p "$hooks_dir"

if ! has_subtree; then
  echo "Warning: git-subtree is not available. Install it to enable deploy branches." >&2
fi

cat > "$hooks_dir/pre-push" << 'EOF'
#!/usr/bin/env bash
set -euo pipefail

remote="${1:-origin}"
url="${2:-}"

branch=$(git rev-parse --abbrev-ref HEAD 2>/dev/null || echo "")
if [ "$branch" != "main" ]; then
  exit 0
fi

has_subtree() { git subtree -h >/dev/null 2>&1; }

if ! has_subtree; then
  echo "[subtree] git-subtree not available; skipping deploy branches." >&2
  exit 0
fi

echo "[subtree] Updating deployment branches from main → $remote"

php_branch="php-version"
next_branch="nextjs-version"

# Create/update split branches
php_sha=$(git subtree split --prefix=apps/php -b "$php_branch")
next_sha=$(git subtree split --prefix=apps/next -b "$next_branch")

echo "[subtree] php-version @ $php_sha"
echo "[subtree] nextjs-version @ $next_sha"

# Push to the same remote, bypassing hooks to avoid recursion
git push --no-verify "$remote" "$php_branch:$php_branch"
git push --no-verify "$remote" "$next_branch:$next_branch"

echo "[subtree] Deployment branches pushed to $remote"
exit 0
EOF

cat > "$hooks_dir/post-push" << 'EOF'
#!/usr/bin/env bash
# Note: Most Git installations do not support a client-side post-push hook.
# The effective automation is implemented in pre-push. This file exists to
# satisfy environments that do trigger post-push and for developer clarity.

set -euo pipefail

branch=$(git rev-parse --abbrev-ref HEAD 2>/dev/null || echo "")
if [ "$branch" != "main" ]; then
  exit 0
fi

has_subtree() { git subtree -h >/dev/null 2>&1; }

if ! has_subtree; then
  exit 0
fi

remote="origin"
php_branch="php-version"
next_branch="nextjs-version"

# Ensure split branches exist (idempotent)
php_sha=$(git subtree split --prefix=apps/php -b "$php_branch")
next_sha=$(git subtree split --prefix=apps/next -b "$next_branch")

# Push without triggering hooks to avoid recursion
git push --no-verify "$remote" "$php_branch:$php_branch" || true
git push --no-verify "$remote" "$next_branch:$next_branch" || true

exit 0
EOF

chmod +x "$hooks_dir/pre-push" "$hooks_dir/post-push"
echo "Hooks installed in $hooks_dir"
