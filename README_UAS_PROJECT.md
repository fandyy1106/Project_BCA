# Project UAS Pemrograman Web

## Judul
Backend Company Profile BCA Berbasis Laravel

## Akun Admin Demo
- Email: `admin@project.test`
- Password: `password123`

## Fitur yang Sudah Ditambahkan
1. Authentication manual menggunakan Session Laravel.
2. Password admin disimpan menggunakan Hash.
3. Middleware `admin.session` untuk melindungi halaman admin.
4. Dashboard admin berisi ringkasan jumlah data.
5. CRUD Artikel/Berita.
6. CRUD Profil Perusahaan.
7. CRUD Produk/Layanan.
8. CRUD Galeri.
9. Validasi form menggunakan Laravel validation.
10. Upload gambar pada menu Artikel, Produk, Galeri, dan Profil Perusahaan.
11. Cetak laporan PDF data Produk/Layanan beserta gambar produk.
12. File database SQL: `db_bca_website.sql`.
13. Lembar identitas: `LEMBAR_IDENTITAS_PROJECT_UAS.docx`.

## Cara Menjalankan di Laragon/XAMPP
1. Ekstrak folder project ke `htdocs` atau `www`.
2. Buka terminal di folder project.
3. Jalankan:

```bash
composer install
cp .env.example .env
php artisan key:generate
```

4. Buat database MySQL bernama `db_bca_website`.
5. Import file `db_bca_website.sql` melalui phpMyAdmin.
6. Pastikan konfigurasi `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_bca_website
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=database
```

7. Jalankan server:

```bash
php artisan serve
```

8. Buka website:

```text
http://127.0.0.1:8000
```

9. Login admin:

```text
http://127.0.0.1:8000/login
```

## Menu yang Perlu Ditampilkan Saat Video Demo
1. Login admin.
2. Dashboard admin.
3. Tambah data Produk/Artikel/Galeri.
4. Ubah data.
5. Hapus data.
6. Upload gambar.
7. Cetak report PDF.
8. Logout.

## Catatan Penting
- Ubah isi file `LEMBAR_IDENTITAS_PROJECT_UAS.docx` pada bagian Link GitHub dan Google Drive sebelum dikumpulkan.
- Upload source code ke GitHub.
- Upload video demo ke Google Drive dan pastikan link dapat diakses dosen.


## Catatan Cetak PDF Real

Fitur laporan produk sudah disiapkan untuk memakai DomPDF jika package tersedia. Agar hasil PDF tampil seperti dokumen laporan asli dengan tabel dan kop, jalankan perintah berikut satu kali di terminal project:

```bash
composer require barryvdh/laravel-dompdf
php artisan optimize:clear
php artisan serve
```

Setelah itu login admin, buka menu Produk/Layanan, lalu klik tombol **Cetak PDF Real**. Laporan PDF akan menampilkan tabel produk beserta gambar. Jika gambar belum muncul, pastikan file gambar berada di folder `public/img` atau `public/uploads/products` dan format gambar memakai JPG/PNG agar paling aman terbaca oleh DomPDF.
