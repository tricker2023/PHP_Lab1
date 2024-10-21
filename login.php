<!-- login.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .button-group {
            display: flex;
            gap: 10px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-btn {
            background-color: #4CAF50;
            color: white;
        }
        .reset-btn {
            background-color: #f44336;
            color: white;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Đăng Nhập</h2>
    
    <?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        
        if ($username && $password) {
            // Lưu thông tin vào session để chuyển sang trang kiểm tra
            $_SESSION['login_data'] = [
                'username' => $username,
                'password' => $password,
                'login_time' => date('Y-m-d H:i:s')
            ];
            
            // Chuyển hướng sang trang kiểm tra
            header('Location: examinelogin.php');
            exit();
        } else {
            echo "<p class='error'>Vui lòng nhập đầy đủ thông tin!</p>";
        }
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
        </div>

        <div class="button-group">
            <button type="submit" class="login-btn">Đăng nhập</button>
            <button type="reset" class="reset-btn">Nhập lại</button>
        </div>
    </form>
</body>
</html>