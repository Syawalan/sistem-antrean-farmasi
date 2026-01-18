🏥 Sistem Antrean Farmasi - Klinik Pratama Annisa Medika 1
Sistem manajemen antrean berbasis web yang modern dan responsif, dibangun menggunakan Laravel 11 dan Livewire 3. Sistem ini dirancang untuk mendigitalisasi proses pengambilan nomor antrean hingga pengelolaan obat di Klinik Pratama Annisa Medika 1.

✨ Fitur Utama
👨‍👩‍👧‍👦 Fitur Pasien (Public)
Ambil Nomor Antrean: Proses mandiri dengan simulasi pembuatan device token otomatis.

Detail Antrean Real-time: Memantau nomor antrean aktif dan status perjalanan antrean (Ambil Nomor -> Panggilan Loket -> Selesai) menggunakan fitur Livewire Polling.

Daftar Obat: Informasi ketersediaan stok obat secara transparan.

Navigasi Mobile: Desain Mobile-First dengan navigasi bawah yang intuitif.

👨‍⚕️ Fitur Staf & Petugas (Authenticated)
Kontrol Antrean: Antarmuka khusus untuk memanggil nomor, memproses resep, hingga menyelesaikan antrean dengan satu klik.

Riwayat Antrean: Log lengkap seluruh aktivitas antrean berdasarkan hari.

Notifikasi Status: Mengubah status antrean menjadi 'Memanggil', 'Memproses', atau 'Selesai' yang langsung terhubung ke layar pasien.

🛠️ Persiapan Teknis
Sebelum menjalankan aplikasi, pastikan komputer Anda memiliki:

PHP 8.2 atau lebih tinggi.

Composer (Manajer dependensi PHP).

Node.js & NPM (Untuk kompilasi Tailwind CSS).

MySQL sebagai Database.

🚀 Langkah Instalasi
Clone Repositori
1. git clone https://github.com/Syawalan/sistem-antrean-farmasi.git
cd sistem-antrean-farmasi

2. Install Dependensi
composer install
npm install

3. Pengaturan Environment Salin file .env.example ke .env
cp .env.example .env
php artisan key:generate

4. Migrasi Database & Data Dummy Jalankan perintah ini untuk membuat tabel dan akun demo (Admin & Staff):
php artisan migrate --seed

5. Menjalankan Aplikasi Buka dua terminal dan jalankan:
# Terminal 1: Server PHP
php artisan serve

# Terminal 2: Kompilasi Asset (Tailwind & Vite)
npm run dev

🔐 Akun Akses Demo
| Role | Email | Password |
| :--- | :---: | ---: |
| Admin | admin@farmasi.com | password |
| Staff | budi@farmasi.com | password |
| Andi | 30 | Surabaya |

<p align="center"> &copy; 2026 Klinik Pratama Annisa Medika 1. All rights reserved.
