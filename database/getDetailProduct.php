<?php
include 'koneksi.php'; // Pastikan koneksi sudah benar

// Mendapatkan ID produk dari parameter GET
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Pastikan ID adalah integer

// Query untuk mengambil detail produk berdasarkan ID
$sql = "SELECT * FROM tb_product WHERE id_prod = $product_id"; // Ganti 'tabel_produk' dengan nama tabel Anda

$result = $conn->query($sql);

// Periksa apakah query berhasil dan ada hasil
if ($result === false) {
    // Jika query gagal, tampilkan kesalahan SQL    
    echo "SQL Error: " . $conn->error;
} else if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
?>
    <section class="app-ecommerce-details">
        <div class="card">
            <div class="card-body">
                <div class="row mb-5 mt-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="<?= htmlspecialchars($product['image']); ?>" class="img-fluid" alt="product image">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5><?= htmlspecialchars($product['product_name']); ?></h5>
                        <p class="text-muted">by Apple</p>
                        <div class="ecommerce-details-price d-flex flex-wrap">
                            <p class="text-primary font-medium-3 mr-1 mb-0">$<?= htmlspecialchars($product['price']); ?></p>
                            <span class="pl-1 font-medium-3 border-left">
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star text-warning"></i>
                                <i class="feather icon-star text-secondary"></i>
                            </span>
                            <span class="ml-50 text-dark font-medium-1">424 ratings</span>
                        </div>
                        <hr>
                        <p><?= htmlspecialchars($product['description']); ?></p>
                        <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping</p>
                        <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i>EMI options available</p>
                        <hr>
                        <p>Available - <span class="text-success">In stock</span></p>
                        <div class="d-flex flex-column flex-sm-row">
                            <button id="buy-item" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0" data-id="<?= htmlspecialchars($product['id_prod']); ?>"><i class="feather icon-shopping-cart mr-25"></i>BUY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    echo "<p>Product not found.</p>";
}

$conn->close();
?>