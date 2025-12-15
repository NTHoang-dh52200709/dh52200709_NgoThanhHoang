<?php
session_start();
include 'config/db.php';
include 'layout/header.php';

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_role'] == 1) {
        header('Location: admin/index.php'); 
    } else {
        header('Location: index.php'); 
    }
    exit();
}

$error = "";

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); 

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['fullname'];
        $_SESSION['user_role'] = $row['role'];

        if ($row['role'] == 1) {
            $_SESSION['admin_id'] = $row['user_id']; 
            $_SESSION['admin_name'] = $row['fullname'];
            echo "<script>window.location.href='admin/index.php';</script>";
        } else {
            echo "<script>window.location.href='index.php';</script>";
        }
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-users"></i> ĐĂNG NHẬP KHÁCH HÀNG</h4>
                </div>
                <div class="card-body">
                    <?php if($error): ?>
                        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" required placeholder="Nhập tên đăng nhập...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-lock"></i> Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu...">
                        </div>

                        <button type="submit" name="login_btn" class="btn btn-primary w-100">
                            Đăng Nhập
                        </button>
                    </form>
                </div>
                
                <div class="card-footer text-center">
                    <p class="mb-2">Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
                    
                    <hr> <p class="text-muted small">Bạn là quản trị viên?</p>
                    <a href="admin/login.php" class="btn btn-outline-danger w-100">
                        <i class="fas fa-user-shield"></i> Vào trang Quản Trị (Admin)
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>