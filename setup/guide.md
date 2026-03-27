# Setup Guide: RedThread

This guide will help you get RedThread running on your local machine.

## Prerequisites
- **PHP**: 8.1 or higher
- **Composer**
- **Node.js** (v18+)

## Configuration Steps

1. **Environment Setup**:
   Copy the example environment file:
   ```bash
   cp .env.example .env
   ```

2. **Database Initialization**:
   This project uses SQLite for local development.
   ```bash
   touch database/database.sqlite
   ```
   In your `.env` file, ensure you have:
   ```dotenv
   DB_CONNECTION=sqlite
   ```

3. **Install Dependencies**:
   Install PHP packages:
   ```bash
   composer update --ignore-platform-reqs
   ```
   Install Node packages:
   ```bash
   npm install
   ```

4. **Application Key**:
   Generate a new application key:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   Set up the database tables:
   ```bash
   php artisan migrate
   ```

## Building Assets

To compile the frontend, run:
```bash
export NODE_OPTIONS=--openssl-legacy-provider
npm run dev
```

## Start Developing

Launch the local server:
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` to see your changes.
