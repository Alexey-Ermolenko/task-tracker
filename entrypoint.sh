#!/bin/bash

# Wait for the database to be ready (replace with the appropriate host and port)
echo "artisan migrate"
# Run migrations
php artisan migrate

# Execute dump scripts
echo "Execute dump scripts"
for file in /var/www/dump/*.sql; do
  if [ -f "$file" ]; then
    echo "Executing dump script: $file"
    echo "PGPASSWORD=root psql -h localost -U root -d task_tracker_db < $file"
    echo "PGPASSWORD=root pg_restore --host=db --username=root --dbname=task_tracker_db < $file"
  fi
done

# Start php-fpm server
exec php-fpm

# PGPASSWORD=root pg_restore --host=db --username=root --dbname=task_tracker_db < /var/www/dump/task_tracker_db_public_users.sql


PGPASSWORD=root psql -h db -U root -d task_tracker_db < /var/www/dump/task_tracker_db_public_users.sql

#pg_restore --host=db --username=root --file=/var/www/dump/task_tracker_db_public_users.sql
