<?php
$servername = "localhost"; // Nama server MySQL
$username = "root"; // Username MySQL
$password = ""; // Password MySQL
$dbname = "db_shop"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
