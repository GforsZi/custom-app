# Custom App

A high-performance, flexible application framework designed for advanced customization capabilities, enabling seamless support for diverse use cases across multiple companies.

## About the Project
`custom-app` is a robust enterprise-ready solution built with the modern Laravel/Vue ecosystem. It provides a modular foundation that allows developers to tailor functionality to specific business needs without compromising maintainability. Whether you need custom workflows, unique multi-tenant configurations, or specialized administrative interfaces, this platform is engineered for flexibility.

## Core Technologies
- **Backend:** Laravel 13 (PHP 8.3+)
- **Frontend:** Vue 3, Inertia.js, TypeScript
- **Admin Panel:** Filament PHP (Advanced Resource Management)
- **Styling:** Tailwind CSS (with utility-first approach)
- **Permissions:** Spatie `laravel-permission` for fine-grained access control
- **Database:** Migrations-driven schema management

## Key Features
- **Advanced Customization:** Architecture optimized for multi-company/multi-use-case adaptability.
- **Dynamic Content Management:** Utilize Filament Builder to dynamically create pages, manage content blocks, and implement custom components directly from the admin panel.
- **Dynamic Admin Interface:** Built with Filament to provide a clean, responsive, and powerful administrative experience.
- **Per-Page SEO:** Integrated SEO management features for granular search engine optimization on every page.
- **Robust Security:** Pre-configured with Spatie `laravel-permission` for role-based access control.
- **Modular Frontend Architecture:** Designed for future extensibility, allowing developers to inject new components and designs without being constrained by a rigid UI layout.
- **Modern Workflow:** Integrated Vite build system, ESLint, Prettier, and Pest for comprehensive testing.

## Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/GforsZi/custom-app.git
   cd custom-app
   ```

2. **Install dependencies and setup environment**
   This project includes a convenient setup command that automates installation, environment configuration, database migration, and asset building:
   ```bash
   composer setup
   ```

3. **Development**
   Run the development suite (Laravel server, queue, logs, and Vite) with:
   ```bash
   composer dev
   ```

4. **Testing & Quality Assurance**
   Ensure code quality and run tests using:
   ```bash
   composer ci:check
   ```
