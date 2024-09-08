<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar


// Mengatur header agar output berupa JSON
header('Content-Type: application/json');


// $orderItems = isset($_POST['orderItems']) ? $_POST['orderItems'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderItems = $_POST['orderItems'];

    if (!empty($orderItems)) {

        foreach ($orderItems as $item) {
            $productId = (int)$item['id_prod'];
            $cartId = (int)$item['id_cart'];

            // Insert each item into order_items table
            insertOrderItem($productId, $cartId);
        }



        echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No items in cart.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

function insertOrder()
{
    global $conn; // Database connection

    $query = "INSERT INTO orders (order_date) VALUES (NOW())";
    if (mysqli_query($conn, $query)) {
        return mysqli_insert_id($conn); // Return the newly inserted order ID
    }
    return false;
}

function insertOrderItem($productId, $cartId)
{
    global $conn; // Database connection

    $query = "INSERT INTO tb_orders (id_prod, id_cart) VALUES ($productId, $cartId)";
    mysqli_query($conn, $query);
}


$conn->close();
