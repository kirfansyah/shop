<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Mengatur header agar output berupa JSON
header('Content-Type: application/json');

// Array untuk menyimpan respons
$response = [];

try {
    // Query untuk mengambil semua item dari keranjang dan informasi produk
    $sql = "SELECT a.id_prod, a.qty, b.product_name, b.price, b.image, a.id 
            FROM tb_carts a
            LEFT JOIN tb_product b ON a.id_prod = b.id_prod";
    $result = $conn->query($sql);

    if ($result) {
        $items = [];

        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }

        $response['status'] = 'success';
        $response['items'] = $items; // Mengirimkan seluruh data keranjang
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Gagal mengambil data dari keranjang.';
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Kesalahan: ' . $e->getMessage();
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);

// Menutup koneksi
$conn->close();
