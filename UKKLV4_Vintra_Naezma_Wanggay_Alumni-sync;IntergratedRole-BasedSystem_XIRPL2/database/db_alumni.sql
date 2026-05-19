CREATE DATABASE db_alumni;
USE db_alumni;

-- =========================
-- TABEL USERS
-- =========================
CREATE TABLE users (

    user_id INT AUTO_INCREMENT PRIMARY KEY,

    username VARCHAR(50) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL,

    role VARCHAR(20) NOT NULL

);

-- =========================
-- TABEL ALUMNI
-- =========================
CREATE TABLE alumni (

    id_alumni INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(100) NOT NULL,

    angkatan INT NOT NULL,

    jurusan VARCHAR(100) NOT NULL

);

-- =========================
-- ADMIN DEFAULT
-- Password: admin123
-- =========================

````````````````````````````````INSERT INTO users(username, password, role)
VALUES (
    'admin',
    '$2y$10$9Qv4D7kM4K7zK7rV2X7g3eL0M5xQz1B4h8M7fT5R2x9J1Yw8FqB8u',
    'admin'
);````````````````````````````````

ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

