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
    <h6><i class="step-icon step feather icon-shopping-cart" hidden></i>orders</h6>
    <fieldset class="checkout-step-1 px-1">
        <section id="place-order" class="list-view product-checkout">
            <div class="orders-items">
                <!-- Items Here -->
            </div>
        </section>
    </fieldset>
    <!-- Checkout Place order Ends -->


</form>

<?php include 'templates\footer.php'; ?>


<script src="app-assets/vendors/js/vendors.min.js"></script>

<script>
    $(document).ready(function() {

        function getCartItems() {
            $.ajax({
                url: 'database/getOrderItems.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        let items = response.items;
                        let html = '';

                        items.forEach(function(item) {
                            html += `<div class="card ecommerce-card" data-id="${item.id_prod}">
                                        <div class="card-content">
                                            <div class="item-img text-center">
                                                <a href="order.php?id=${item.id_prod}&order_id=${item.id}">
                                                    <img src="${item.image}" alt="img-placeholder">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-name">
                                                    <a href="order.php?id=${item.id_prod}&order_id=${item.id}">${item.product_name}</a>
                                                    <span></span>
                                                    <p class="item-company">By <span class="company-name">Amazon</span></p>
                                                    <p class="stock-status-in">In Stock</p>
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
                                                <div class="wishlist">                                                   
                                                </div>
                                                <div class="cart">
                                                 <a href="order.php?id=${item.id_prod}&order_id=${item.id}" style="color: white;"><i class="fa fa-eye mr-25"></i> See Details</a>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        });

                        $('.orders-items').html(html);
                        loadAdditionalScript('app-assets/vendors/js/vendors.min.js');
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
    });
</script>




<?php include 'templates\footer_end.php'; ?>