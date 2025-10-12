# 📋 Panduan Instalasi SIPEPO

Panduan lengkap untuk menginstal dan menjalankan aplikasi SIPEPO (Sistem Pendataan Posyandu) dari awal hingga aplikasi dapat berjalan dengan sempurna.

## 🎯 Tujuan Dokumen

Dokumen ini akan memandu Anda untuk:

-   ✅ Menginstal semua software yang diperlukan
-   ✅ Setup proyek SIPEPO dari awal
-   ✅ Konfigurasi database dan environment
-   ✅ Menjalankan aplikasi dengan sukses
-   ✅ Mengatasi masalah yang mungkin terjadi

---

## 📋 Daftar Isi

1. [Persyaratan Sistem](#persyaratan-sistem)
2. [Instalasi Software Dasar](#instalasi-software-dasar)
3. [Setup Proyek SIPEPO](#setup-proyek-sipepo)
4. [Konfigurasi Database](#konfigurasi-database)
5. [Menjalankan Aplikasi](#menjalankan-aplikasi)
6. [Troubleshooting](#troubleshooting)
7. [FAQ](#faq)

---

## 🖥️ Persyaratan Sistem

### Minimum Requirements:

-   **RAM**: 4GB (8GB recommended)
-   **Storage**: 2GB free space
-   **OS**: Windows 10/11, macOS 10.15+, atau Linux Ubuntu 20.04+

### Software yang Diperlukan:

| Software | Versi Minimum | Fungsi                     |
| -------- | ------------- | -------------------------- |
| PHP      | 8.2+          | Backend framework          |
| Composer | 2.0+          | Package manager PHP        |
| Node.js  | 16.0+         | JavaScript runtime         |
| NPM      | 8.0+          | Package manager JavaScript |
| Git      | 2.30+         | Version control            |

---

## 🛠️ Instalasi Software Dasar

### 1. Install PHP 8.2+

#### 🪟 Windows:

```bash
# Opsi 1: Download dari website resmi
# Kunjungi: https://windows.php.net/download/
# Download PHP 8.2+ Thread Safe version

# Opsi 2: Menggunakan XAMPP (Recommended untuk pemula)
# Download dari: https://www.apachefriends.org/
# Install XAMPP yang sudah include PHP 8.2+

# Opsi 3: Menggunakan Chocolatey
choco install php
```

#### 🍎 macOS:

```bash
# Menggunakan Homebrew (Recommended)
brew install php@8.2

# Tambahkan ke PATH
echo 'export PATH="/opt/homebrew/bin/php:$PATH"' >> ~/.zshrc
source ~/.zshrc

# Verifikasi instalasi
php --version
```

#### 🐧 Linux (Ubuntu/Debian):

```bash
# Update package list
sudo apt update

# Install PHP dan ekstensi yang diperlukan
sudo apt install php8.2 php8.2-cli php8.2-common php8.2-mysql \
    php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl \
    php8.2-xml php8.2-bcmath php8.2-sqlite3

# Verifikasi instalasi
php --version
```

### 2. Install Composer

#### 🪟 Windows:

```bash
# Download installer dari: https://getcomposer.org/download/
# Jalankan installer dan ikuti petunjuk

# Atau menggunakan PowerShell:
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"

# Pindahkan ke folder yang ada di PATH
# Biasanya: C:\ProgramData\ComposerSetup\bin\composer.bat
```

#### 🍎 macOS:

```bash
# Download dan install
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Verifikasi instalasi
composer --version
```

#### 🐧 Linux:

```bash
# Download dan install
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Atau menggunakan package manager
sudo apt install composer

# Verifikasi instalasi
composer --version
```

### 3. Install Node.js dan NPM

#### 🪟 Windows:

```bash
# Download dari: https://nodejs.org/
# Pilih LTS version (Long Term Support)
# Jalankan installer dan ikuti petunjuk

# Atau menggunakan Chocolatey
choco install nodejs

# Verifikasi instalasi
node --version
npm --version
```

#### 🍎 macOS:

```bash
# Menggunakan Homebrew
brew install node

# Atau download dari website
# Kunjungi: https://nodejs.org/

# Verifikasi instalasi
node --version
npm --version
```

#### 🐧 Linux:

```bash
# Menggunakan NodeSource repository
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt-get install -y nodejs

# Atau menggunakan snap
sudo snap install node --classic

# Verifikasi instalasi
node --version
npm --version
```

### 4. Install Git

#### 🪟 Windows:

```bash
# Download dari: https://git-scm.com/download/win
# Jalankan installer dan ikuti petunjuk

# Atau menggunakan Chocolatey
choco install git
```

#### 🍎 macOS:

```bash
# Menggunakan Homebrew
brew install git

# Atau download dari website
# Kunjungi: https://git-scm.com/download/mac
```

#### 🐧 Linux:

```bash
# Ubuntu/Debian
sudo apt install git

# CentOS/RHEL
sudo yum install git

# Verifikasi instalasi
git --version
```

---

## 📁 Setup Proyek SIPEPO

### 1. Clone Repository

```bash
# Buka terminal/command prompt
# Navigasi ke folder yang diinginkan
cd /path/to/your/projects

# Clone repository (ganti URL dengan repository yang sebenarnya)
git clone https://github.com/username/SIPEPO.git

# Masuk ke folder proyek
cd SIPEPO

# Verifikasi struktur folder
ls -la  # Linux/macOS
dir     # Windows
```

### 2. Install Dependencies PHP

```bash
# Install dependencies menggunakan Composer
composer install

# Tunggu hingga proses selesai
# Proses ini akan mengunduh semua package PHP yang diperlukan
```

**Output yang diharapkan:**

```
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: X installs, Y updates, Z removals
Writing lock file
Generating optimized autoload files
```

### 3. Install Dependencies JavaScript

```bash
# Install dependencies menggunakan NPM
npm install

# Tunggu hingga proses selesai
# Proses ini akan mengunduh semua package JavaScript yang diperlukan
```

**Output yang diharapkan:**

```
npm WARN deprecated some-package@1.0.0: This package is deprecated
added 1234 packages, and audited 1234 packages in 30s
found 0 vulnerabilities
```

### 4. Setup Environment

```bash
# Copy file environment template
cp .env.example .env

# Generate application key
php artisan key:generate
```

**Verifikasi file .env:**

```bash
# Pastikan file .env sudah dibuat
ls -la .env  # Linux/macOS
dir .env     # Windows

# Buka file .env dan pastikan ada baris:
# APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

---

## 🗄️ Konfigurasi Database

### 1. Konfigurasi SQLite (Default - Recommended)

```bash
# Pastikan file database SQLite ada
touch database/database.sqlite  # Linux/macOS
type nul > database\database.sqlite  # Windows

# Verifikasi file database
ls -la database/database.sqlite  # Linux/macOS
dir database\database.sqlite     # Windows
```

**Konfigurasi di file .env:**

```env
DB_CONNECTION=sqlite
# DB_DATABASE=database/database.sqlite  # Uncomment jika diperlukan
```

### 2. Konfigurasi MySQL (Opsional)

Jika ingin menggunakan MySQL, edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sipepo
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Setup MySQL:**

```bash
# Login ke MySQL
mysql -u root -p

# Buat database
CREATE DATABASE sipepo;
CREATE USER 'sipepo_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON sipepo.* TO 'sipepo_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Jalankan Migrasi Database

```bash
# Jalankan migrasi untuk membuat tabel
php artisan migrate

# Output yang diharapkan:
# Migration table created successfully.
# Migrating: 2025_10_12_035214_create_balitas_table
# Migrated:  2025_10_12_035214_create_balitas_table (XXms)
# Migrating: 2025_10_12_035218_create_ibu_hamils_table
# Migrated:  2025_10_12_035218_create_ibu_hamils_table (XXms)
# Migrating: 2025_10_12_035223_create_lansias_table
# Migrated:  2025_10_12_035223_create_lansias_table (XXms)
# Migrating: 2025_10_12_040551_add_role_to_users_table
# Migrated:  2025_10_12_040551_add_role_to_users_table (XXms)
```

### 4. Jalankan Seeder (Data Admin)

```bash
# Jalankan seeder untuk membuat data admin
php artisan db:seed

# Output yang diharapkan:
# Database seeding completed successfully.
```

---

## 🚀 Menjalankan Aplikasi

### 1. Build Assets

```bash
# Build CSS dan JavaScript untuk production
npm run build

# Output yang diharapkan:
# vite v7.0.4 building for production...
# ✓ 123 modules transformed.
# dist/manifest.json   0.12 kB │ gzip:  0.11 kB
# dist/assets/app-xxxxx.css   2.34 kB │ gzip:  1.20 kB
# dist/assets/app-xxxxx.js    1.23 kB │ gzip:  0.65 kB
```

### 2. Jalankan Server Development

```bash
# Jalankan server Laravel
php artisan serve

# Output yang diharapkan:
# Starting Laravel development server: http://127.0.0.1:8000
# [Wed Oct 12 10:30:00 2025] PHP 8.2.0 Development Server (http://127.0.0.1:8000) started
```

### 3. Akses Aplikasi

Buka browser dan kunjungi:

-   **URL**: `http://localhost:8000` atau `http://127.0.0.1:8000`
-   **Login**: `http://localhost:8000/login`

### 4. Login dengan Akun Admin

Gunakan salah satu akun berikut:

| Email             | Password | Role          |
| ----------------- | -------- | ------------- |
| admin1@sipepo.com | admin123 | Administrator |
| admin2@sipepo.com | admin123 | Administrator |
| admin3@sipepo.com | admin123 | Administrator |

---

## 🔧 Development Mode

### 1. Hot Reload untuk Development

```bash
# Terminal 1: Jalankan server Laravel
php artisan serve

# Terminal 2: Jalankan Vite dengan hot reload
npm run dev

# Output yang diharapkan:
# VITE v7.0.4  ready in 1234 ms
# ➜  Local:   http://localhost:5173/
# ➜  Network: use --host to expose
```

### 2. Perintah Development Berguna

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Regenerate autoload
composer dump-autoload

# Jalankan migrasi ulang
php artisan migrate:fresh --seed

# Lihat semua route
php artisan route:list

# Lihat log aplikasi
tail -f storage/logs/laravel.log  # Linux/macOS
type storage\logs\laravel.log    # Windows
```

---

## 🐛 Troubleshooting

### 1. Error "Class not found"

**Penyebab**: Autoloader belum diupdate
**Solusi**:

```bash
composer dump-autoload
```

### 2. Error "Permission denied"

**Penyebab**: Folder tidak memiliki permission yang tepat
**Solusi**:

```bash
# Linux/macOS
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Windows (jalankan sebagai Administrator)
icacls storage /grant Everyone:F /T
icacls bootstrap\cache /grant Everyone:F /T
```

### 3. Error "Database connection"

**Penyebab**: Konfigurasi database salah
**Solusi**:

```bash
# Periksa file .env
cat .env | grep DB_  # Linux/macOS
type .env | findstr DB_  # Windows

# Pastikan konfigurasi benar
# Untuk SQLite, pastikan file database ada
ls -la database/database.sqlite  # Linux/macOS
dir database\database.sqlite     # Windows

# Jalankan migrasi ulang
php artisan migrate:fresh
```

### 4. Error "Assets not found"

**Penyebab**: Assets belum di-build
**Solusi**:

```bash
# Build assets
npm run build

# Atau untuk development
npm run dev
```

### 5. Error "Key not found"

**Penyebab**: Application key belum di-generate
**Solusi**:

```bash
php artisan key:generate
```

### 6. Error "Port already in use"

**Penyebab**: Port 8000 sudah digunakan
**Solusi**:

```bash
# Gunakan port lain
php artisan serve --port=8080

# Atau matikan proses yang menggunakan port 8000
# Windows
netstat -ano | findstr :8000
taskkill /PID <PID> /F

# Linux/macOS
lsof -ti:8000 | xargs kill -9
```

### 7. Error "Composer not found"

**Penyebab**: Composer tidak terinstall atau tidak ada di PATH
**Solusi**:

```bash
# Install ulang Composer
# Ikuti langkah instalasi Composer di atas

# Atau gunakan composer.phar
php composer.phar install
```

### 8. Error "Node.js not found"

**Penyebab**: Node.js tidak terinstall atau tidak ada di PATH
**Solusi**:

```bash
# Install ulang Node.js
# Ikuti langkah instalasi Node.js di atas

# Atau gunakan npx
npx npm install
```

---

## ❓ FAQ (Frequently Asked Questions)

### Q: Apakah SIPEPO bisa dijalankan di hosting shared?

**A**: Ya, asalkan hosting mendukung PHP 8.2+ dan memiliki akses ke database MySQL/SQLite.

### Q: Bagaimana cara backup data?

**A**:

```bash
# Backup database SQLite
cp database/database.sqlite backup/database_$(date +%Y%m%d).sqlite

# Backup database MySQL
mysqldump -u username -p sipepo > backup/sipepo_$(date +%Y%m%d).sql
```

### Q: Bagaimana cara update aplikasi?

**A**:

```bash
# Pull perubahan terbaru
git pull origin main

# Update dependencies
composer install
npm install

# Jalankan migrasi jika ada
php artisan migrate

# Build assets
npm run build
```

### Q: Apakah bisa menggunakan database PostgreSQL?

**A**: Ya, edit file `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=sipepo
DB_USERNAME=postgres
DB_PASSWORD=password
```

### Q: Bagaimana cara mengubah port server?

**A**:

```bash
# Gunakan port 8080
php artisan serve --port=8080

# Atau port 3000
php artisan serve --port=3000
```

### Q: Apakah ada cara untuk menjalankan tanpa command line?

**A**: Ya, gunakan XAMPP/WAMP:

1. Copy folder proyek ke `htdocs` (XAMPP) atau `www` (WAMP)
2. Akses melalui `http://localhost/SIPEPO/public`
3. Pastikan Apache dan MySQL sudah running

---

## 📞 Bantuan dan Support

Jika mengalami masalah yang tidak tercantum di atas:

### 📧 Kontak Support:

-   **Email**: support@sipepo.com
-   **Telepon**: (0721) 1234567
-   **Alamat**: Posyandu Desa Hajimena, Kecamatan Natar, Kabupaten Lampung Selatan

### 🔍 Debugging:

```bash
# Aktifkan debug mode di .env
APP_DEBUG=true
APP_ENV=local

# Lihat log detail
tail -f storage/logs/laravel.log
```

### 📚 Dokumentasi Tambahan:

-   [Laravel Documentation](https://laravel.com/docs)
-   [Tailwind CSS Documentation](https://tailwindcss.com/docs)
-   [Vite Documentation](https://vitejs.dev/guide/)

---

## ✅ Checklist Instalasi

-   [ ] PHP 8.2+ terinstall
-   [ ] Composer terinstall
-   [ ] Node.js dan NPM terinstall
-   [ ] Git terinstall
-   [ ] Repository SIPEPO di-clone
-   [ ] Dependencies PHP diinstall (`composer install`)
-   [ ] Dependencies JavaScript diinstall (`npm install`)
-   [ ] File `.env` dibuat dan dikonfigurasi
-   [ ] Application key di-generate
-   [ ] Database dikonfigurasi
-   [ ] Migrasi database dijalankan
-   [ ] Seeder dijalankan
-   [ ] Assets di-build
-   [ ] Server Laravel dijalankan
-   [ ] Aplikasi bisa diakses di browser
-   [ ] Login berhasil dengan akun admin

---

**🎉 Selamat! SIPEPO sudah siap digunakan!**

_Dokumen ini dibuat untuk memudahkan instalasi dan setup aplikasi SIPEPO. Jika ada pertanyaan atau masalah, jangan ragu untuk menghubungi tim support._
