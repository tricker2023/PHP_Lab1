<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập và Hiển Thị Thông Tin Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Form Nhập Thông Tin Sinh Viên</h2>
    
    <!-- Form nhập liệu -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="hoten">Họ và tên:</label>
            <input type="text" id="hoten" name="hoten" placeholder="Nhập họ và tên" required>
        </div>

        <div class="form-group">
            <label for="email">Địa chỉ email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email" required>
        </div>

        <div class="form-group">
            <label for="sdt">Số điện thoại:</label>
            <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại" required>
        </div>

        <div class="form-group">
            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" placeholder="Nhập địa chỉ" required>
        </div>

        <input type="submit" value="Xác nhận gửi thông tin">
    </form>

    <?php
    // Xử lý dữ liệu khi form được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy và xử lý dữ liệu từ form
        $hoten = isset($_POST["hoten"]) ? htmlspecialchars($_POST["hoten"]) : ""; 
        // htmlspecialchairs để tránh tấn công XSS
        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
        $sdt = isset($_POST["sdt"]) ? htmlspecialchars($_POST["sdt"]) : "";
        $diachi = isset($_POST["diachi"]) ? htmlspecialchars($_POST["diachi"]) : "";

        // Kiểm tra và hiển thị thông tin
        if ($hoten && $email && $sdt && $diachi) {
            echo "<div class='result'>";
            echo "<h3>Thông Tin Sinh Viên Đã Nhập:</h3>";
            echo "<p><strong>Họ và tên:</strong> $hoten</p>";
            echo "<p><strong>Địa chỉ email:</strong> $email</p>";
            echo "<p><strong>Số điện thoại:</strong> $sdt</p>";
            echo "<p><strong>Địa chỉ:</strong> $diachi</p>";
            echo "</div>";
        }else{
            echo "<p class='error'>Vui lòng nhập đầy đủ thông tin!</p>";
        }
    }
    ?>
</body>
</html>