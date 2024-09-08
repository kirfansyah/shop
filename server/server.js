const mqtt = require('mqtt');
const express = require('express');
const app = express();
const port = 3000;
const fs = require('fs');

// MQTT client setup
const mqttClient = mqtt.connect('mqtts://shopkurir-7znl4l.a03.euc1.aws.hivemq.cloud:8883', {
    username: 'hivemq.client.1724774300713',
    password: '40w;@1W2KAC?f<lZdxBa'
});

mqttClient.on('connect', function () {
    console.log('Connected to HiveMQ broker');
});

// Simulate courier location
// function sendCourierLocation() {
//     const location = {
//         latitude: 0.30381055131639 + Math.random() * 0.01, // Simulated movement
//         longitude: 103.60256882032849 + Math.random() * 0.01,
//         status: 'In Transit'
//     };
//     mqttClient.publish('courier/location', JSON.stringify(location));
// }

// Membaca data dummy dari file
const dummyData = JSON.parse(fs.readFileSync('dummyData.json', 'utf-8'));

let index = 0;

// Kirim data dummy setiap 5 detik
function sendCourierLocation() {
    const location = dummyData[index];
    mqttClient.publish('courier/location', JSON.stringify({
        ...location,
        status: 'In Transit'
    }));

    index = (index + 1) % dummyData.length; // Looping data
}

// Send location every 5 seconds
setInterval(sendCourierLocation, 1000);

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
