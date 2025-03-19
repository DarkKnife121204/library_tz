# Library_tz

## Установка проекта

Для запуска проекта локально выполните:


```bash
    cp .env.example .env
```
В env заполнить поля mail для отправки уведомлений на почту.

```bash
    composer i
    npm run dev
    vendor/bin/sail build
    vendor/bin/sail up -d
    vendor/bin/sail artisan key:generate
    vendor/bin/sail artisan migrate:fresh --seed
    vendor/bin/sail artisan l5-swagger:generate
```

## Запуск обработки очереди

```bash
vendor/bin/sail artisan queue:work    
```

## Проверка запросов

Все api запросы задокументированы при помощи swagger.
1. http://localhost/api/documentation
