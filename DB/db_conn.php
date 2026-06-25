<?php
$host = 'aws-0-eu-west-1.pooler.supabase.com'; 
$port = '6543';
$db_name = 'postgres';
$db_user = 'postgres.mtkecdfrvpbphdjciyht'; 
$db_pass = '8tDSITrGVNWHEnop';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>