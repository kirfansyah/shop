<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Mengatur header agar output berupa JSON
header('Content-Type: application/json');

// Array untuk menyimpan respons
$response = [];

// Mendapatkan ID produk dari POST
$product_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

try {
    if ($product_id > 0) {
        // Hapus item dari keranjang
        $sql = "DELETE FROM tb_carts WHERE id_prod = $product_id";

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Item removed from cart successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $conn->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid product ID.';
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Kesalahan: ' . $e->getMessage();
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);

// Menutup koneksi
$conn->close();
