<?php
include 'database/koneksi.php'; // Pastikan koneksi sudah benar

// Mendapatkan ID produk dari parameter GET
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Pastikan ID adalah integer
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0; // Pastikan ID adalah integer

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

    <?php include 'templates/header.php'; ?>
    <?php include 'templates/navbar.php'; ?>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <div class="content-here">

        <section class="app-ecommerce-details">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5 mt-2">
                        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                            <div id="map"></div>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5><?= htmlspecialchars($product['product_name']); ?>
                            </h5>
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
                            <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping
                            </p>
                            <p class="font-weight-bold estimated-delivery"> <i class="feather icon-clock mr-50 font-medium-2"></i>Delivery in 1 day
                            </p>
                            <hr>


                            <p>Available - <span class="text-success">In stock</span></p>

                            <div class="d-flex flex-column flex-sm-row">
                                <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="fa fa-phone mr-25"></i> HUBUNGI KURIR</button>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>

    <!-- BATAS -->


<?php
} else {
    echo "<p>Product not found.</p>";
}

$conn->close();
?>


<?php include 'templates/footer.php'; ?>

<!-- JAVASCRIPT DISINI -->

<script>
    var orderId = '<?= $order_id ?>';
    // Initialize the map with a specific location
    var initialLatitude = 0.444329; // Ganti dengan latitude lokasi Anda
    var initialLongitude = 101.454498; // Ganti dengan longitude lokasi Anda

    // Initialize the map
    var map = L.map('map').setView([initialLatitude, initialLongitude], 13);

    // Add a tile layer to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Load custom icon for courier
    var courierIcon = L.icon({
        iconUrl: 'images/kurir.png', // Ganti dengan path ke ikon kurir
        iconSize: [32, 32], // Ukuran ikon
        iconAnchor: [16, 32], // Titik ikon yang tepat di marker
        popupAnchor: [0, -32] // Titik popup relatif terhadap ikon
    });


    // Add a marker for the courier
    var courierMarker = L.marker([initialLatitude, initialLongitude], {
        icon: courierIcon
    }).addTo(map);

    // Initialize the destination marker
    // var destination = [0.30716325761361607, 103.60415235613064]; // MESS LP
    var destination = [0.444329, 101.454498]; // UIR
    var destinationMarker = L.marker(destination).addTo(map);
    destinationMarker.bindPopup('Destination').openPopup();

    var historicalData = [{
            distance: 5000,
            time: 30
        },
        {
            distance: 10000,
            time: 60
        },
        {
            distance: 15000,
            time: 90
        },
        {
            distance: 20000,
            time: 120
        },
        {
            distance: 25000,
            time: 150
        }
    ];

    var regressionData = historicalData.map(function(d) {
        return [d.distance, d.time];
    });

    var result = regression.linear(regressionData);

    function predictTime(distance) {
        var slope = result.equation[0];
        var intercept = result.equation[1];
        var time = slope * distance + intercept;

        // Ensure time is not negative
        return Math.max(time, 0);
    }

    function updateEstimatedTime(distance) {
        var estimatedTime = predictTime(distance);
        var hours = Math.floor(estimatedTime);
        var minutes = Math.round((estimatedTime - hours) * 60);
        $('.estimated-delivery').html(`<i class="feather icon-clock mr-50 font-medium-2"></i>Delivery in ${hours}h ${minutes}m`);
    }


    // Function to calculate distance between two coordinates (in meters)
    function getDistance(lat1, lng1, lat2, lng2) {
        var R = 6371000; // Radius of the Earth in meters
        var dLat = (lat2 - lat1) * Math.PI / 180;
        var dLng = (lng2 - lng1) * Math.PI / 180;
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLng / 2) * Math.sin(dLng / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distance = R * c;
        return distance;
    }

    // Function to estimate arrival time (in hours)
    function estimateArrivalTime(distance, averageSpeed) {
        return distance / averageSpeed; // Time in hours
    }
    // Set average speed (in km/h)
    var averageSpeed = 30000; // Example speed



    // Fetch route data from the server
    $.getJSON('server/dummyData.json', function(data) {
        // Set the route
        var route = data.map(function(point) {
            return [point.latitude, point.longitude];
        });

        // Add route to the map
        polyline.setLatLngs(route);


    });

    // Set up MQTT client using WebSocket
    // var client = mqtt.connect('ws://broker.hivemq.com:8000/mqtt');

    // client.on('connect', function() {
    //     console.log('Connected to HiveMQ broker via WebSocket');
    //     client.subscribe('faturuir2024/location', function(err) {
    //         if (!err) {
    //             console.log('Subscribed to topic: faturuir2024/location');
    //         } else {
    //             console.error('Subscribe error:', err);
    //         }
    //     });
    // });

    // Set up MQTT client using WebSocket
    var client = mqtt.connect('wss://shopkurir-7znl4l.a03.euc1.aws.hivemq.cloud:8884/mqtt', {
        username: 'hivemq.client.1724774300713',
        password: '40w;@1W2KAC?f<lZdxBa'
    });

    var routeControl = L.Routing.control({
        waypoints: [
            L.latLng(initialLatitude, initialLongitude), // Starting point
            L.latLng(destination[0], destination[1]) // Destination
        ],
        routeWhileDragging: false,
        createMarker: function() {
            return null;
        }, // Optional: no additional markers
        showAlternatives: false, // Tidak menampilkan alternatif rute
        summaryTemplate: '<span style="display:none;"></span>', // Menyembunyikan summary keterangan
        lineOptions: {
            styles: [{
                color: 'blue',
                weight: 5,
                opacity: 0.7
            }] // Ubah warna rute menjadi biru
        }
    }).addTo(map);

    client.on('connect', function() {
        console.log('Connected to HiveMQ broker via WebSocket');
        client.subscribe('courier/location', function(err) {
            if (!err) {
                console.log('Subscribed to topic: courier/location');
            } else {
                console.error('Subscribe error:', err);
            }
        });
    });


    // Store the route
    var route = [];
    // Variable to track if destination is reached
    var reachedDestination = false;

    client.on('message', function(topic, message) {
        try {
            var data = JSON.parse(message.toString());
            var lat = data.latitude;
            var lng = data.longitude;
            console.log('Received:', lat, lng);

            // Update marker position
            courierMarker.setLatLng([lat, lng]);
            map.setView([lat, lng]);

            // Update route dynamically
            routeControl.setWaypoints([
                L.latLng(lat, lng), // Update current courier location
                L.latLng(destination[0], destination[1]) // Destination
            ]);


            // // Check if courier has reached the destination
            // var distance = getDistance(lat, lng, destination[0], destination[1]);

            // var estimatedTime = estimateArrivalTime(distance, averageSpeed);
            // var hours = Math.floor(estimatedTime);
            // var minutes = Math.round((estimatedTime - hours) * 60);

            // $('.estimated-delivery').html(`<i class="feather icon-clock mr-50 font-medium-2"></i>Delivery in ${hours}h ${minutes}m`);
            // console.log($('.estimated-delivery'));
            var distance = getDistance(lat, lng, destination[0], destination[1]);

            updateEstimatedTime(distance);


            // Zoom in when the courier is close, zoom out when far
            // if (distance < 500) { // 500 meters threshold for zoom in
            //     map.setView([lat, lng], 15); // Zoom in to level 15
            // } else if (distance >= 500 && distance < 1000) {
            //     map.setView([lat, lng], 13); // Set to default zoom level 13
            // } else {
            //     map.setView([lat, lng], 11); // Zoom out to level 11 when far
            // }

            if (distance < 50 && !reachedDestination) { // 50 meters threshold
                reachedDestination = true;
                console.log('Courier has reached the destination');
                toastr.success('Courier has reached the destination!', 'Arrival Notification');
                updateStatusOrder(orderId);
                $('.estimated-delivery').html(`<i class="feather icon-clock mr-50 font-medium-2"></i>Delivered `);

                client.end(); // Disconnect MQTT client
            }

        } catch (e) {
            console.error('Error parsing message:', e);
        }

        function updateStatusOrder(id) {
            $.ajax({
                url: 'database/updateStatusOrder.php',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {

                        console.log(response.message);
                        getTotalOrders();
                    } else {
                        console.log('Error:', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });

        }
    });
</script>


<!-- END JAVASCRIPT DISINI -->

<?php include 'templates/footer_end.php'; ?>