<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thành viên</title>
</head>
<body>
    <h2 style="text-align:center;">Form Đăng Ký Thành Viên</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td>Tên đăng nhập (*):</td>
                <td><input type="text" name="username" required></td>
            </tr>

            <tr>
                <td>Mật khẩu (*):</td>
                <td><input type="password" name="password" required></td>
            </tr>

            <tr>
                <td>Nhập lại mật khẩu (*):</td>
                <td><input type="password" name="repassword" required></td>
            </tr>

            <tr>
                <td>Giới tính (*):</td>
                <td>
                    <input type="radio" name="gender" value="Nam" required> Nam
                    <input type="radio" name="gender" value="Nữ"> Nữ
                </td>
            </tr>

            <tr>
                <td>Sở thích:</td>
                <td>
                    <input type="checkbox" name="hobby[]" value="Thể thao"> Thể thao
                    <input type="checkbox" name="hobby[]" value="Âm nhạc"> Âm nhạc
                    <input type="checkbox" name="hobby[]" value="Du lịch"> Du lịch
                    <input type="checkbox" name="hobby[]" value="Đọc sách"> Đọc sách
                </td>
            </tr>

            <tr>
                <td>Hình ảnh (tùy chọn):</td>
                <td><input type="file" name="image" accept=".jpg,.png,.gif,.bmp"></td>
            </tr>

            <tr>
                <td>Tỉnh (*):</td>
                <td>
                    <select name="province" required>
                        <option value="">--Chọn tỉnh--</option>
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                        <option value="TP.HCM">TP.HCM</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Đăng ký">
                    <input type="reset" value="Làm lại">
                </td>
            </tr>
        </table>
    </form>

    <br><hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username   = trim($_POST['username']);
    $password   = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender     = $_POST['gender'] ?? "";
    $province   = $_POST['province'] ?? "";
    $hobbies    = $_POST['hobby'] ?? [];

    $error = "";

    // Kiểm tra dữ liệu bắt buộc
    if ($username == "" || $password == "" || $repassword == "" || $gender == "" || $province == "") {
        $error = "Vui lòng nhập đầy đủ các trường có dấu (*).";
    } elseif ($password != $repassword) {
        $error = "Mật khẩu nhập lại không khớp.";
    }

    // Kiểm tra hình ảnh (nếu có)
    if ($_FILES['image']['error'] == 0) {
        $fileName = $_FILES['image']['name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'png', 'gif', 'bmp'];

        if (!in_array($fileExt, $allowedExt)) {
            $error = "File ảnh không hợp lệ. Chỉ chấp nhận: .jpg, .png, .gif, .bmp";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $fileName);
        }
    }

    // Hiển thị kết quả
    if ($error != "") {
        echo "<p style='color:red; text-align:center;'> $error</p>";
    } else {
        echo "<h3 style='text-align:center;'> Thông tin đăng ký thành công!</h3>";
        echo "<table align='center' border='1' cellpadding='5'>";
        echo "<tr><td>Tên đăng nhập:</td><td>$username</td></tr>";
        echo "<tr><td>Giới tính:</td><td>$gender</td></tr>";
        echo "<tr><td>Tỉnh:</td><td>$province</td></tr>";
        echo "<tr><td>Sở thích:</td><td>" . implode(", ", $hobbies) . "</td></tr>";
        if ($_FILES['image']['error'] == 0)
            echo "<tr><td>Hình ảnh:</td><td><img src='uploads/$fileName' width='120'></td></tr>";
        echo "</table>";
    }
}
?>
</body>
</html>
