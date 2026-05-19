# 🏫 Manajemen Data Alumni

Aplikasi web sederhana untuk mengelola data alumni sekolah menggunakan PHP Native dan MySQL.
Proyek ini mendukung operasi CRUD (Create, Read, Update, Delete) dan akan dikembangkan lebih lanjut dengan fitur multi-level user (Admin, Super Admin, User).

---

## 🚀 Fitur

* Tampilkan daftar data alumni
* Tambah data alumni baru
* Edit data alumni
* Hapus data alumni
* Sistem login multi-level user (Admin & User)
* Pencarian data alumni
* Desain sederhana dengan native CSS

---

## 🗂️ Struktur Folder

```
/manajemen-data-alumni
│
├── koneksi.php
├── dashboard_admin.php
├── dashboard_user.php
├── tambah.php
├── edit.php
├── delete.php
├── login.php
├── register.php
├── logout.php
├── style/
├── screenshots/
└── database/
```

---

## 🧰 Teknologi yang Digunakan

* PHP 8+ (Native)
* MySQL / MariaDB
* HTML5 & CSS3
* XAMPP (Local Server)

---

## ⚙️ Cara Menjalankan di Lokal

1. Clone repository:
   git clone https://github.com/axl1011/manajemen-data-alumni.git

2. Pindahkan folder ke:
   C:\xampp\htdocs\manajemen-data-alumni

3. Jalankan XAMPP (Apache & MySQL)

4. Buka phpMyAdmin lalu buat database:
   db_alumni

5. Import file SQL dari folder database

6. Jalankan di browser:
   http://localhost/manajemen-data-alumni/

---

## 📸 Preview Tampilan

![Preview Website](screenshots/dashboard.png)

---

## 💡 Rencana Pengembangan

* Role tambahan (Super Admin)
* Sistem keamanan (password hash)
* Export ke Excel / PDF
* UI menggunakan Tailwind CSS
* Responsive mobile

---

## 🔐 LOGIN DEFAULT

| Username | Password |
| -------- | -------- |
| admin    | admin    |
| user     | user     |

💡 Kamu bisa menambahkan akun baru melalui fitur register.

---

## 👨‍💻 Author

Ahmad Axl Baldwin Bonaparte
Fullstack Developer (Learning Phase 🚀)

📧 Email: [ahmadaxlbb@gmail.com](mailto:ahmadaxlbb@gmail.com)
🌐 GitHub: https://github.com/axl1011

---

Made with ❤️ using PHP Native
