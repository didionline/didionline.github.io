<?php
// Rename this file to config.php and fill in your hosting database details.
define('DB_HOST', 'localhost');
define('DB_NAME', 'didi_online');
define('DB_USER', 'YOUR_DB_USER');
define('DB_PASS', 'YOUR_DB_PASSWORD');

define('SITE_NAME', 'Didi Online');
define('BASE_URL', ''); // Example: https://yourdomain.com

define('WHATSAPP_NUMBER', '918878461190'); // Change if needed
define('SHOP_PHONE', '8878461190');
define('SHOP_EMAIL', 'didionline2023@gmail.com');

session_start();

function db() {
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO(
            'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',
            DB_USER, DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
    return $pdo;
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function is_admin() {
    return !empty($_SESSION['admin_id']);
}

function require_admin() {
    if (!is_admin()) {
        header('Location: login.php');
        exit;
    }
}
