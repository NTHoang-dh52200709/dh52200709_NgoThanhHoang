<div class="col-md-2 sidebar p-0">
    <div class="d-flex flex-column">
        <div class="p-3 text-center border-bottom border-secondary">
            <strong>MENU</strong>
        </div>
        <a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="category_list.php" class="<?php echo (strpos($_SERVER['PHP_SELF'], 'category') !== false) ? 'active' : ''; ?>">
            <i class="fas fa-list me-2"></i> Quản lý Danh mục
        </a>
        <a href="product_list.php" class="<?php echo (strpos($_SERVER['PHP_SELF'], 'product') !== false) ? 'active' : ''; ?>">
            <i class="fas fa-box me-2"></i> Quản lý Sản phẩm
        </a>
        <a href="Quanlykhachhang.php" class="<?php echo (strpos($_SERVER['PHP_SELF'], 'customer') !== false) ? 'active' : ''; ?>">
            <i class="fas fa-users me-2"></i> Khách hàng
        </a>
    </div>
</div>