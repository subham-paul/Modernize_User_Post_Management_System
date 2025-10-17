
# 🚀 Modernize User Post Management System

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

---

### 🧾 Description

**Modernize User Post Management System** is a full-stack web application built using **Laravel**, **PHP**, **MySQL**, **JavaScript**, and **Bootstrap**.  
It enables seamless **user-generated content management** with **role-based authentication**, **secure file uploads**, and **admin moderation**.  
The system provides an efficient and modernized workflow for both users and administrators.

---

## ✨ Key Features

✅ **Role-Based Authentication**
- **Admin:** Approve, edit, and manage user posts.  
- **User:** Create, update, and delete personal posts.  
- Uses Laravel guards and middleware for secure access control.

✅ **Dynamic Post Management**
- CRUD operations for posts.
- Admin approval workflow before publishing.
- Eloquent ORM handles relationships between users and posts.

✅ **Secure Media Uploads**
- Profile and post images stored using Laravel’s Storage system.
- File size/type validation (`jpg`, `png`, `jpeg`, max 2MB).
- Automatically linked to user profiles.

✅ **Modern & Responsive UI**
- Built with **Bootstrap 4** and **JavaScript**.
- Mobile-friendly design and smooth interactivity.

---

## ⚙️ Tech Stack Overview

| Layer | Technology |
|-------|-------------|
| **Backend Framework** | Laravel 10 (PHP 8.x) |
| **Database** | MySQL |
| **Frontend** | Bootstrap 4, JavaScript |
| **ORM** | Laravel Eloquent |
| **Authentication** | Laravel Auth (RBAC) |
| **Storage** | Laravel Filesystem |

---

## 🧩 Project Setup

### 1️⃣ Clone Repository
```bash
git clone https://github.com/subham-paul/Modernize_User_Post_Management_System.git
cd modernize-user-post-management
````

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Configure Environment

```bash
cp .env.example .env
```

Update database credentials inside `.env` file.

### 4️⃣ Generate Key & Run Migrations

```bash
php artisan key:generate
php artisan migrate
```

### 5️⃣ Launch Application

```bash
php artisan serve --port 3000
```

Then visit 👉 [http://localhost:3000](http://localhost:3000)

---

## 🔐 Authentication Workflow

| Role      | Permissions                                          |
| --------- | ---------------------------------------------------- |
| **Admin** | Approve/reject posts, manage users, full access      |
| **User**  | Create, edit, delete own posts, upload profile photo |

---

## 🗂 Folder Structure Overview

```
app/
 ┣── Http/
 ┃    ┣── Controllers/
 ┃    ┗── Middleware/
 ┣── Models/
 ┣── Views/
 ┣── Routes/
public/
 ┣── images/
 ┣── css/
 ┗── js/
resources/
 ┣── views/
database/
 ┗── migrations/
```

---

## 📸 Screenshots (Optional)

> Add screenshots or GIF previews of your app here
> Example:
>
> * Dashboard Interface
> * Admin Panel
> * Post Management Page
> * Profile Upload Section

---

## 💡 Learning Highlights

* Implemented **RBAC (Role-Based Access Control)** using Laravel guards.
* Used **Eloquent ORM** for relational database handling.
* Applied **secure image upload validation** and storage management.
* Built a **responsive, modern UI** with Bootstrap & JS.

---

## 🤝 Contribution Guidelines

Contributions are always welcome!

1. Fork the project
2. Create your feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add new feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a Pull Request

---

## 📜 License

This project is licensed under the **MIT License** – see the [LICENSE](LICENSE) file for details.

---

⭐ *If you like this project, consider giving it a star to show your support!*

