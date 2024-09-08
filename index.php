<?php include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>


<div class="content-here">

    <div class="content-detached">
        <div class="content-body">
            <!-- Ecommerce Content Section Starts -->
            <section id="ecommerce-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                    <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
                                </button>
                                <div class="search-results">
                                    16285 results found
                                </div>
                            </div>
                            <div class="view-options">
                                <!-- <select class="price-options form-control" id="ecommerce-price-options">
                                        <option selected>Featured</option>
                                        <option value="1">Lowest</option>
                                        <option value="2">Highest</option>
                                    </select> -->
                                <div class="view-btn-option">
                                    <button class="btn btn-white view-btn grid-view-btn active">
                                        <i class="feather icon-grid"></i>
                                    </button>
                                    <button class="btn btn-white list-view-btn view-btn">
                                        <i class="feather icon-list"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Content Section Starts -->
            <!-- background Overlay when sidebar is shown  starts-->
            <div class="shop-content-overlay"></div>
            <!-- background Overlay when sidebar is shown  ends-->

            <!-- Ecommerce Search Bar Starts -->
            <section id="ecommerce-searchbar">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <fieldset class="form-group position-relative">
                            <input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Search Bar Ends -->

            <!-- Ecommerce Products Starts -->
            <section id="ecommerce-products" class="grid-view">

            </section>
            <!-- Ecommerce Products Ends -->

            <!-- Ecommerce Pagination Starts -->
            <!-- <section id="ecommerce-pagination">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-2">
                                        <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                        <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section> -->
            <!-- Ecommerce Pagination Ends -->

        </div>
    </div>
</div>



<?php include 'templates/footer.php'; ?>


<script>
    $(document).ready(function() {

        function loadData(search = '') {

            $.ajax({
                url: 'database/getProducts.php', // URL ke file PHP yang mengambil data
                method: 'GET',
                dataType: 'json',
                data: {
                    search: search
                },
                success: function(response) {
                    console.log(response);

                    var html = '';
                    $.each(response, function(index, item) {
                        html += `<div class="card ecommerce-card">
                                <div class="card-content">
                                    <div class="item-img text-center">
                                        <a href="detail-product.php?id=${item.id_prod}">
                                            <img class="img-fluid" src="${item.image}" alt="img-placeholder">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    <span>4</span> <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="item-price">
                                                    $ ${item.price}
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="item-name">
                                            <a href="app-ecommerce-details.html">${item.product_name}</a>
                                            <p class="item-company">By <span class="company-name">Google</span></p>
                                        </div>
                                        <div>
                                            <p class="item-description">
                                                ${item.description}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    <span>4</span> <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="item-cost">
                                                <h6 class="item-price">
                                                    $ ${item.price}
                                                </h6>
                                            </div>
                                        </div>
                                        
                                        <div class="cart">                                       
                                            <i class="feather icon-shopping-cart"></i> <a href="" style="color: white;" class="add-to-cart" data-id="${item.id_prod}">Add to Cart</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>`; // Ganti 'nama_kolom' dengan nama kolom yang ingin ditampilkankan
                    });

                    $('#ecommerce-products').html(html);
                    var count = response.length;
                    $('.search-results').text(count + ' results found');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }

        loadData();

        $('.search-product').on('keyup', function() {
            var search = $(this).val();
            loadData(search);
        });


        $(document).on('click', '.add-to-cart', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);

            // $.ajax({
            //     url: 'database/getDetailProduct.php', // URL ke file PHP yang mengambil data
            //     method: 'GET',
            //     data: {
            //         id: id
            //     }, // Mengirim ID produk sebagai parameter
            //     success: function(response) {
            //         $('.content-here').html(response); // Memuat respons ke dalam kontainer detail produk
            //         // Anda juga bisa memperbarui URL di sini jika diperlukan

            //         var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + '?id=' + id;
            //         history.pushState({
            //             id: id
            //         }, '', newURL);
            //     },
            //     error: function(jqXHR, textStatus, errorThrown) {
            //         console.log('Error: ' + textStatus + ' - ' + errorThrown);
            //     }
            // });

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


        window.addEventListener('popstate', function(event) {
            if (event.state && event.state.id) {
                $.ajax({
                    url: 'detail-product.php',
                    method: 'GET',
                    data: {
                        id: event.state.id
                    },
                    success: function(response) {
                        $('.content-here').html(response); // Memuat respons ke dalam kontainer detail produk
                    }
                });
            } else {
                $('.content-here').empty();
                loadProductList(); // Muat daftar produk saat kembali ke halaman utama
                loadData();
            }
        });

        function saveProductList(data) {
            sessionStorage.setItem('productList', JSON.stringify(data));
        }

        function loadProductList() {
            var savedData = sessionStorage.getItem('productList');
            if (savedData) {
                var data = JSON.parse(savedData);
                // Render daftar produk dari data yang disimpan
                var html = '';
                $.each(response, function(index, item) {
                    html += `<div class="card ecommerce-card">
                                <div class="card-content">
                                    <div class="item-img text-center">
                                        <a href="app-ecommerce-details.html">
                                            <img class="img-fluid" src="${item.image}" alt="img-placeholder">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    <span>4</span> <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="item-price">
                                                    $ ${item.price}
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="item-name">
                                            <a href="app-ecommerce-details.html">${item.product_name}</a>
                                            <p class="item-company">By <span class="company-name">Google</span></p>
                                        </div>
                                        <div>
                                            <p class="item-description">
                                                ${item.description}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    <span>4</span> <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="item-cost">
                                                <h6 class="item-price">
                                                    $ ${item.price}
                                                </h6>
                                            </div>
                                        </div>
                                        
                                        <div class="cart">                                       
                                            <i class="feather icon-shopping-cart"></i> <a href="" style="color: white;" class="add-to-cart" data-id="${item.id_prod}">Buy Now</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>`; // Ganti 'nama_kolom' dengan nama kolom yang ingin ditampilkankan
                });
                $('#ecommerce-products').html(html);
            } else {
                // Jika tidak ada data yang disimpan, muat data dari server
                loadData();
            }
        }
        loadProductList(); // Muat daftar produk dari sessionStorage atau dari server


        $(document).on('click', '#buy-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: 'order.php', // URL ke file PHP yang mengambil data
                method: 'GET',
                data: {
                    id: id
                }, // Mengirim ID produk sebagai parameter
                success: function(response) {
                    $('.content-here').html(response); // Memuat respons ke dalam kontainer detail produk
                    // Anda juga bisa memperbarui URL di sini jika diperlukan

                    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + '?id=' + id;
                    history.pushState({
                        id: id
                    }, '', newURL);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });




    });
</script>


<?php include 'templates/footer_end.php'; ?>