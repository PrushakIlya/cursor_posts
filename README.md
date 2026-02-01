## Requirements

- PHP 8.5+
- MySQL/MariaDB
- Node.js 18+ (for frontend build)
- Composer

## Deploy Application

1. **Copy environment file:**

```bash
cp .env.example .env
```

2. **Build and run Docker containers:**

```bash
docker compose build
docker compose up -d
```

3. **Install PHP dependencies:**

```bash
docker compose exec php composer install
```

4. **Install Node dependencies and build assets:**

```bash
npm install
npm run build
```

5. **Run migrations and seed the database:**

```bash
docker compose exec php php console.php migrate
docker compose exec php php console.php seed
```

6. **Open** http://localhost (Nginx on port 80).

## Console Commands

| Command | Description |
|---------|-------------|
| `php console.php migrate` | Creates database `web_site` (if missing) and runs all migrations |
| `php console.php seed`   | Runs all seeders |
