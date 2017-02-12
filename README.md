# OstiumCMS versi 0.0.6
## Content Management System untuk situs web buatan Wolestech
Aplikasi ini dibuat untuk melakukan manajemen konten pada situs web yang dibuat oleh
Wolestech (Software Development Agency). Meski begitu, kami tetap menjadikannya sebagai proyek open source agar semua orang bisa menggunakan dan mengembangkannya menjadi CMS yang lebih baik.

## Peringatan
Aplikasi ini masih dalam tahap awal pengembangan dan belum dapat digunakan sama sekali

##Instalasi (Khusus Windows)
- Download OstiumCMS kemudian ekstrak di dalam folder web server anda, misalnya C:\Program Files\xampp\htdocs
- Buat database dengan nama 'ostium_db' (Anda bisa menggunakan nama lain dengan syarat anda harus mengubah file konfigurasi di folder application\config\database.php
- Import database dengan mengupload file ostium_db.sql yang sudah disediakan pada source code ini
- Jika anda menggunakan pengaturan database yang berbeda, buka folder application\config\database.php kemudian sesuaikan konfigurasi database sesuai dengan yang ada pada sistem database anda seperti username, hostname, password, dsb.
- Selesai, jalankan pada web browser anda.
- Catatan: Jika anda menggunakan virtual machine atau online hosting, anda perlu mengatur base_url di application\config\config.php

##Server Requirement
PHP 5.6 ke atas.
