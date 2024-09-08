<?php include 'templates\header.php'; ?>
<?php include 'templates\navbar.php'; ?>

<style>
    .quantity-counter-wrapper {
        display: flex;
        align-items: center;
    }

    .quantity-btn {
        background-color: #009933;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s;
        color: white;
    }

    /* .quantity-btn {
        background-color: #009933;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 16px;
    }

    .quantity-btn:hover {
        background-color: #007a29;
    } */

    .quantity-btn:hover {
        background-color: #007a29;
    }

    .quantity-counter {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin: 0 5px;
        padding: 5px;
    }

    .quantity-btn.minus {
        border-radius: 4px 0 0 4px;
    }

    .quantity-btn.plus {
        border-radius: 0 4px 4px 0;
    }
</style>

<form action="#" class="wizard-circle">
    <!-- Checkout Place order starts -->
    <h6><i class="step-icon step feather icon-shopping-cart" hidden></i>Cart</h6>
    <fieldset class="checkout-step-1 px-0">
        <section id="place-order" class="list-view product-checkout">
            <div class="checkout-items">
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="app-assets/images/pages/eCommerce/9.png" alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">Amazon - Fire TV Stick with Alexa Voice Remote - Black</a>
                                <span></span>
                                <p class="item-company">By <span class="company-name">Amazon</span></p>
                                <p class="stock-status-in">In Stock</p>
                            </div>
                            <div class="item-quantity">
                                <p class="quantity-title">Quantity</p>
                                <div class="input-group quantity-counter-wrapper">
                                    <input type="text" class="quantity-counter" value="1">
                                </div>
                            </div>
                            <p class="delivery-date">Delivery by, Wed Apr 25</p>
                            <p class="offers">17% off 4 offers Available</p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        4 <i class="feather icon-star ml-25"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $39.99
                                    </h6>
                                    <p class="shipping">
                                        <i class="feather icon-shopping-cart"></i> Free Shipping
                                    </p>
                                </div>
                            </div>
                            <div class="wishlist remove-wishlist">
                                <i class="feather icon-x align-middle"></i> Remove
                            </div>
                            <div class="cart remove-wishlist">
                                <i class="fa fa-heart-o mr-25"></i> Wishlist
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="app-assets/images/pages/eCommerce/2.png" alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">Apple - Macbook® - Intel Core M5</a>
                                <p class="item-company">By <span class="company-name">Apple</span></p>
                                <p class="stock-status-in">In Stock</p>
                            </div>
                            <div class="item-quantity">
                                <p class="quantity-title">Quantity</p>
                                <div class="input-group quantity-counter-wrapper">
                                    <input type="text" class="quantity-counter" value="1">
                                </div>
                            </div>
                            <p class="delivery-date">Delivery by, Wed Apr 24</p>
                            <p class="offers">7% off 1 offers Available</p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        4 <i class="feather icon-star ml-25"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $1599.99
                                    </h6>
                                    <p class="shipping">
                                        <i class="feather icon-shopping-cart"></i> Free Shipping
                                    </p>
                                </div>
                            </div>
                            <div class="wishlist remove-wishlist">
                                <i class="feather icon-x align-middle"></i> Remove
                            </div>
                            <div class="cart remove-wishlist">
                                <i class="fa fa-heart-o mr-25"></i> Wishlist
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="app-assets/images/pages/eCommerce/3.png" alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">
                                    <span>Google - Chromecast - Black</span>
                                </a>
                                <p class="item-company">By <span class="company-name">Google</span></p>
                                <p class="stock-status-in">In Stock</p>
                            </div>
                            <div class="item-quantity">
                                <p class="quantity-title">Quantity</p>
                                <div class="input-group quantity-counter-wrapper">
                                    <input type="text" class="quantity-counter" value="1">
                                </div>
                            </div>
                            <p class="delivery-date">Delivery by, Wed Apr 27</p>
                            <p class="offers">3% off 1 offers Available</p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        4 <i class="feather icon-star ml-25"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $35
                                    </h6>
                                </div>
                            </div>
                            <div class="wishlist remove-wishlist">
                                <i class="feather icon-x align-middle"></i> Remove
                            </div>
                            <div class="cart remove-wishlist">
                                <i class="fa fa-heart-o mr-25"></i> Wishlist
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="app-assets/images/pages/eCommerce/4.png" alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">
                                    <span>Sharp - 50" Class (49.5" Diag.) - LED - 1080p - Black</span>
                                </a>
                                <p class="item-company">By <span class="company-name">Sharp</span></p>
                                <p class="stock-status-in">In Stock</p>
                            </div>
                            <div class="item-quantity">
                                <p class="quantity-title">Quantity</p>
                                <div class="input-group quantity-counter-wrapper">
                                    <input type="text" class="quantity-counter" value="1">
                                </div>
                            </div>
                            <p class="delivery-date">Delivery by, Wed Apr 29</p>
                            <p class="offers">5% off 2 offers Available</p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        4 <i class="feather icon-star ml-25"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $429.99
                                    </h6>
                                    <p class="shipping">
                                        <i class="feather icon-shopping-cart"></i> Free Shipping
                                    </p>
                                </div>
                            </div>
                            <div class="wishlist remove-wishlist">
                                <i class="feather icon-x align-middle"></i> Remove
                            </div>
                            <div class="cart remove-wishlist">
                                <i class="fa fa-heart-o mr-25"></i> Wishlist
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="app-assets/images/pages/eCommerce/10.png" alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">
                                    <span>Dell - Inspiron 15.6" Touch-Screen Laptop - Black</span>
                                </a>
                                <p class="item-company">By <span class="company-name">Dell</span></p>
                                <p class="stock-status-in">In Stock</p>
                            </div>
                            <div class="item-quantity">
                                <p class="quantity-title">Quantity</p>
                                <div class="input-group quantity-counter-wrapper">
                                    <input type="text" class="quantity-counter" value="1">
                                </div>
                            </div>
                            <p class="delivery-date">Delivery by, Wed Apr 30</p>
                            <p class="offers">3% off 1 offers Available</p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        4 <i class="feather icon-star ml-25"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $499.99
                                    </h6>
                                    <p class="shipping">
                                        <i class="feather icon-shopping-cart"></i> Free Shipping
                                    </p>
                                </div>
                            </div>
                            <div class="wishlist remove-wishlist">
                                <i class="feather icon-x align-middle"></i> Remove
                            </div>
                            <div class="cart remove-wishlist">
                                <i class="fa fa-heart-o mr-25"></i> Wishlist
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="app-assets/images/pages/eCommerce/6.png" alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">
                                    <span>Amazon - Echo Dot</span>
                                </a>
                                <p class="item-company">By <span class="company-name">Amazon</span></p>
                                <p class="stock-status-in">In Stock</p>
                            </div>
                            <div class="item-quantity">
                                <p class="quantity-title">Quantity</p>
                                <div class="input-group quantity-counter-wrapper">
                                    <input type="text" class="quantity-counter" value="1">
                                </div>
                            </div>
                            <p class="delivery-date">Delivery by, Wed Apr 30</p>
                            <p class="offers">6% off 3 offers Available</p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        4 <i class="feather icon-star ml-25"></i>
                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $49.99
                                    </h6>
                                </div>
                            </div>
                            <div class="wishlist remove-wishlist">
                                <i class="feather icon-x align-middle"></i> Remove
                            </div>
                            <div class="cart remove-wishlist">
                                <i class="fa fa-heart-o mr-25"></i> Wishlist
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-options">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <p class="options-title">Options</p>
                            <div class="coupons">
                                <div class="coupons-title">
                                    <p>Coupons</p>
                                </div>
                                <div class="apply-coupon">
                                    <p>Apply</p>
                                </div>
                            </div>
                            <hr>
                            <div class="price-details">
                                <p>Price Details</p>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Total MRP
                                </div>
                                <div class="detail-amt">
                                    $598
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Bag Discount
                                </div>
                                <div class="detail-amt discount-amt">
                                    -25$
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Estimated Tax
                                </div>
                                <div class="detail-amt">
                                    $1.3
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    EMI Eligibility
                                </div>
                                <div class="detail-amt emi-details">
                                    Details
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Delivery Charges
                                </div>
                                <div class="detail-amt discount-amt">
                                    Free
                                </div>
                            </div>
                            <hr>
                            <div class="detail">
                                <div class="detail-title detail-total">Total</div>
                                <div class="detail-amt total-amt">$574</div>
                            </div>
                            <div class="btn btn-primary btn-block place-order">PLACE ORDER</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
    <!-- Checkout Place order Ends -->


