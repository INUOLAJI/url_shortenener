<?php
// 1. Database Connection
require_once 'DB/db_conn.php';
// ✅ $pdo already created in db_conn.php

// 2. Fetch code from the URL parameter (?c=code)
if (isset($_GET['c'])) {
    $code = trim($_GET['c']);
    
    // Look up the code in the database
    $stmt = $pdo->prepare("SELECT long_url FROM urls WHERE short_code = ?");
    $stmt->execute([$code]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        // Redirect the user to the destination URL
        header("Location: " . $result['long_url']);
        exit();
    } else {
        echo "<h1>Link Expired or Not Found!</h1>";
    }
} else {
    echo "<h1>Invalid Request</h1>";
}