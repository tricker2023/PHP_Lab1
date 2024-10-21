<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = $_POST['gender'];
    $ngaysinh = $_POST['ngaysinh'];
    $address = $_POST['address'];
    // $fileToUpload = $_POST['fileToUpload'];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];

    // upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
    $linkfile = "http://localhost/studyPHP/PHP_B1/uploads/".basename( $_FILES["fileToUpload"]["name"]);
    echo '<br> linkfile: '.$linkfile;
    echo '<img src="'.$linkfile.'" alt="">';
    // end upload file
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kết quả đăng ký</title>
    <style>
        .container {
            width: 500px;
            margin: 30px auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
            color: #0066cc;
        }
        
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .info-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        .info-table td:first-child {
            font-weight: bold;
            width: 30%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">THÔNG TIN ĐĂNG KÝ</div>
        <table class="info-table">
            <tr>
                <td>Họ tên:</td>
                <td><?php echo htmlspecialchars($fullname); ?></td>
            </tr>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><?php echo htmlspecialchars($username); ?></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td><?php echo htmlspecialchars($gender); ?></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><?php echo "$ngaysinh"; ?></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><?php echo htmlspecialchars($address); ?></td>
            </tr>
            <tr>
                <td>Avatar:</td>
                <td><img src="<?php echo $fileToUpload; ?>" alt="anhdemo" width="100px"></td>
            </tr>
            <tr>
                <td>Sở thích:</td>
                <!-- implode chuyển 1 mảng thành 1 chuỗi -->
                <td><?php echo implode(", ", $hobbies); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>