</form>

<?php include 'templates\footer.php'; ?>


<!-- <script src="app-assets/vendors/js/vendors.min.js"></script> -->

<script>
    $(document).ready(function() {

        function getCartItems() {
            $.ajax({
                url: 'database/getCartItems.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        let items = response.items;
                        let html = '';

                        items.forEach(function(item) {
                            html += `<div class="card ecommerce-card" data-id="${item.id_prod}" data-id-cart="${item.id}">
                                        <div class="card-content">
                                            <div class="item-img text-center">
                                                <a href="app-ecommerce-details.html">
                                                    <img src="${item.image}" alt="img-placeholder">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-name">
                                                    <a href="detail-product.php?id=${item.id_prod}">${item.product_name}</a>
                                                    <span></span>
                                                    <p class="item-company">By <span class="company-name">Amazon</span></p>
                                                    <p class="stock-status-in">In Stock</p>
                                                </div>
                                                <div class="item-quantity">
                                                    <p class="quantity-title">Quantity</p>
                                                    <div class="input-group quantity-counter-wrapper">
                                                        <button class="quantity-btn minus">-</button>
                                                        <input type="text" class="quantity-counter" value="${item.qty}">
                                                        <button class="quantity-btn plus">+</button>
                                                    </div>
                                                </div>
                                                <p class="delivery-date">Delivery by, Wed Apr 25</p>
                                                <p class="offers">17% off 4 offers Available</p>
                                            </div>
                                            <div class="item-options text-center">
                                                <div class="item-wrapper">
                                                    <div class="item-rating">
                                                        <div class="badge badge-primary badge-md">
                                                            4 <i class="feather icon-star ml-25"></i>
                                                        </div>
                                                    </div>
                                                    <div class="item-cost">
                                                        <h6 class="item-price">$${item.price}</h6>
                                                        <p class="shipping">
                                                            <i class="feather icon-shopping-cart"></i> Free Shipping
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="wishlist remove-wishlist">
                                                    <i class="feather icon-x align-middle"></i> Remove
                                                </div>
                                                <div class="cart remove-wishlist">
                                                    <i class="fa fa-heart-o mr-25"></i> Wishlist
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        });

                        $('.checkout-items').html(html);
                        // loadAdditionalScript('app-assets/vendors/js/vendors.min.js');
                        bindQuantityEvents();
                        bindRemoveEvents();
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

        function loadAdditionalScript(src) {
            var script = document.createElement('script');
            script.src = src;
            script.onload = function() {
                console.log('Additional script loaded successfully.');
            };
            script.onerror = function() {
                console.error('Failed to load the additional script.');
            };
            document.head.appendChild(script);
        }

        function bindQuantityEvents() {
            $('.quantity-btn.minus').on('click', function() {
                var $input = $(this).siblings('.quantity-counter');
                var value = parseInt($input.val(), 10);
                var $card = $(this).closest('.card');
                var productId = $card.data('id');

                if (value > 1) {
                    $input.val(value - 1);
                    updateCart(productId, value - 1);
                }
            });

            $('.quantity-btn.plus').on('click', function() {
                var $input = $(this).siblings('.quantity-counter');
                var value = parseInt($input.val(), 10);
                var $card = $(this).closest('.card');
                var productId = $card.data('id');

                $input.val(value + 1);
                updateCart(productId, value + 1);
            });
        }

        function updateCart(productId, quantity) {
            $.ajax({
                url: 'database/updateCart.php',
                method: 'POST',
                data: {
                    id: productId,
                    quantity: quantity
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log(response.message);
                    } else {
                        console.log('Error:', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        }

        function bindRemoveEvents() {
            $('.remove-wishlist').on('click', function() {
                var $card = $(this).closest('.card');
                var productId = $card.data('id');

                $.ajax({
                    url: 'database/removeCartItem.php',
                    method: 'POST',
                    data: {
                        id: productId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $card.remove(); // Hapus elemen dari tampilan
                            console.log(response.message);
                            getTotalCarts();

                        } else {
                            console.log('Error:', response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            });
        }

        getCartItems();


        function getOrderItems() {
            let orderItems = [];
            $('.card').each(function() {
                let productId = $(this).data('id');
                let cartId = $(this).data('id-cart');
                if (productId && cartId) {
                    orderItems.push({
                        id_prod: productId,
                        id_cart: cartId
                    });
                }
            });
            return orderItems;
        }

        function placeOrder() {
            let orderItems = getOrderItems();

            $.ajax({
                url: 'database/placeOrder.php',
                method: 'POST',
                data: {
                    orderItems: orderItems
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message, 'Success');
                        $('.checkout-items').html('');
                        getTotalCarts();
                        getTotalOrders();


                        // Optionally, redirect or update UI
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        }

        $('.place-order').on('click', function() {
            placeOrder();
        });
    });
</script>




<?php include 'templates\footer_end.php'; ?>