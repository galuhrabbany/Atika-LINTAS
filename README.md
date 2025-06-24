# LINTAS - Laporan Interaktif Titik Sampah

**LINTAS** adalah sistem informasi berbasis web yang dirancang untuk memetakan, mengelola, dan memvisualisasikan laporan titik sampah dari masyarakat secara interaktif dan real-time. Project ini dibangun menggunakan Laravel dan Leaflet.js.

---

## 🧰 Teknologi yang Digunakan

- **Laravel** (Framework backend modern dan elegan)
- **Leaflet.js** (Peta interaktif berbasis JavaScript)
- **DataTables + Buttons** (Tabel laporan interaktif & ekspor data)
- **Bootstrap 5** (Styling responsif)
- **jQuery** (Interaksi dinamis di sisi klien)
- **AJAX** (Load data laporan secara real-time)
- **FontAwesome** (Ikon untuk UX lebih ramah)
- **PostgreSQL + PostGIS** (opsional, untuk dukungan spasial)

---

## 🚀 Fitur Utama

- ✅ Tambah laporan titik sampah melalui peta interaktif
- 🗺️ Visualisasi titik laporan dalam bentuk marker di peta
- 🧭 Fitur geolokasi pengguna: "Lokasi Saya"
- 📅 Statistik laporan: jumlah & update terakhir
- 📤 Ekspor data ke: Excel, CSV, PDF, Print, dan Copy
- 🧾 Form laporan dengan upload gambar
- 🔍 Search & filter data laporan
- 🌐 UI ringan, modern, dan mobile-friendly

---

## 📦 Cara Menjalankan Project

```bash
# Clone project
git clone https://github.com/galuhrabbany/Atika-LINTAS.git
cd lintas

# Install dependency
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate
php artisan db:seed

# Jalankan server
php artisan serve
