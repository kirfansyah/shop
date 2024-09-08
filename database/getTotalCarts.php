<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar



// Mengatur header agar output berupa JSON
header('Content-Type: application/json');

// Array untuk menyimpan respons
$response = [];

try {
    // Hitung total produk di keranjang
    $count_sql = "SELECT COUNT(*) AS total_products FROM tb_carts";
    $count_result = $conn->query($count_sql);

    if ($count_result && $row = $count_result->fetch_assoc()) {
        $response['status'] = 'success';
        $response['total_products'] = $row['total_products'];
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Gagal menghitung total produk.';
        $response['total_products'] = 0;
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Kesalahan: ' . $e->getMessage();
    $response['total_products'] = 0;
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);

// Menutup koneksi
$conn->close();
