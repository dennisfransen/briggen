# Environment Setup

## Api
All terminal commands are done in /api folder

### Setup SQLITE database files

```
$ touch database/database.sqlite
$ touch database/test.sqlite
```

### Update composer files
Installation and updates of composer files which is the library files of Laravel

```
$ composer update
```

### Copy .env.example to .env and .env.testing.example to .env.testing
```
cp .env.example .env
cp .env.testing.example .env.testing
```

### Edit .env file for your local environment
Replace this
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
With this
```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/{PROJECT_DIRECTORY}/api/database/database.sqlite
```

### Edit .env.testing file for your local environment
Correct the path to your test database
```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/{PROJECT_DIRECTORY}/api/database/test.sqlite
```

### Generate APP_KEY
```
$ php artisan key:generate
```

### First time database migrations
When the environment is completely new, run the following commands
```
$ php artisan migrate
$ php artisan passport:install
```
This will generate two sets of clients printed out in the terminal. Copy the second secret printed out and paste in to 
the .env file as follows, where {CLIENT_ID} is usually 2 according to the terminal printout and {CLIENT_SECRET} is a 
series of digits printed out in the terminal.
```dotenv
CLIENT_ID={CLIENT_ID}
CLIENT_SECRET={CLIENT_SECRET}
```

### Everyday commands of the environment

#### Composer update, migrate database and seed it
Done after every git pull
```
$ composer update
$ php artisan migrate
$ php artisan db:seed
```

#### Wipe complete database and load new migrations
```
$ php artisan migrate:fresh
```

### Colors
```
dark-green: #26a96c
dark-blue: #04080f
navy-blue: #266dd3
yankees-blue: #1b2a41
cadet-blue: #58a4b0
```