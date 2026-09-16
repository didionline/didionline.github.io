<?php
require_once __DIR__.'/config.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
        $msg = 'सही नाम, email और कम से कम 8 characters का password भरें।';
    } else {
        $pdo = db();
        $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(190) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        $pdo->exec("CREATE TABLE IF NOT EXISTS services (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(190) NOT NULL,
            description TEXT,
            price VARCHAR(100),
            image VARCHAR(255),
            active TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        $pdo->exec("CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(190) NOT NULL,
            description TEXT,
            price DECIMAL(12,2) DEFAULT 0,
            image VARCHAR(255),
            active TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        $stmt = $pdo->prepare("INSERT INTO admins(name,email,password_hash) VALUES(?,?,?)");
        try {
            $stmt->execute([$name,$email,password_hash($password,PASSWORD_DEFAULT)]);
            $msg = 'Installation complete. अब install.php delete करें और /admin/login.php खोलें।';
        } catch (PDOException $ex) {
            $msg = 'Admin account पहले से मौजूद है या database error है।';
        }
    }
}
?>
<!doctype html><html lang="hi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Didi Online Setup</title>
<link rel="stylesheet" href="assets/style.css"></head><body><div class="container narrow"><div class="card"><h1>Didi Online Setup</h1><p>पहली बार setup के लिए admin account बनाएं।</p>
<?php if($msg): ?><div class="notice"><?=e($msg)?></div><?php endif; ?>
<form method="post"><label>Admin Name</label><input name="name" required>
<label>Email</label><input type="email" name="email" required>
<label>Password</label><input type="password" name="password" minlength="8" required>
<button class="btn" type="submit">Create Admin</button></form></div></div></body></html>
