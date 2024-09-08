<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>

<?php
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') : ''; // Escape ID untuk keamanan
?>

<section class="app-ecommerce-details">

</section>

<?php include 'templates/footer.php'; ?>

<script>
    $(document).ready(function() {
        var productId = '<?php echo $id ?>'; // Ambil ID produk dari PHP

        function getProductDetails(id) {
            $.ajax({
                url: 'database/getProductDetails.php', // URL ke file PHP
                method: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    console.log('Response:', response);

                    if (response.status === 'success') {
                        var product = response.product;
                        let html = '';
                        html += ` <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-5 mt-2">
                                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <img src="${product.image}" class="img-fluid" alt="product image">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <h5>${product.product_name}</h5>
                                                    <p class="text-muted">by Apple</p>
                                                    <div class="ecommerce-details-price d-flex flex-wrap">
                                                        <p class="text-primary font-medium-3 mr-1 mb-0">$43.99</p>
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
                                                    <p>${product.description}</p>
                                                    <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping
                                                    </p>
                                                    <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i>EMI options available
                                                    </p>
                                                    <hr>
                                                    <p>Available - <span class="text-success">In stock</span></p>
                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0 add-to-cart" data-id="${product.id_prod}"><i class="feather icon-shopping-cart mr-25"></i> ADD TO CART</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        $('.app-ecommerce-details').html(html);


                        // Tambahkan elemen lain sesuai kebutuhan
                    } else {
                        console.log('Error:', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                    console.error('Response:', jqXHR.responseText);
                }
            });
        }

        // Ambil detail produk saat halaman dimuat
        getProductDetails(productId);

        $(document).on('click', '.add-to-cart', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);



            $.ajax({
                url: 'database/addToCart.php', // URL ke file PHP yang mengambil data
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                }, // Mengirim ID produk sebagai parameter
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        toastr.success(response.message, 'New Notification');

                    } else {
                        toastr.warning(response.message, 'New Notification');
                    }

                    $('.cart-count').text(response.total_products);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });
    });
</script>


<?php include 'templates/footer_end.php'; ?>