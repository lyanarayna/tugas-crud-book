# CRUD Buku

## Deskripsi Aplikasi
Aplikasi CRUD Buku ini dibuat untuk menambah, menampilkan, mengedit, dan menghapus data buku.

### Entitas Utama
- **Books**: 
  - `id` (INT, auto increment, primary key)  
  - `judul` (VARCHAR 255)  
  - `penulis` (VARCHAR 255)  
  - `tahun_terbit` (YEAR)  
  - `kategori` (VARCHAR 50)  
  - `cover` (VARCHAR 255, menyimpan path file cover)

### Fungsi Aplikasi
- Tambah buku baru (`create.php`)  
- Edit buku (`edit.php`)  
- Hapus buku (`delete.php`)  
- Tampilkan daftar buku (`index.php`) beserta cover  

---

## Spesifikasi Teknis
- **PHP**: 8.x (atau versi yang terpasang)  
- **Database**: MySQL (`book_php`)  
- **Struktur folder**:
config/ → database.php (koneksi database)
uploads/ → menyimpan file cover buku
index.php → halaman daftar buku
create.php → halaman tambah buku
edit.php → halaman edit buku
delete.php → halaman hapus buku
schema.sql → file struktur database
README.md → dokumentasi

- **Class / Modul utama**:
- `Database` → koneksi ke MySQL di `config/database.php`  
- CRUD dilakukan langsung di file PHP (index, create, edit, delete)

---

## Instruksi Menjalankan Aplikasi

1. **Import database**
 - Buka MySQL Workbench atau MySQL CLI  
 - Jalankan file `schema.sql`:
   ```sql
   SOURCE C:/tugasphp-crud/schema.sql;
   ```
   > Pastikan path sesuai lokasi file di komputer kamu  
   > Nama database di `config/database.php` = `book_php`

2. **Jalankan server PHP built-in**
 - Buka terminal / PowerShell
 - Masuk folder project:
   ```powershell
   cd C:\tugasphp-crud
   ```
 - Jalankan server:
   ```powershell
   php -S localhost:8000
   ```

3. **Akses aplikasi di browser**
http://localhost:8000/index.php

---

## Contoh Skenario Uji
1. **Tambah Buku**
- Klik “Tambah Buku” → isi form → klik “Simpan”  
- Data buku muncul di daftar  

2. **Tampilkan Daftar Buku**
- Halaman `index.php` menampilkan semua buku dengan cover  

3. **Edit Buku**
- Klik “Edit” → ubah data → klik “Update”  
- Data buku diperbarui  

4. **Hapus Buku**
- Klik “Delete” → konfirmasi → buku dihapus dari database  

---

## Catatan
- File cover disimpan di folder `uploads/` dengan nama unik (`time()_nama_file`)  
- Path cover disimpan di database, **bukan isi file**  
- Validasi input:
- Teks: wajib diisi, maksimal 255 karakter  
- Tahun: numeric, minimal 1900  
- Kategori: hanya pilihan yang ada di form  
- Cover: hanya `image/jpeg` atau `image/png`, ukuran file dibatasi sesuai limit PHP


