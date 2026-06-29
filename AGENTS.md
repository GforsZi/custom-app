# AGENTS.md

This file provides high-signal context for OpenCode sessions to improve developer experience and reduce errors.

## Development Workflow
- **Setup:** `composer setup` handles backend dependencies, environment files, database migration, and frontend asset installation.
- **Development Server:** Use `composer dev` to launch the full suite (Laravel server, queue worker, Laravel Pail logs, and Vite) simultaneously.
- **CI/Verification:** Use `composer ci:check` to run the full verification pipeline (linting, formatting, type checking, and tests).

## Testing
- **Framework:** Pest (`pestphp/pest`).
- **Run Tests:** `php artisan test` (or `composer test` to include lint checks).

## Linting & Formatting
- **PHP:** `pint` is used. Use `composer lint` to format or `composer lint:check` for checks.
- **Frontend (Vue/TS):** `eslint` and `prettier` are used.
  - `npm run lint` / `npm run lint:check`
  - `npm run format` / `npm run format:check`
  - `npm run types:check` (uses `vue-tsc`)

## Key Architecture
- **Tech Stack:** Laravel 13, Vue 3, Inertia.js, Filament, Tailwind CSS, TypeScript.
- **Helpers:** Global helper functions are defined in `app/Helpers/App.php`.
- **Filament Resources:** Custom schemas are located in `app/Filament/Resources/{Resource}/Schemas/`.
- **Package Management:** Composer for PHP, NPM for frontend.
- **Permissions:** Spatie `laravel-permission` is used. When managing roles in Filament forms, use `->relationship('roles', 'name')` with `multiple()` to avoid "unknown column" errors.
