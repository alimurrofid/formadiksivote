<p align="center"><a href="#"><img src="./public/assets/images/logo-formadiksi.png" width="300" alt="Formadiksi Logo"></a></p>

## Formadiksi Vote

🚀 Formadiksi Vote adalah website pemilihan ketua umum formadiksi polinema 2024/2025. Website ini dibuat menggunakan framework laravel 10 dan tailwindcss.

## Contributors

[<img src="https://avatars.githubusercontent.com/u/112758111?v=4" width="54" height="54" style="border-radius: 50%; margin-right: 0.5rem;">](https://github.com/alimurrofid)
[<img src="https://avatars.githubusercontent.com/u/117066099?v=4" width="54" height="54" style="border-radius: 50%; margin-right: 0.5rem;">](https://github.com/Ryansyaaw)
[<img src="https://avatars.githubusercontent.com/u/88068999?v=4" width="54" height="54" style="border-radius: 50%; margin-right: 0.5rem;">](https://github.com/zakyzuf)
[<img src="https://avatars.githubusercontent.com/u/93063866?v=4" width="54" height="54" style="border-radius: 50%; margin-right: 0.5rem;">](https://github.com/gabrieldimas)

## Requirements Installation

requirement:

-   PHP >= 8.1
-   [Composer](https://getcomposer.org/download/)
-   [Node.js](https://nodejs.org/en/download/)
-   [Vscode](https://code.visualstudio.com/download)
-   [Xampp](https://www.apachefriends.org/download.html)

Vscode Extension:

-   Laravel Extension Pack
-   Tailwind CSS Extension Pack
-   PostCSS Language Support

## How to install

1. Clone repository

```sh
git clone https://github.com/alimurrofid/formadiksivote.git
```

2. Install & Update Composer

```sh
composer update
```

3. Copy .env.example to .env

```sh
copy .env.example .env
```

4. Generate Key

```sh
php artisan key:generate
```

5. Migration database

```sh
php artisan migrate
```

6. Seeding database

```sh
php artisan db:seed
```

7. Create the symbolic link

```sh
php artisan storage:link
```

8. Intall npm

```sh
npm install -D tailwindcss postcss autoprefixer
```

9. Install tailwindcss

```sh
npx tailwindcss init -p
```

10. Run npm

```sh
npm run dev
```

11. Run laravel

```sh
php artisan serve
```
