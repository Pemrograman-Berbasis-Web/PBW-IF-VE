di dalam folder assets ada 2 folder yaitu css dan javasript
yang dimana itu untuk mempercantik tampilan pada todolist
-css
di dalam css nya ada file style.css yang isi nya
. Background Gradien pada body
Desain Gradien: Latar belakang halaman body diatur menjadi gradien warna dari kuning (#FFD700) ke pink (#FF69B4). Gradien ini diterapkan dengan sudut 135 derajat, menghasilkan transisi warna yang halus dan menarik.
Fungsionalitas Visual: Memberikan efek visual yang lebih hidup dan ceria, menjadikan halaman aplikasi lebih menarik.
2. Container
.container: Area ini berfungsi untuk membungkus seluruh konten halaman dengan latar putih dan radius yang halus di sudut, menjadikannya lebih menonjol di atas background gradien. box-shadow juga digunakan untuk menciptakan sedikit bayangan di sekitar container, memberikan efek kedalaman.
Padding dan Margin: Menambahkan spasi di sekitar konten, membuat tampilannya lebih rapi dan tidak terlalu menempel ke tepi layar.
3. Tabel Tugas
.todo-table: Tabel ini digunakan untuk menampilkan daftar tugas secara terstruktur dengan kolom dan baris.
Header dan Baris: Baris header memiliki latar biru tua untuk kontras dan teks putih agar terlihat jelas.
Baris Genap dan Hover: Baris genap diberi latar biru muda, dan ketika di-hover, latar berubah menjadi biru pucat untuk memudahkan pengguna menyoroti tugas tertentu.
4. Tombol Aksi
Tombol Tambah (.btn-add): Digunakan untuk menavigasi ke formulir penambahan tugas. Tombol ini memiliki latar biru dan efek hover yang sedikit lebih gelap agar terlihat responsif.
Tombol Toggle, Edit, Delete:
Toggle: Berfungsi untuk menandai status tugas (selesai/belum selesai) dan diatur dengan warna biru kehijauan. Efek hover warna hijau menandakan status aksi ini.
Edit: Berwarna kuning untuk memberikan indikasi bahwa ini adalah tindakan mengubah data, dengan warna hover oranye.
Delete: Merah menyala untuk menunjukkan tindakan yang bersifat destruktif.
5. Alert Box
Fungsi: Digunakan untuk menampilkan pesan konfirmasi jika tugas berhasil ditambahkan, diubah, atau dihapus.
-javasript nya
1. Fungsi Menambahkan Tugas Baru
Mengambil Nilai dari Form: Saat form ditambahkan tugas disubmit, event.preventDefault() mencegah halaman reload.
Mengirim Data ke Server: Data tugas dikirim ke server menggunakan fetch dengan metode POST, dalam bentuk JSON.
Menampilkan Alert Sukses atau Error: Jika tugas berhasil ditambahkan, pesan Tugas berhasil ditambahkan! ditampilkan, dan daftar tugas di-refresh menggunakan loadTodos() untuk menampilkan tugas baru tanpa reload halaman.
2. Fungsi Menghapus Tugas dengan Konfirmasi
Mengonfirmasi Tindakan: Setiap tombol delete memiliki event listener yang memicu konfirmasi saat di-klik.
Menghentikan Aksi Jika Tidak Yakin: Jika pengguna memilih "Batal" pada prompt konfirmasi, event.preventDefault() mencegah tugas dihapus.
3. Fungsi showAlert() untuk Menampilkan Pesan
Membuat Elemen Alert: Fungsi showAlert() membuat elemen div baru dengan pesan dan kelas CSS yang sesuai, berdasarkan tipe pesan (success atau error).
Animasi Alert: setTimeout() memberi efek fade-out secara otomatis pada alert setelah beberapa detik dan kemudian menghapusnya dari halaman.
4. Fungsi loadTodos() untuk Memuat Daftar Tugas Tanpa Reload
Pengambilan Data Tugas: Fungsi ini menggunakan fetch untuk mendapatkan daftar tugas terkini dari server dengan memanggil index.php?action=index.
Pembaruan Daftar Tugas: Teks HTML yang dihasilkan kemudian disematkan ke dalam elemen #todoList, memperbarui daftar tugas tanpa perlu memuat ulang halaman.