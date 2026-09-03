-- Pinya Hub Database Schema
-- Import this file into MySQL / MariaDB (phpMyAdmin or CLI)

CREATE DATABASE IF NOT EXISTS php1;
USE php1;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('administrator', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_stocks INT NOT NULL DEFAULT 0,
    date_of_delivery DATE,
    product_status VARCHAR(50) DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: create a default admin account
-- Password is "admin123" (hashed with password_hash)
-- You can also just register via the Sign Up form
INSERT INTO users (username, password, user_type) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'administrator');
-- Note: the hash above is a common example hash for "password".
-- Better: register a new account via the Sign Up form after importing.
