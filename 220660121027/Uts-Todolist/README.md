# Todo List Application

Aplikasi Todo List ini memungkinkan pengguna untuk menambahkan, menandai sebagai selesai, mengedit, dan menghapus tugas. Aplikasi ini dibangun menggunakan PHP dan MySQL untuk backend serta HTML, CSS, dan JavaScript untuk tampilan dan interaktivitas.

## Fungsionalitas Utama

1. **Menampilkan Daftar Tugas**  
   Menampilkan semua tugas yang telah ditambahkan oleh pengguna, termasuk status apakah tugas tersebut telah selesai atau belum.

2. **Menambahkan Tugas Baru**  
   Pengguna dapat menambahkan tugas baru yang secara otomatis akan disimpan di database.

3. **Menandai Tugas sebagai Selesai**  
   Pengguna dapat menandai tugas sebagai selesai. Status tugas yang ditandai sebagai selesai akan diperbarui di database.

4. **Menghapus Tugas**  
   Pengguna dapat menghapus tugas dari daftar. Tugas yang dihapus akan dihapus secara permanen dari database.

5. **Mengedit Tugas**  
   Pengguna dapat memperbarui tugas yang ada, seperti mengubah deskripsi tugas atau detail lainnya.

6. **Validasi Input Tugas**  
   Validasi dilakukan untuk memastikan bahwa tugas yang dimasukkan memiliki data yang valid (tidak kosong atau terlalu panjang).

7. **Filter Tugas Berdasarkan Status**  
   Pengguna dapat memfilter daftar tugas untuk melihat semua tugas, tugas yang sudah selesai, atau yang belum selesai.

8. **Pencarian Tugas**  
   Pengguna dapat mencari tugas berdasarkan kata kunci tertentu.

9. **Pagination untuk Daftar Tugas**  
   Daftar tugas dipecah menjadi beberapa halaman jika jumlahnya terlalu banyak untuk ditampilkan dalam satu halaman.

10. **Pengaturan Prioritas Tugas**  
    Pengguna dapat menetapkan prioritas pada setiap tugas (tinggi, sedang, atau rendah) untuk membantu mengelola tugas berdasarkan kepentingannya.

## Struktur Folder

- **index.php**: File utama yang mengarahkan ke halaman utama aplikasi.
- **views/listTodos.php**: File tampilan utama yang menampilkan daftar tugas.
- **assets/css/style.css**: File CSS untuk memperindah tampilan halaman.
- **assets/js/script.js**: File JavaScript untuk memberikan fungsionalitas tambahan pada form dan validasi input.

## Cara Kerja Setiap Fungsionalitas

### 1. Menampilkan Daftar Tugas
   Daftar tugas diambil dari database menggunakan query `SELECT` dan ditampilkan dalam elemen HTML `<ul>` di mana setiap tugas muncul sebagai item `<li>`.

### 2. Menambahkan Tugas Baru
   Pengguna mengisi form untuk menambahkan tugas baru, yang kemudian disimpan di database menggunakan query `INSERT`.

### 3. Menandai Tugas sebagai Selesai
   Pengguna dapat menandai tugas sebagai selesai dengan mengklik link "Mark as completed". Status tugas diperbarui di database menggunakan query `UPDATE`.

### 4. Menghapus Tugas
   Pengguna dapat menghapus tugas dari daftar, yang secara permanen dihapus dari database menggunakan query `DELETE`.

### 5. Mengedit Tugas
   Pengguna dapat mengedit deskripsi tugas yang sudah ada. Setelah diperbarui, data disimpan kembali di database.

### 6. Validasi Input Tugas
   Validasi di sisi client menggunakan JavaScript dan di sisi server menggunakan PHP untuk memastikan data tugas valid.

### 7. Filter Tugas Berdasarkan Status
   Pengguna dapat memfilter daftar tugas berdasarkan statusnya (semua, selesai, belum selesai) menggunakan dropdown atau link filter.

### 8. Pencarian Tugas
   Pengguna dapat mencari tugas berdasarkan kata kunci tertentu. Pencarian dilakukan dengan query `SELECT` yang menggunakan `LIKE` untuk mencari teks.

### 9. Pagination untuk Daftar Tugas
   Jika ada banyak tugas, mereka ditampilkan dalam beberapa halaman dengan query `SELECT` yang menggunakan `LIMIT` dan `OFFSET`.

### 10. Pengaturan Prioritas Tugas
   Pengguna dapat menetapkan prioritas pada setiap tugas. Tampilan daftar tugas akan mengurutkan atau memberikan warna berbeda untuk setiap prioritas.

## Teknologi yang Digunakan

- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Cara Menjalankan Aplikasi

1. **Clone repository ini** ke dalam folder server lokal Anda.
2. **Import database** `todos.sql` ke dalam MySQL.
3. **Atur koneksi database** di file konfigurasi.
4. Buka aplikasi dengan mengakses `index.php` melalui browser.

Aplikasi siap digunakan, dan semua fungsionalitas yang disebutkan di atas dapat diakses dari halaman utama.

---

Dengan aplikasi Todo List ini, Anda dapat mengelola daftar tugas Anda dengan mudah dan efisien. Selamat mencoba!
