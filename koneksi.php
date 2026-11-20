<?php
// Konfigurasi database: gunakan environment variables pada hosting.
// Untuk XAMPP lokal, nilai default di bawah tetap dapat digunakan.
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS');
$pass = ($pass === false) ? '' : $pass;
$db   = getenv('DB_NAME') ?: 'webgis_rumah_makan_tataaran';

mysqli_report(MYSQLI_REPORT_OFF);
$conn = @new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    error_log('Database connection failed: ' . $conn->connect_error);
    http_response_code(500);
    exit('Koneksi database gagal. Periksa konfigurasi database pada server.');
}
$conn->set_charset('utf8mb4');

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
