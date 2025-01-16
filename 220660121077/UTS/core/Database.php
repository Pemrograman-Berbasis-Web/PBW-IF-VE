<?php
$host = "localhost";
$db_name = "todolist_db";
$username = "admin_toto";
$password = "SUMEDANG";

try {
    // Membuat koneksi PDO
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    
    // Mengatur mode error PDO ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Koneksi berhasil!";
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>