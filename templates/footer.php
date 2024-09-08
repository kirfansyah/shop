</div>

</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="app-assets/vendors/js/ui/prism.min.js"></script>
<script src="app-assets/vendors/js/extensions/wNumb.js"></script>
<script src="app-assets/vendors/js/extensions/nouislider.min.js"></script>
<script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>
<!-- END: Page JS-->

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.1/socket.io.min.js"></script>

<!-- mqtt -->
<script src="https://cdn.jsdelivr.net/npm/mqtt/dist/mqtt.min.js"></script>

<!-- toastr -->
<!-- BEGIN: Page JS-->
<!-- <script src="app-assets/js/scripts/extensions/toastr.js"></script> -->
<!-- Tambahkan ini sebelum tag penutup </body> di HTML Anda -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- END: Page JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
<script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
<script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>





<!-- BEGIN: Vendor JS-->
<!-- BEGIN Vendor JS-->

<script>
    // $(document).ready(function() {

    function getTotalCarts() {
        $.ajax({
            url: 'database/getTotalCarts.php', // URL ke file PHP yang akan menangani permintaan
            method: 'POST',
            dataType: 'json',
            data: {}, // Tidak perlu mengirimkan data tambahan jika hanya menghitung total
            success: function(response) {
                console.log(response);

                // Memeriksa apakah respons berhasil dan total produk ada
                if (response.status === 'success') {
                    $('.cart-count').text(response.total_products); // Update tampilan jumlah produk di keranjang
                } else {
                    console.log('Error: ' + response.message); // Log error dari respons
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown); // Log error jika ada masalah dengan AJAX
            }
        });
    }

    // Panggil fungsi untuk mendapatkan total produk di keranjang saat halaman dimuat
    getTotalCarts();

    function getTotalOrders() {
        $.ajax({
            url: 'database/getTotalOrders.php', // URL ke file PHP yang akan menangani permintaan
            method: 'POST',
            dataType: 'json',
            data: {}, // Tidak perlu mengirimkan data tambahan jika hanya menghitung total
            success: function(response) {
                console.log(response);

                // Memeriksa apakah respons berhasil dan total produk ada
                if (response.status === 'success') {
                    $('.order-count').text(response.total_products); // Update tampilan jumlah produk di keranjang
                } else {
                    console.log('Error: ' + response.message); // Log error dari respons
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown); // Log error jika ada masalah dengan AJAX
            }
        });
    }

    // Panggil fungsi untuk mendapatkan total produk di keranjang saat halaman dimuat
    getTotalOrders();
    // })
</script>