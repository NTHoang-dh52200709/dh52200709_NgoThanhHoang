<?php
session_start();
include 'config/db.php';
include 'layout/header.php';

$message = "";

if (isset($_POST['register_btn'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $message = "<div class='alert alert-danger'>Mật khẩu xác nhận không khớp!</div>";
    } else {
        $check_user = "SELECT * FROM users WHERE username = '$username'";
        $result_check = mysqli_query($conn, $check_user);

        if (mysqli_num_rows($result_check) > 0) {
            $message = "<div class='alert alert-danger'>Tên đăng nhập đã tồn tại!</div>";
        } else {
            $pass_hash = md5($password);
            
            $sql = "INSERT INTO users (username, password, fullname, email, role) 
                    VALUES ('$username', '$pass_hash', '$fullname', '$email', 0)";
            
            if (mysqli_query($conn, $sql)) {
                $message = "<div class='alert alert-success'>Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a></div>";
            } else {
                $message = "<div class='alert alert-danger'>Lỗi: " . mysqli_error($conn) . "</div>";
            }
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4>ĐĂNG KÝ THÀNH VIÊN</h4>
                </div>
                <div class="card-body">
                    <?php echo $message; ?>
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Họ và tên:</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tên đăng nhập:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nhập lại mật khẩu:</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <button type="submit" name="register_btn" class="btn btn-success w-100">Đăng Ký</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Đã có tài khoản? <a href="login.php">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>