# Laravel 6.0+ Frontend preset for GOV.UK Frontend

A Laravel front-end scaffolding preset for [GOV.UK Frontend](https://github.com/alphagov/govuk-frontend).

GOV.UK Frontend contains the code you need to start building a user interface for government platforms and services.

*Current version:* **GOV.UK Frontend 3.5.0**

## Usage

1. Fresh install Laravel >= 6.0.0 and cd to your app.
2. Install this preset via `composer require lukevincent/laravel-govuk-preset:dev-dev`. Laravel will automatically discover this package. No need to register the service provider.
3. Use `php artisan preset govuk` for the basic GOV.UK Frontend preset OR use `php artisan preset govuk-auth` for the basic preset, auth route entry and GOV.UK Frontend auth views in one go. (NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in `routes/web.php`)
4. `npm install && npm run dev`
5. Configure your favorite database (mysql, sqlite etc.)
6. `php artisan migrate` to create basic user tables.
7. `php artisan serve` (or equivalent) to run server and test preset.

### GOV.UK Frontend resources

A [Quick-start](https://github.com/alphagov/govuk-frontend#quick-start) guide is provided by the GOV.UK Frontend maintainers. As well as a [design system](https://design-system.service.gov.uk/) containing background research, styles, components, patterns and community links.
