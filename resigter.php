<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký sinh viên </title>
    <style>
        .container {
            width: 500px;
            margin: 30px auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        
        .form-title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
            /* Tạo đường kẻ dưới cho dễ nhìn */
            border-bottom: 2px solid #0066cc;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        td:first-child {
            width: 30%;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 5px;
        }

        textarea {
            width: 100%;
            height: 60px;
        }

        .button-group {
            text-align: center;
            margin-top: 10px;
        }

        .button-group input {
            padding: 5px 20px;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-title">ĐĂNG KÝ</div>
        <form action="result_resigter.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Full name</td>
                    <!-- Bắt buộc người dùng phải điền thông tin required -->
                    <td><input type="text" name="fullname" required placeholder="Nhập fullname"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required placeholder="Nhập tên"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td> 
                </tr>
                <tr>
                    <td>Nhập lại Password</td>
                    <td><input type="password" name="repassword" required placeholder="Nhập lại mật khẩu"></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gender" value="Nam" required> Nam
                        <input type="radio" name="gender" value="Nữ"> Nữ
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="ngaysinh"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><textarea  name="address" id="build__address" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td><input type="file" name="fileToUpload"></td>
                </tr>
                <tr>
                    <td>Sở thích</td>
                    <td>
                        <input type="checkbox" name="hobbies[]" value="Xem Phim"> Xem Phim
                        <input type="checkbox" name="hobbies[]" value="Thể Thao"> Thể Thao
                        <input type="checkbox" name="hobbies[]" value="Web"> Web
                    </td>
                </tr>
            </table>
            <div class="button-group">
                <input type="submit" value="OK">
                <!-- onclick = return confirm để xác nhận xóa dữ liệu -->
                <input type="reset" value="Reset" onclick="return confirm('Bạn có chắc muốn xóa hết dữ liệu?')">
            </div>
        </form>
    </div>
</body>
</html>