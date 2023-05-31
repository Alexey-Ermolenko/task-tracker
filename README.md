# task-tracker
### Трекер задач на laravel 8



<hr>

### Установка

1. <code>git clone git@github.com:Alexey-Ermolenko/task-tracker.git</code>

2. <code>cd project folder</code>

3. <code>docker-compose up -d</code>

4. Перейти в контейнер <code>docker exec -ti task-tracker-phpfpm-1 /bin/sh</code>, где <code>task-tracker-phpfpm-1</code> - имя контейнера

5. Выполнить установку зависимостей <code>composer install</code>

6. Выполнить миграции и заполнение данных:

   <code>php artisan migrate</code>

   <code>php artisan db:seed</code>

7. Веб-приложение доступно на <code> http://localhost:8083 </code>
