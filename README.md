# Laporpak

Laporpak adalah sistem informasi pengaduan masyarakat untuk melaporkan tindak kejahatan kepada pihak kepolisian. Sistem ini dirancang untuk memudahkan masyarakat dalam melaporkan berbagai jenis kejahatan dan membantu polisi dalam menyelesaikan kasus dengan lebih cepat dan efisien.

## Author

Syeich Khalil Annbiya

## Tech Stack

- **Client :** Tailwindcss, Blade Template, Javascript
- **Server :** PHP 8.3 with Laravel 11


## Run Locally

Clone the project

```bash
  git clone https://github.com/khalilannbiya/170-syeich-khalil-annbiya.git
```

Or Download ZIP

[Link](https://github.com/khalilannbiya/170-syeich-khalil-annbiya/archive/refs/heads/main.zip)

Go to the project directory

```bash
  cd 170-syeich-khalil-annbiya
```

I suggest changing the folder/project name to 'laporpak'

Run the command

```bash
  composer update
```

Or

```bash
  composer install
```

Copy the .env file from .env.example.

```bash
  cp .env.example .env
```

Configure the .env file

```bash
  APP_NAME=Laporpak
  APP_ENV=local //for development
  APP_KEY= // run the command php artisan key:generate
  APP_DEBUG=true
  APP_URL=http://laporpak.test

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=db_laporpak
  DB_USERNAME=root
  DB_PASSWORD=
```

Generate key

```bash
  php artisan key:generate
```

You can also run the command "php artisan migrate --seed" to execute the seeders that have been created.

```bash
  php artisan migrate --seed
```

Please, dont forget to run this command

```bash
  php artisan storage:link
```

Install node_modules

```bash
  pnpm i
```

Run npm run dev

```bash
  pnpm dev
```

Run serve

```bash
  php artisan serve
```

Alternatively, if you're using Laragon, you can directly type http://laporpak.test into your browser after running the local server using Laragon

## Documentation

- [Tailwind](https://tailwindcss.com/docs/installation)
- [Blade Template](https://laravel.com/docs/11.x/blade)
- [Laravel](https://laravel.com/docs/11.x)

## Feedback

If you have any feedback, please reach out to us at syeichkhalil@gmail.com
