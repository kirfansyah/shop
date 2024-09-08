<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Mengatur header agar output berupa JSON
header('Content-Type: application/json');

// Array untuk menyimpan respons
$response = [];

// Mengambil ID produk dari query string
$product_id = isset($_POST['id']) ? intval($_POST['id']) : 0; // Pastikan ID adalah integer

if ($product_id > 0) {
    try {
        // Query untuk mengambil detail produk
        $sql = "SELECT * FROM tb_product WHERE id_prod = $product_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $response['status'] = 'success';
            $response['product'] = $result->fetch_assoc();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Produk tidak ditemukan.';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = 'Kesalahan: ' . $e->getMessage();
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'ID produk tidak valid.';
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);

// Menutup koneksi
$conn->close();
