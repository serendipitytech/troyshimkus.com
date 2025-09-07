# Repository Guidelines

## Project Structure & Module Organization

- `src/` — application/source code (components, pages, styles).
- `public/` — static assets served as-is (images, icons, robots.txt).
- `scripts/` — maintenance scripts (build, deploy, data tasks).
- `tests/` — automated tests; may also use `__tests__/` next to code.
- `docs/` — project documentation and design notes.

Example: `src/components/Hero.tsx`, `src/styles/global.css`, `public/favicon.ico`.

## Build, Test, and Development Commands

- `npm run dev` — start local dev server with hot reload.
- `npm run build` — create a production build into `dist/` or `.next/`.
- `npm run start` — serve the production build locally.
- `npm test` — run unit tests in `tests/` and `__tests__/`.
- `npm run lint` / `npm run format` — lint and auto-format the codebase.

Note: If scripts are missing, initialize with `npm init -y` and add them to `package.json`.

## Coding Style & Naming Conventions

- Use 2-space indentation, trailing commas where valid, and single quotes.
- Prefer TypeScript when available; otherwise modern ES modules.
- Filenames: kebab-case for files, PascalCase for React/Vue/Svelte components.
- Variables/functions: camelCase; constants: UPPER_SNAKE_CASE.
- Run Prettier and ESLint before committing: `npm run lint && npm run format`.

## Testing Guidelines

- Framework: Jest or Vitest (recommended). Coverage target: 80% lines/branches.
- Test names: `*.test.ts(x)` or `*.spec.ts(x)`.
- Place fast unit tests near code or in `tests/`; integration/e2e in `tests/`.
- Run locally: `npm test` (use `--watch` while developing).

## Commit & Pull Request Guidelines

- Follow Conventional Commits: `feat:`, `fix:`, `docs:`, `chore:`, `refactor:`, `test:`.
- Keep commits scoped and atomic; include concise imperative subjects.
- PRs must include: summary, linked issues (e.g., `Closes #123`), and screenshots for UI.
- Ensure CI passes: build, lint, tests. Request review before merging.

## Security & Configuration Tips

- Never commit secrets. Use `.env.local` and add `.env*` to `.gitignore`.
- Limit public data in `public/`; review licenses for third-party assets.
- Rotate API keys and restrict tokens to least privilege.

