# 🌸 Poem Garden

Poem Garden is a Laravel-based poem sharing web application built for learning full-stack web development using Laravel, PostgreSQL, Blade, authentication, CRUD operations, image uploads, and modern web concepts.

---

# ✨ Features

## Poem CRUD
- Create poems
- Read/View poems
- Update poems
- Delete poems

## Image Upload System
- Upload poem images
- Replace images during update
- Delete images with poems
- Laravel storage integration

## Authentication System
- User registration
- User login/logout
- Session-based authentication
- Password hashing using bcrypt

## Account Management
- View account
- Edit account
- Delete own account
- Protected authenticated routes

## ❤️ Favorite Poems
- Users can favorite/unfavorite poems

## Soft Delete System
- Archive poems instead of permanently deleting them
- Restore support ready

## Search & Filter
- Search poems by:
  - title
  - author
  - body
- Filter poems by genre

## Artisan Statistics Command
Custom Laravel Artisan command to display:
- Total poems
- Poems with images

---

# Tech Stack

- PHP 8.4
- Laravel 13
- PostgreSQL
- Blade Templates
- HTML/CSS
- Laravel Storage System
- Herd (macOS)
- pgAdmin 4

---

# Project Structure

```bash
app/
 ├── Http/Controllers/
 ├── Models/
resources/views/
routes/web.php
database/migrations/
public/
storage/
```

---

# 🚀 Installation

## 1. Clone Repository

```bash
git clone https://github.com/Sujabaral/poem-garden.git
```

## 2. Enter Project

```bash
cd poem-garden
```

## 3. Install Dependencies

```bash
composer install
```

## 4. Create Environment File

```bash
cp .env.example .env
```

## 5. Generate App Key

```bash
php artisan key:generate
```

## 6. Configure Database

Edit `.env`

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=poem_garden
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 7. Run Migrations

```bash
php artisan migrate
```

## 8. Create Storage Link

```bash
php artisan storage:link
```

## 9. Start Server

```bash
php artisan serve
```

Open:

```bash
http://127.0.0.1:8000
```

---

# Image Upload Notes

If images fail to upload or show `413/PostTooLargeException`,
increase PHP upload limits in Herd PHP configuration.

Example:

```ini
upload_max_filesize = 10M
post_max_size = 12M
memory_limit = 256M
```

---

# Learning Goals

This project was built to practice:

- Laravel routing
- MVC architecture
- CRUD operations
- Authentication
- Authorization
- File uploads
- PostgreSQL integration
- Blade templating
- Soft deletes
- Validation
- Sessions
- Artisan commands

---

# Future Improvements

- Comments system
- Likes/reactions
- Poem categories
- Restore archived poems
- Admin dashboard
- Rich text editor
- Pagination
- User profile pictures
- Dark mode
- API support

---

# Author

Suja Baral

GitHub:
https://github.com/Sujabaral

---

# License

This project is for learning and educational purposes.