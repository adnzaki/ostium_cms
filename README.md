# OstiumCMS (Early Development)
## Content Management System untuk situs web buatan Wolestech
Aplikasi ini dibuat untuk melakukan manajemen konten pada situs web yang dibuat oleh
Wolestech (Software Development Agency). Meski begitu, kami tetap menjadikannya sebagai proyek open source agar semua orang bisa menggunakan dan mengembangkannya menjadi CMS yang lebih baik. OstiumCMS ditulis dalam bahasa pemrograman PHP berbasis framework CodeIgniter 3.x, kode sumber OstiumCMS ditulis dengan mengikuti standar penulisan kode PHP serta menyesuaikan dengan standar pada Codeigniter dalam beberapa kasus untuk menjaga konsistensi kode, kualitas, mudah dibaca dan di-maintain. Hal ini memungkinkan siapapun yang menguasai framework CodeIgniter untuk dengan mudah memodifikasi OstiumCMS bahkan hingga Core system-nya.

## Peringatan
Aplikasi ini masih dalam tahap awal pengembangan awal dan belum dapat digunakan untuk keperluan produksi.

##Instalasi (Khusus Windows)
- Download OstiumCMS kemudian ekstrak di dalam folder web server anda, misalnya C:\Program Files\xampp\htdocs
- Buat database dengan nama 'ostium_db' (Anda bisa menggunakan nama lain dengan syarat anda harus mengubah file konfigurasi di folder application\config\database.php
- Import database dengan mengupload file ostium_db.sql yang sudah disediakan pada source code ini
- Jika anda menggunakan pengaturan database yang berbeda, buka folder application\config\database.php kemudian sesuaikan konfigurasi database sesuai dengan yang ada pada sistem database anda seperti username, hostname, password, dsb.
- Selesai, jalankan pada web browser anda.

##Server Requirement
PHP 5.6 ke atas.
