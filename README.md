# task-tracker #

---

### Трекер задач на laravel 8 ###

### Требования к системе ###

* PHP 8.1.0
* PostgreSQL 14.5
* Composer ([установка](https://getcomposer.org/download/))
* Git ([установка](https://git-scm.com/book/ru/v2/%D0%92%D0%B2%D0%B5%D0%B4%D0%B5%D0%BD%D0%B8%D0%B5-%D0%A3%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0-Git))

### Установка ###

1. `git clone git@github.com:Alexey-Ermolenko/task-tracker.git`

2. `cd project folder`

3. `docker-compose up -d`

4. Перейти в контейнер `docker exec -ti task-tracker-phpfpm-1 /bin/sh`, где `task-tracker-phpfpm-1` - имя контейнера

5. Выполнить установку зависимостей `composer install`

6. Выполнить миграции и заполнение данных:

   `php artisan migrate`

   `php artisan db:seed`

7. Веб-приложение доступно на `http://localhost:8083`
