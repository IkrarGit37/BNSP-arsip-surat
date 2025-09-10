# Sistem Manajemen Arsip Surat (SIMAS) Desa Karangduren
Aplikasi ini dibuat untuk mengarsipkan surat-surat resmi yang pernah dibuat oleh petugas kelurahan Desa Karangduren dengan fitur **CRUD Surat**, **Upload PDF**, dan **CRUD Kategori**.  
Dibangun menggunakan **Laravel 12** dan **TailwindCSS**.

## Fitur Utama
- CRUD Surat (tambah, lihat, edit, hapus).
- CRUD Kategori Surat (tambah, lihat, edit, hapus).
- Relasi surat dengan kategori.
- Upload file PDF surat.
- Preview surat dalam halaman menggunakan `<iframe>`.
- Unduh surat dengan format nama: `kategori_nomorsurat.pdf`.
- Pencarian surat dan kategori.
- Flash message atau Alert untuk notifikasi.

## Teknologi yang Digunakan
- **Framework**: Laravel 12
- **Database**: MySQL
- **CSS Framework**: TailwindCSS
- **Storage**: Laravel Filesystem (local storage)

## Struktur Database
### Tabel `kategoris`
| Kolom        | Tipe Data   | Keterangan             |
|--------------|-------------|------------------------|
| id           | BIGINT      | Primary Key            |
| nama_kategori| VARCHAR(100)| Nama kategori surat    |
| keterangan   | TEXT        | Keterangan kategori    |

### Tabel `surats`
| Kolom        | Tipe Data   | Keterangan                        |
|--------------|-------------|-----------------------------------|
| id           | BIGINT      | Primary Key                       |
| kategori_id  | BIGINT      | Foreign Key ke tabel `kategoris`  |
| nomor_surat  | VARCHAR(255) | Nomor surat                       |
| judul_surat  | VARCHAR(255)| Judul surat                       |
| file         | VARCHAR(255)| File PDF |
| created_at   | TIMESTAMP   | Otomatis dari Laravel             |
| updated_at   | TIMESTAMP   | Otomatis dari Laravel             |

## Cara Instalasi
1. Clone repository ini
   ```bash
   git clone https://github.com/IkrarGit37/BNSP-arsip-surat.git
   cd arsip-surat
   ```
2. Install dependency Laravel
    ```bash
    composer install
    npm install && npm run dev
    ```
3. Copy file `.env.example` menjadi `.env`
    ```bash
    cp .env.example .env
    ```
4. Konfigurasi database di file `.env`
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_arsipsurat
    DB_USERNAME=root
    DB_PASSWORD=
    ```
5. Generate key Laravel
    ```bash
    php artisan key:generate
    ```
6. Import Database
    
    Ada 2 opsi menyiapkan database
    
    **Opsi A: Import file SQL**

    1. Buat database baru bernama ``db_arsipsurat``.
    2. Import file ``db_arsipsurat.sql`` yang ada di folder ``database/``:
        - Lewat phpMyAdmin → pilih database → Import → pilih file db_arsipsurat.sql.
        - Atau lewat terminal:
            ```bash
            mysql -u root -p db_arsipsurat < database/db_arsipsurat.sql
            ```
    **Opsi B: Migrasi Manual**

    - Cukup jalankan migrate & seeder
        ```bash
        php artisan migrate
        ```
7. Jalankan aplikasi
    ```bash
    php artisan serve
    ```

## Screenshot
### Halaman Utama
![Halaman utama](screenshot/Halaman-utama.png)
### Halaman Tambah Surat
- Masih kosong
![Halaman tambah surat 1](screenshot/Halaman-tambah-surat-null.png)
- Sudah terisi
![Halaman tambah surat 2](screenshot/Halaman-tambah-surat-fill.png)
- Alert surat ditambahkan
![Alert surat ditambahkan](screenshot/Halaman-utama-alert-surat-ditambahkan.png)
### Halaman Lihat Surat
- Lihat surat
![Halaman lihat surat](screenshot/Halaman-lihat-surat.png)
![Halaman lihat surat](screenshot/Halaman-lihat-surat-scroll.png)
- Unduh surat
![Unduh surat](screenshot/Halaman-lihat-surat-download.png)
### Halaman Edit Surat
- Before Edit
![Before edit](screenshot/Halaman-edit-surat-before.png)
- After Edit
![After edit](screenshot/Halaman-edit-surat-after.png)
- Alert surat diperbarui
![Alert surat diperbarui](screenshot/Halaman-utama-alert-surat-diperbarui.png)
### Konfirmasi Hapus Surat
![Konfirmasi hapus surat](screenshot/Halaman-utama-konfirmasi-hapus.png)
### Halaman Kategori
![Halaman kategori](screenshot/Halaman-kategori.png)
- Pencarian kategori
![Pencarian kategori](screenshot/Halaman-kategori-pencarian.png)
### Halaman Tambah Kategori
- Masih kosong
![Tambah kategori 1](screenshot/Halaman-tambah-kategori-null.png)
- Sudah terisi
![Tambah kategori 2](screenshot/Halaman-tambah-kategori-fill.png)
- Alert kategori ditambah
![Alert kategori ditambah](screenshot/Halaman-kategori-alert-kategori-bertambah.png)
### Halaman Edit Kategori
- Form edit kategori
![Form edit kategori](screenshot/Halaman-edit-kategori.png)
- Alert kategori diperbarui
![Alert kategori diperbarui](screenshot/Halaman-kategori-alert-kategori-diperbarui.png)
### Konfirmasi Hapus Kategori
- Konfirmasi hapus kategori
![Konfirmasi hapus kategori](screenshot/Halaman-kategori-konfirmasi-hapus.png)
- Alert kategori terhapus
![Alert kategori terhapus](screenshot/Halaman-kategori-alert-kategori-dihapus.png)
### Halaman Tentang
![Halaman tentang](screenshot/Halaman-tentang.png)


---


**IK-RARS'JATI PRAMESTI** <br>
**SISTEM INFORMASI BISNIS** <br>
**POLITEKNIK NEGERI MALANG**
