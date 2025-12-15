<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit(); }

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="col-md-10 p-4">
    <h2 class="mb-4">Dashboard</h2>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sản phẩm</h5>
                    <p class="card-text display-6">120</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng</h5>
                    <p class="card-text display-6">45</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Khách hàng</h5>
                    <p class="card-text display-6">300</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="alert alert-info mt-4">
        Chào mừng <strong><?php echo $_SESSION['admin_name']; ?></strong> quay trở lại làm việc!
    </div>
</div>

<?php include 'layout/footer.php'; ?>