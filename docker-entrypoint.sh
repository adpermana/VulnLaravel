#!/bin/bash
set -e

# Wait for database connection
echo "Waiting for database connection..."
for i in $(seq 1 30); do
    if php -r "new PDO('mysql:host='.\$_ENV['DB_HOST'].';port='.\$_ENV['DB_PORT'].';dbname='.\$_ENV['DB_DATABASE'], \$_ENV['DB_USERNAME'], \$_ENV['DB_PASSWORD']);" 2>/dev/null; then
        echo "Database connected."
        break
    fi
    sleep 2
done

# Run migrations with retry
echo "Running migrations..."
for i in $(seq 1 5); do
    if php artisan migrate --force 2>&1; then
        echo "Migrations completed."
        break
    fi
    echo "Migration attempt $i failed, retrying in 3 seconds..."
    sleep 3
done

# Only seed if users table is empty
USER_COUNT=$(php -r "try { \$pdo = new PDO('mysql:host='.\$_ENV['DB_HOST'].';port='.\$_ENV['DB_PORT'].';dbname='.\$_ENV['DB_DATABASE'], \$_ENV['DB_USERNAME'], \$_ENV['DB_PASSWORD']); \$stmt = \$pdo->query('SELECT COUNT(*) FROM users'); echo \$stmt->fetchColumn(); } catch(Exception \$e) { echo '0'; }")
if [ "$USER_COUNT" = "0" ]; then
    echo "Running seeders..."
    php artisan db:seed --force
else
    echo "Database already seeded, skipping..."
fi

echo "Clearing cache..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

exec "$@"
