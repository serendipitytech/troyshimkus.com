#!/usr/bin/env bash
set -euo pipefail

remote="${1:-origin}"

echo "Checking deployment branches against remote: $remote"

branch=$(git rev-parse --abbrev-ref HEAD)
echo "Current branch: $branch"

if [ "$branch" != "main" ]; then
  echo "Note: status is typically checked from main."
fi

echo "Computing subtree split SHAs (this may take a moment)..."
php_sha=$(git subtree split --prefix=apps/php)
next_sha=$(git subtree split --prefix=apps/next)

echo " local php split:   $php_sha"
echo " local next split:  $next_sha"

remote_php=$(git ls-remote --heads "$remote" php-version | awk '{print $1}')
remote_next=$(git ls-remote --heads "$remote" nextjs-version | awk '{print $1}')

echo "remote php-version: ${remote_php:-<none>}"
echo "remote nextjs-version: ${remote_next:-<none>}"

match() {
  local a="$1"; local b="$2"; local name="$3"
  if [ -n "$a" ] && [ -n "$b" ] && [ "$a" = "$b" ]; then
    echo " ✔ $name matches"
  else
    echo " ✖ $name differs"
  fi
}

match "$php_sha" "$remote_php" "php-version"
match "$next_sha" "$remote_next" "nextjs-version"

echo "Done."

