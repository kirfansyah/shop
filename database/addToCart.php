<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Mendapatkan ID produk dari permintaan POST dan memastikan nilainya integer
$product_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

// Array untuk menyimpan respons
$response = [];

if ($product_id > 0) {
    // Periksa apakah produk sudah ada di keranjang
    $check_sql = "SELECT qty FROM tb_carts WHERE id_prod = $product_id";
    $check_result = $conn->query($check_sql);

    if ($check_result && $check_result->num_rows > 0) {
        // Jika produk sudah ada, ambil jumlah saat ini
        $row = $check_result->fetch_assoc();
        $new_qty = $row['qty'] + 1; // Tambahkan jumlah dengan 1

        // Update jumlah produk yang sudah ada di keranjang
        $update_sql = "UPDATE tb_carts SET qty = $new_qty WHERE id_prod = $product_id";
        $update_result = $conn->query($update_sql);

        if ($update_result) {
            $response['status'] = 'success';
            $response['message'] = 'Jumlah produk berhasil diperbarui!';
            $response['product_id'] = $product_id;
            $response['new_qty'] = $new_qty;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Kesalahan SQL saat memperbarui jumlah: ' . $conn->error;
        }
    } else {
        // Jika produk belum ada, masukkan sebagai entri baru dengan qty = 1
        $insert_sql = "INSERT INTO tb_carts (id_prod, qty) VALUES ($product_id, 1)";
        $insert_result = $conn->query($insert_sql);

        if ($insert_result) {
            $response['status'] = 'success';
            $response['message'] = 'Produk berhasil ditambahkan ke keranjang!';
            $response['product_id'] = $product_id;
            $response['new_qty'] = 1;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Kesalahan SQL saat menambahkan produk: ' . $conn->error;
        }
    }

    // Hitung total produk di keranjang setelah operasi
    $count_sql = "SELECT COUNT(*) AS total_products FROM tb_carts";
    $count_result = $conn->query($count_sql);

    if ($count_result && $row = $count_result->fetch_assoc()) {
        $response['total_products'] = $row['total_products'];
    } else {
        $response['total_products'] = 0;
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'ID produk tidak valid.';
}

// Menutup koneksi
$conn->close();

// Mengatur header agar output berupa JSON
header('Content-Type: application/json');
echo json_encode($response);
