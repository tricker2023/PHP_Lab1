<?php
session_start();

// Kiểm tra xem có dữ liệu đăng nhập trong session không
if (!isset($_SESSION['login_data'])) {
    header('Location: login.php');
    exit();
}

$login_data = $_SESSION['login_data'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm Tra Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .info-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
        }
        .btn__back {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Thông Tin Đăng Nhập</h2>
    
    <div class="info-box">
        <p><strong>Tên đăng nhập:</strong> <?php echo htmlspecialchars($login_data['username']); ?></p>
        <p><strong>Mật khẩu:</strong> <?php echo htmlspecialchars($login_data['password']); ?></p>
        <p><strong>Thời gian đăng nhập:</strong> <?php echo htmlspecialchars($login_data['login_time']); ?></p>
    </div>

    <a href="login.php" class="btn__back">Quay lại trang đăng nhập</a>
</body>
</html>