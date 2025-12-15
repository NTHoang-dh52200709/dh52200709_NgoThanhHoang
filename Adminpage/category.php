<?php
session_start();
include 'config/db.php';
include 'layout/header.php';

// 1. Kiểm tra xem có ID danh mục trên thanh địa chỉ không
if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];

    // 2. Lấy tên danh mục để hiển thị lên tiêu đề (VD: Sách Giáo Khoa)
    $sql_cat_name = "SELECT cat_name FROM categories WHERE cat_id = $cat_id";
    $result_cat_name = mysqli_query($conn, $sql_cat_name);
    $cat_row = mysqli_fetch_assoc($result_cat_name);
    
    // Nếu không tìm thấy danh mục (người dùng gõ bừa ID)
    if (!$cat_row) {
        echo "<div class='container mt-5 text-center'><h3>Danh mục không tồn tại!</h3></div>";
        include 'layout/footer.php';
        exit();
    }
    
    $category_name = $cat_row['cat_name'];

    // 3. Lấy danh sách sản phẩm thuộc danh mục này
    $sql_pro = "SELECT * FROM products WHERE cat_id = $cat_id ORDER BY pro_id DESC";
    $result_pro = mysqli_query($conn, $sql_pro);
} else {
    // Không có ID thì chuyển về trang chủ
    header('Location: index.php');
    exit();
}
?>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $category_name; ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <h3 class="border-bottom pb-2 mb-4 text-primary text-uppercase">
                <i class="fas fa-book"></i> <?php echo $category_name; ?>
            </h3>
        </div>

        <?php if(mysqli_num_rows($result_pro) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result_pro)): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php 
                            // Xử lý hiển thị ảnh
                            $img_path = "assets/image/" . $row['image'];
                            $img_src = (!empty($row['image']) && file_exists($img_path)) ? $img_path : "https://via.placeholder.com/300x300?text=No+Image"; 
                        ?>
                        <div style="height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                            <a href="product_detail.php?id=<?php echo $row['pro_id']; ?>">
                                <img src="<?php echo $img_src; ?>" style="max-height: 100%; max-width: 100%;" alt="<?php echo $row['pro_name']; ?>">
                            </a>
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate">
                                <a href="product_detail.php?id=<?php echo $row['pro_id']; ?>" class="text-decoration-none text-dark">
                                    <?php echo $row['pro_name']; ?>
                                </a>
                            </h5>
                            
                            <div class="mt-auto">
                                <div class="mb-2">
                                    <span class="text-danger fw-bold fs-5"><?php echo number_format($row['price'], 0, ',', '.'); ?> đ</span>
                                </div>
                                <a href="product_detail.php?id=<?php echo $row['pro_id']; ?>" class="btn btn-outline-primary w-100">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="80" alt="Empty">
                <p class="mt-3 text-muted">Chưa có sản phẩm nào trong danh mục này.</p>
                <a href="index.php" class="btn btn-secondary">Quay về trang chủ</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'layout/footer.php'; ?>