const fs = require('fs');

// Fungsi untuk interpolasi titik antara dua koordinat
function interpolate(start, end, steps) {
    const data = [];
    const stepSizeLat = (end.latitude - start.latitude) / steps;
    const stepSizeLng = (end.longitude - start.longitude) / steps;

    for (let i = 0; i <= steps; i++) {
        data.push({
            latitude: start.latitude + stepSizeLat * i,
            longitude: start.longitude + stepSizeLng * i
        });
    }

    return data;
}
// 0.3313050758212936, 103.59408144034134


// 0.48617438468501634, 101.4538421621016
// 0.44754554210922026, 101.45257029990435
// 0.5888043746422738, 101.4246804131883
// Koordinat awal dan akhir
const start = { latitude: 0.48617438468501634, longitude: 101.4538421621016 };
const end = { latitude: 0.44754554210922026, longitude: 101.45257029990435 };

// Jumlah langkah
const steps = 100; // Anda bisa menyesuaikan jumlah langkah sesuai kebutuhan

// Menghasilkan data dummy
const data = interpolate(start, end, steps);

// Simpan data ke file JSON
fs.writeFileSync('dummyData.json', JSON.stringify(data, null, 2), 'utf-8');

console.log('Data dummy berhasil dibuat!');
