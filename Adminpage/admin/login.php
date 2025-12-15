<?php
session_start();
include '../config/db.php'; // Kết nối database

$error = "";

// XỬ LÝ LOGIC ĐĂNG NHẬP (Giữ nguyên logic cũ)
if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Mã hóa password nhập vào thành MD5
    $password = md5($password);

    // Kiểm tra username, password và role=1 (Admin)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_name'] = $row['fullname'];
        $_SESSION['admin_id'] = $row['user_id'];
        
        header('Location: index.php');
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaAdmin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f1f2f7;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        
        .login-content {
            max-width: 450px;
            width: 100%;
        }

        
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
            font-size: 40px;
            font-weight: bold;
            color: #343a40;
        }
        .login-logo span.e-circle {
            background: #00c292;
            color: white;
            border-radius: 50%;
            padding: 5px 20px;
            margin-right: 5px;
        }
        .login-logo span.text-green { color: #00c292; }

        .login-form {
            background: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
        }

        .form-control {
            border-radius: 0;
            height: 45px;
            margin-bottom: 20px;
            border-color: #e7e7e7;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: #00c292;
        }

        .btn-success {
            background-color: #28a745; 
            border-color: #28a745;
            border-radius: 2px;
            height: 45px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-social {
            color: white;
            border-radius: 2px;
            height: 40px;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            text-decoration: none;
        }

        .btn-facebook { background-color: #3b5998; }
        .btn-twitter { background-color: #00acee; }
        
        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        
        .login-footer a {
            color: #ff5252;
            text-decoration: none;
        }

        label {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            color: #878787;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="login-content">
        <div class="login-logo">
            <span class="e-circle">e</span>la<span class="text-green">Admin</span>
        </div>

        <div class="login-form">
            <?php if($error): ?>
                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Email Address (User)</label>
                    <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember" style="text-transform: none;">Remember Me</label>
                    </div>
                    <a href="#" style="color: #ff5252; font-size: 14px; text-decoration: none;">Forgotten Password?</a>
                </div>

                <button type="submit" name="login_btn" class="btn btn-success w-100 mb-4">SIGN IN</button>

                <div class="social-login-content">
                    <a href="#" class="btn-social btn-facebook w-100">
                        <i class="fab fa-facebook-f me-2"></i> Sign in with facebook
                    </a>
                    <a href="#" class="btn-social btn-twitter w-100">
                        <i class="fab fa-twitter me-2"></i> Sign in with twitter
                    </a>
                </div>

                <div class="login-footer mt-4">
                    <p class="mb-1">
                        <a href="../login.php" style="color: #007bff; text-decoration: none; font-weight: 600;">
                            <i class="fas fa-arrow-left"></i> Quay về Đăng nhập Khách hàng
                        </a>
                    </p>
                    
                    <p class="mt-2 text-muted" style="font-size: 13px;">
                        Hoặc <a href="../index.php" class="text-secondary">về Trang chủ</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>