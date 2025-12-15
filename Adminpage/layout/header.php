<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Bán Sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card-img-top { height: 250px; object-fit: cover; } 
        .price { color: #d63031; font-weight: bold; font-size: 1.2rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="fas fa-book-open"></i> BOOKSTORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Sản phẩm</a></li>
            
            <li class="nav-item">
                <a class="nav-link fw-bold text-warning" href="labs.php">LAB THỰC HÀNH</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
        </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> Xin chào, <?php echo $_SESSION['user_name']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Hồ sơ cá nhân</a></li>
                    <?php if($_SESSION['user_role'] == 1): ?>
                        <li><a class="dropdown-item text-danger" href="admin/index.php">Vào trang Admin</a></li>
                    <?php endif; ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                </ul>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="register.php"><i class="fas fa-user-plus"></i> Đăng ký</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div id="banner" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
  </div>
</div>

<div class="container mt-4">