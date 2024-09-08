<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Mengatur header agar output berupa JSON
header('Content-Type: application/json');

// Array untuk menyimpan respons
$response = [];

// Mendapatkan data dari POST
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

try {
    if ($id > 0) {

        $sql = "UPDATE tb_orders SET status_shipping = 'delivered' WHERE id = $id";

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Order status updated successfully.';
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
