Todo List Application
Aplikasi Todo List ini memungkinkan pengguna untuk menambahkan, menandai sebagai selesai, dan menghapus tugas. Aplikasi ini menggunakan PHP dan MySQL untuk backend serta HTML dan CSS untuk tampilan.

Fungsionalitas Utama

Menampilkan Daftar Tugas: Menampilkan semua tugas yang telah ditambahkan oleh pengguna, termasuk status apakah tugas tersebut telah selesai atau belum.
Menambahkan Tugas Baru: Pengguna dapat menambahkan tugas baru yang secara otomatis akan disimpan di database.
Menandai Tugas sebagai Selesai: Pengguna dapat menandai tugas sebagai selesai. Status tugas yang ditandai sebagai selesai akan diperbarui di database.
Menghapus Tugas: Pengguna dapat menghapus tugas dari daftar. Tugas yang dihapus akan dihapus secara permanen dari database.

Struktur Folder
index.php: File utama yang mengarahkan ke halaman utama aplikasi.
views/listTodos.php: File tampilan utama yang menampilkan daftar tugas.

assets/css/style.css: File CSS untuk memperindah tampilan halaman.
assets/js/script.js: File JavaScript untuk memberikan fungsionalitas tambahan pada form.

Detail Fungsionalitas dan Cara Kerja

1. Menampilkan Daftar Tugas
Deskripsi: Daftar tugas diambil dari database dan ditampilkan dalam bentuk daftar pada halaman utama.
Cara Kerja:
Koneksi ke database dilakukan di bagian atas listTodos.php.
Menggunakan perintah SQL SELECT untuk mengambil semua data dari tabel todos.
Hasil dari query ini ditampilkan dalam elemen <ul>, di mana setiap tugas ditampilkan sebagai item <li>.
Jika tugas belum selesai, link "Mark as completed" ditampilkan di samping tugas tersebut.

2. Menambahkan Tugas Baru
Deskripsi: Pengguna dapat menambahkan tugas baru melalui form di bagian bawah daftar tugas.
Cara Kerja:
Form HTML dengan metode POST dan parameter ?action=add digunakan untuk mengirim data ke server.
Di bagian atas listTodos.php, terdapat logika PHP yang menangani permintaan action=add.
PHP mengecek apakah metode pengiriman adalah POST dan action adalah add.
Jika ya, data tugas yang baru ditambahkan ($_POST['task']) dimasukkan ke database menggunakan perintah SQL INSERT.
Setelah tugas disimpan, pengguna diarahkan kembali ke listTodos.php untuk memperbarui tampilan daftar tugas.

3. Menandai Tugas sebagai Selesai
Deskripsi: Pengguna dapat menandai tugas sebagai selesai dengan mengklik "Mark as completed".
Cara Kerja:
Link "Mark as completed" memiliki parameter ?action=complete&id={id_tugas}, di mana {id_tugas} adalah ID tugas.
Di bagian atas listTodos.php, terdapat logika PHP yang mengecek apakah action adalah complete dan ID ada.
Jika parameter action=complete ada, PHP menjalankan perintah SQL UPDATE untuk mengubah status is_completed pada tugas tersebut menjadi 1.
Setelah perubahan berhasil, pengguna diarahkan kembali ke listTodos.php untuk memperbarui tampilan daftar.

4. Menghapus Tugas
Deskripsi: Pengguna dapat menghapus tugas dari daftar dengan mengklik link "Delete".
Cara Kerja:
Link "Delete" memiliki parameter ?action=delete&id={id_tugas}, di mana {id_tugas} adalah ID tugas.
Di bagian atas listTodos.php, terdapat logika PHP yang mengecek apakah action adalah delete dan ID ada.
Jika parameter action=delete ada, PHP menjalankan perintah SQL DELETE untuk menghapus tugas dari database berdasarkan ID yang diberikan.
Setelah tugas dihapus, pengguna diarahkan kembali ke listTodos.php untuk memperbarui tampilan daftar.