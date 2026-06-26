<?php
$host = getenv('DB_HOST')?: 'aws-0-eu-west-1.pooler.supabase.com';
$port = getenv('DB_PORT')?: '6543';
$db_name = getenv('DB_NAME')?: 'postgres';
$db_user = getenv('DB_USER')?: '';
$db_pass = getenv('DB_PASS')?: '';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>