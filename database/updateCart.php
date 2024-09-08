<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Mengatur header agar output berupa JSON
header('Content-Type: application/json');

// Array untuk menyimpan respons
$response = [];

// Mendapatkan data dari POST
$product_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

try {
    if ($product_id > 0 && $quantity > 0) {
        // Cek apakah produk sudah ada di keranjang
        $checkSql = "SELECT * FROM tb_carts WHERE id_prod = $product_id";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            // Jika produk sudah ada, update kuantitas
            $sql = "UPDATE tb_carts SET qty = $quantity WHERE id_prod = $product_id";
        } else {
            // Jika produk belum ada, insert baru
            $sql = "INSERT INTO tb_carts (id_prod, qty) VALUES ($product_id, $quantity)";
        }

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Cart updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $conn->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid product ID or quantity.';
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Kesalahan: ' . $e->getMessage();
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);

// Menutup koneksi
$conn->close();
