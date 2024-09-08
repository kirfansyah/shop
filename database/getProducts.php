<?php
// Meng-include file koneksi
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : ''; // Mendapatkan nilai pencarian dari AJAX

// Query untuk mengambil data
$sql = "SELECT * FROM tb_product WHERE product_name LIKE '%$search%'"; // Ganti 'tabel_data' dengan nama tabel Anda
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // Mengambil semua data dalam bentuk array asosiatif
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Menutup koneksi
$conn->close();
