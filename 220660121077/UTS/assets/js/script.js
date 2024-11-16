// Menangani respons sukses setelah menyimpan atau mengubah data
function showAlert(message) {
    const alertBox = document.createElement("div");
    alertBox.className = "alert";
    alertBox.textContent = message;

    document.body.appendChild(alertBox);

    // Menghapus notifikasi setelah beberapa detik
    setTimeout(() => {
        alertBox.remove();
    }, 3000);
}

// Menangani perubahan status (toggle selesai/belum selesai)
function toggleTaskStatus(id) {
    fetch(`index.php?action=toggle&id=${id}`, { method: "POST" })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Gagal mengubah status tugas.");
            }
        })
        .then(data => {
            if (data.success) {
                showAlert("Status tugas berhasil diubah!");
                document.getElementById(`task-status-${id}`).textContent = data.newStatus;
            } else {
                showAlert("Gagal mengubah status tugas.");
            }
        })
        .catch(error => console.error(error));
}

// Konfirmasi sebelum menghapus tugas
function confirmDelete(event, id) {
    event.preventDefault();
    if (confirm("Yakin ingin menghapus tugas ini?")) {
        window.location.href = `index.php?action=delete&id=${id}`;
    }
}
