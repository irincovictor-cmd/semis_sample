# Pinya Hub

> **Intended repository name:** `pinya-hub`

A PHP product inventory management system with admin and user roles.

Features full CRUD operations for products (name, stock, delivery date, status), DataTables, and a clean Tailwind CSS interface.

---

## Setup (XAMPP / WAMP / local PHP + MySQL)

1. **Import the database**
   - Open phpMyAdmin (or MySQL CLI)
   - Import `database.sql`
   - This creates the database `php1` and the required tables

2. **Place the files**
   - Copy the whole folder into your web root (`htdocs` / `www`)

3. **Run**
   - Go to `http://localhost/semis_sample/` (or whatever folder name you used)

4. **Create an account**
   - Click **Sign Up** on the login page
   - Or create an admin user directly in the database and set `user_type = 'administrator'`

---

## Default Database Config

- Host: `localhost`
- User: `root`
- Password: *(empty)*
- Database: `php1`

Edit `connection.php` and `connection1.php` if your MySQL credentials are different.

---

## Features

- Role-based access (Administrator / User)
- Product CRUD (Add, Edit, Delete)
- Stock & delivery date tracking
- DataTables integration
- Modal-based UI

---

*Academic project — PHP / Inventory System.*
