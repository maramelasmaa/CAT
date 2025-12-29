# CAT

CAT is a Laravel application.

## Setup

1. Install PHP dependencies:

	`composer install`

2. Install frontend dependencies:

	`npm install`

3. Create your environment file:

	`copy .env.example .env`

4. Generate app key:

	`php artisan key:generate`

5. Run migrations + seed demo data:

	`php artisan migrate --seed`

## Demo Accounts (Seeded)

These accounts are created by the seeders for local/demo use:

- Admin
  - Email: `admin@gmail.com`
  - Password: `admin`

- Center Manager
  - Email: `manager@gmail.com`
  - Password: `manager`

