# ☕ Cafe Selah

A modern cafe management and ordering system built with Laravel. Cafe Selah helps manage menus, orders, customers, and daily operations through a clean and user-friendly interface.

---

## 📖 About

Cafe Selah is designed to simplify café operations by providing an efficient platform for managing products, customer orders, and administrative tasks.

Whether you're handling dine-in, takeaway, or online orders, Cafe Selah offers an organized workflow that improves productivity and customer experience.

---

## ✨ Features

- 🔐 User Authentication
- 👥 Role-Based Access Control (Admin & Staff)
- ☕ Product/Menu Management
- 📂 Category Management
- 🛒 Order Management
- 💳 Payment Management
- 📊 Dashboard with Statistics
- 🔍 Search & Filtering
- 📱 Responsive Design

---

## 🛠️ Tech Stack

### Backend
- Laravel
- PHP
- MySQL

### Frontend
- Blade Templates
- Bootstrap / Tailwind CSS
- JavaScript

### Development Tools
- Composer
- Git
- GitHub
- Vite

---

## 📁 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
vendor/
.env
artisan
composer.json
README.md
```

---

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/cafe-selah.git
```

### 2. Navigate to the project

```bash
cd cafe-selah
```

### 3. Install dependencies

```bash
composer install
```

```bash
npm install
```

### 4. Copy environment file

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Configure database

Update your `.env` file.

```env
DB_DATABASE=cafe_selah
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Run migrations

```bash
php artisan migrate
```

If you have seeders:

```bash
php artisan db:seed
```

### 8. Build frontend assets

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 9. Start the development server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## 📷 Screenshots

Add screenshots of:

- Login Page
- Dashboard
- Menu Management
- Orders
- Payment
- Reports

Example:

```
docs/
    dashboard.png
    orders.png
    menu.png
```

---

## 🔑 Default Roles

### Admin

- Manage users
- Manage menu
- Manage categories
- View reports
- Manage orders

### Staff

- Create orders
- Update order status
- View menu

---

## 📂 Environment Variables

Example:

```env
APP_NAME="Cafe Selah"
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cafe_selah
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🚀 Available Commands

Run development server

```bash
php artisan serve
```

Run migrations

```bash
php artisan migrate
```

Rollback migrations

```bash
php artisan migrate:rollback
```

Clear cache

```bash
php artisan optimize:clear
```

Run tests

```bash
php artisan test
```

Compile assets

```bash
npm run dev
```

Production build

```bash
npm run build
```

---

## 🤝 Contributing

1. Fork the repository.
2. Create a feature branch.

```bash
git checkout -b feature/new-feature
```

3. Commit your changes.

```bash
git commit -m "Add new feature"
```

4. Push your branch.

```bash
git push origin feature/new-feature
```

5. Open a Pull Request.

---

## 📝 License

This project is licensed under the MIT License.

---

## 👨‍💻 Author

**Sakil Shrestha**

GitHub: https://github.com/sakil-shrestha

---

## ❤️ Acknowledgements

- Laravel
- Bootstrap
- Vite
- MySQL
- PHP Community

---

> Built with ❤️ for Cafe Selah.
