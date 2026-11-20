# WebGIS Rumah Makan Tataaran

Aplikasi Sistem Informasi Geografis berbasis web untuk menampilkan dan mengelola lokasi rumah makan di wilayah Tataaran. Peta interaktif menggunakan Leaflet.js dengan peta dasar OpenStreetMap.

## Fitur

- Peta interaktif lokasi rumah makan.
- Halaman detail rumah makan.
- Informasi dan foto rumah makan.
- Ulasan dan rating pengunjung.
- Dashboard admin untuk mengelola data rumah makan.
- Penambahan dan pengubahan titik koordinat melalui peta.
- Pengelolaan foto rumah makan.
- Database MySQL/MariaDB.

## Teknologi

- PHP
- MySQL / MariaDB
- HTML, CSS, JavaScript
- Leaflet.js
- OpenStreetMap

## Struktur utama

```text
Webgis_Rumahmakan/
├── admin/                 # Login dan dashboard admin
├── assets/
│   ├── css/               # Tampilan aplikasi
│   ├── js/                # Fungsi peta
│   └── uploads/           # Foto yang diunggah
├── index.php              # Halaman utama
├── detail.php             # Detail rumah makan
├── koneksi.php            # Konfigurasi koneksi database
├── ulasan_simpan.php      # Proses penyimpanan ulasan
├── webgis_rumah_makan_tataaran.sql
├── .env.example           # Contoh konfigurasi hosting
└── README.md
```

## Menjalankan di komputer lokal (XAMPP)

1. Instal dan jalankan Apache serta MySQL melalui XAMPP.
2. Ekstrak folder proyek ke `C:\xampp\htdocs\`.
3. Buka phpMyAdmin melalui `http://localhost/phpmyadmin`.
4. Buat database bernama `webgis_rumah_makan_tataaran`.
5. Pilih database tersebut, lalu impor file `webgis_rumah_makan_tataaran.sql`.
6. Periksa konfigurasi `koneksi.php`. Pengaturan default cocok untuk instalasi XAMPP umum (`localhost`, user `root`, password kosong).
7. Buka `http://localhost/Webgis_Rumahmakan/`.
8. Halaman admin tersedia melalui `http://localhost/Webgis_Rumahmakan/admin/login.php`.

### Membuat akun admin pertama

Database tidak menyertakan akun admin bawaan agar repository public tidak membagikan kredensial default. Setelah impor database, buat hash password menggunakan PHP pada terminal (ganti teks password dengan password kuat pilihan sendiri):

```bash
php -r "echo password_hash('GANTI_DENGAN_PASSWORD_KUAT', PASSWORD_DEFAULT), PHP_EOL;"
```

Salin hash yang dihasilkan, lalu jalankan perintah SQL berikut melalui phpMyAdmin. Ganti `TEMPEL_HASH_BARU_DI_SINI` dengan hash tadi dan ubah username bila diperlukan:

```sql
INSERT INTO admins (username, password_hash)
VALUES ('admin', 'TEMPEL_HASH_BARU_DI_SINI');
```

Setelah itu, masuk melalui `admin/login.php` menggunakan username dan password yang kamu tentukan. Jangan menyimpan password asli ke repository.

## Deployment ke hosting PHP dan MySQL

GitHub menyimpan source code, tetapi GitHub Pages tidak menjalankan PHP atau MySQL. Agar aplikasi dapat diakses sebagai website, gunakan layanan hosting yang mendukung PHP dan MySQL/MariaDB.

1. Siapkan hosting dan domain/subdomain dengan dukungan PHP serta MySQL/MariaDB.
2. Buat database dan user database melalui panel hosting, lalu berikan hak akses user ke database tersebut.
3. Impor `webgis_rumah_makan_tataaran.sql` melalui phpMyAdmin atau fasilitas database pada hosting.
4. Unggah isi folder proyek ke document root website (umumnya `public_html`).
5. Atur environment variables pada panel hosting sesuai data database:
   - `DB_HOST`: host database dari penyedia hosting.
   - `DB_USER`: user database.
   - `DB_PASS`: password database.
   - `DB_NAME`: nama database.
6. Jika hosting tidak menyediakan environment variables, sesuaikan konfigurasi koneksi melalui cara aman yang disediakan penyedia hosting. Jangan commit password database ke repository public.
7. Pastikan folder `assets/uploads/` dapat ditulisi oleh PHP.
8. Ganti password admin awal sebelum website dibuka untuk umum.
9. Uji halaman utama, peta, detail, ulasan, login admin, tambah/edit/hapus data, dan unggah foto.
10. Aktifkan HTTPS/SSL pada domain.

## Publikasi source code di GitHub

1. Buat repository baru di GitHub dengan nama, misalnya `webgis-rumah-makan-tataaran`.
2. Atur visibilitas repository menjadi **Public**.
3. Unggah seluruh isi folder proyek (bukan file ZIP) ke repository.
4. Pastikan `.env` dan kredensial database tidak ikut terunggah.
5. Isi deskripsi repository, misalnya: `WebGIS pemetaan rumah makan di Tataaran menggunakan PHP, MySQL, Leaflet.js, dan OpenStreetMap.`

## Catatan

- Browser perlu izin lokasi untuk fitur yang meminta posisi pengguna. Akses geolokasi umumnya memerlukan HTTPS saat aplikasi sudah online (localhost dikecualikan).
- Peta membutuhkan koneksi internet untuk memuat tile OpenStreetMap dan library eksternal yang digunakan proyek.
- Data lokasi dan isi database contoh perlu diverifikasi kembali sebelum dipakai sebagai informasi publik.
- Periksa kebijakan penggunaan tile OpenStreetMap dan atribusi yang diwajibkan.

## Lisensi

Tambahkan lisensi yang sesuai sebelum mengizinkan penggunaan ulang source code oleh pihak lain. Jika belum menentukan lisensi, repository dapat dibiarkan tanpa file lisensi untuk sementara.
