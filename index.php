<?php
// 1. Database Connection Settings
require_once 'DB/db_conn.php'; 
// ✅ $pdo is already created in db_conn.php — no need to create another one!

$short_url = "";

// 2. Handle Form Submission
if (isset($_POST['shorten'])) {
    $long_url = trim($_POST['long_url']);
    
    if (filter_var($long_url, FILTER_VALIDATE_URL)) {
        
        $stmt = $pdo->prepare("SELECT short_code FROM urls WHERE long_url = ?");
        $stmt->execute([$long_url]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($existing) {
            $code = $existing['short_code'];
        } else {
            $code = substr(md5(uniqid(rand(), true)), 0, 6);
            
            $stmt = $pdo->prepare("INSERT INTO urls (long_url, short_code) VALUES (?, ?)");
            $stmt->execute([$long_url, $code]);
        }
        
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $short_url = dirname($actual_link) . "/redirect.php?c=" . $code;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnapLink - URL Shortener</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; color: #f8fafc; }
        .container { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(10px); padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3); border: 1px solid rgba(255, 255, 255, 0.1); width: 100%; max-width: 500px; text-align: center; }
        h1 { font-size: 2rem; margin-bottom: 10px; background: linear-gradient(to right, #38bdf8, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        p { color: #94a3b8; font-size: 0.95rem; margin-bottom: 30px; }
        .form-group { display: flex; flex-direction: column; gap: 12px; }
        input[type="url"] { width: 100%; padding: 14px 16px; background: rgba(15, 23, 42, 0.6); border: 2px solid #334155; border-radius: 8px; color: #fff; font-size: 1rem; outline: none; transition: all 0.3s ease; }
        input[type="url"]:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2); }
        button { padding: 14px; background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%); border: none; border-radius: 8px; color: white; font-size: 1rem; font-weight: 600; cursor: pointer; transition: transform 0.2s ease, opacity 0.2s ease; }
        button:hover { opacity: 0.95; transform: translateY(-1px); }
        .result-box { margin-top: 25px; padding: 15px; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 8px; }
        .result-box a { color: #34d399; font-weight: bold; text-decoration: none; word-break: break-all; }
    </style>
</head>
<body>

    <div class="container">
        <h1>SnapLink</h1>
        <p>Paste your long URL below to make it short and sweet.</p>
        
        <form action="index.php" method="POST" class="form-group">
            <input 
                type="url" 
                name="long_url" 
                placeholder="https://example.com/very-long-link-here" 
                required
            >
            <button type="submit" name="shorten">Shorten URL</button>
        </form>

        <?php if (!empty($short_url)): ?>
        <div class="result-box">
            <p style="margin-bottom: 5px; color: #fff;">Your short link is ready:</p>
            <a href="<?php echo $short_url; ?>" target="_blank"><?php echo $short_url; ?></a>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>