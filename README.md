# Description

A REST API that has words that are used in the IT world and are translated into Spanish and German.

## Technologies

-   PHP 8.2.8
-   Composer 2.5.8
-   Laravel v10.18.0
-   MySQL 8
-   PHPUnit 10.3.1
-   NPM 9.6.6
-   NodeJS v14.21.3

## Dev

### Install

```bash
cp .env.example .env
php artisan key:generate
composer install
```

#### Run server

```bash
php artisan serve
```

##### Web access

```
http://127.0.0.1:8000
```

### Create database

```bash
mysql -u root -p
CREATE DATABASE techword
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
```

#### Create user

```bash
GRANT ALL PRIVILEGES ON techword.* TO 'techword-user'@'localhost' IDENTIFIED BY 'xxxxxx';
FLUSH PRIVILEGES;
```

#### Migration

```bash
php artisan migrate
```

### Compile CSS

```bash
npm run dev
npm run build
```

### Testing

#### PHPUnit

##### All the test

```bash
php artisan test
```

##### Specific test

```bash
php artisan test tests/Unit/WordServiceTest.php
```

## Docker

```bash
#docker-compose build
#docker-compose up
# docker run -p 8888:80 myapp
```

### Web access

```
http://localhost
```
