// Fungsi untuk menampilkan pesan saat tugas berhasil ditambahkan
function showAlert(message) {
    alert(message);
}

// Menunggu seluruh konten halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Tangkap form untuk menambah tugas
    const form = document.querySelector('form');
    const taskInput = form.querySelector('input[name="task"]');
    
    // Tambahkan event listener untuk submit form
    form.addEventListener('submit', function(event) {
        // Cegah form dari reload default
        event.preventDefault();

        // Ambil nilai input tugas
        const taskValue = taskInput.value.trim();

        if (taskValue) {
            // Tampilkan pesan tugas berhasil ditambahkan
            showAlert("Tugas berhasil ditambahkan: " + taskValue);

            // Kirim data ke server setelah alert ditampilkan
            form.submit();
        } else {
            // Fokuskan input jika kosong
            taskInput.focus();
        }
    });

    // Konfirmasi sebelum menghapus tugas
    document.querySelectorAll('a[href*="action=delete"]').forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus tugas ini?")) {
                event.preventDefault(); // Batalkan penghapusan
            }
        });
    });

    // Ubah gaya item jika ditandai selesai
    document.querySelectorAll('a[href*="action=complete"]').forEach(function(link) {
        link.addEventListener('click', function() {
            const taskItem = link.closest('li');
            taskItem.classList.add('completed');
        });
    });
});
