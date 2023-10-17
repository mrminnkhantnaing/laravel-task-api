# TASK API

## About Task API

The Task API is a simple CRUD API project that follows OOP best practices and adheres to SOLID principles. It utilizes Sanctum for authentication. The tests have been implemented, powered by the 'Pest' testing framework, and integrated with GitHub Actions to automatically run tests on 'push' or 'pull' requests to the 'main' branch.

<hr>

## Installation

Clone the repository:

```bash
git clone https://github.com/mrminnkhantnaing/task-api.git
```

Create .env file from .env.example:

```bash
cp .env.example .env
```

Install composer packages:

```bash
composer install
```

Generate application key:

```bash
php artisan key:generate
```

Run migration and seeder:

```bash
php artisan migrate:fresh --seed
```

Run it in localhost:

```bash
php artisan serve
```

Authenticate using the following details

-   Email: frank@example.com
-   Password: password

<hr />

Run the test

```bash
php artisan test
```
