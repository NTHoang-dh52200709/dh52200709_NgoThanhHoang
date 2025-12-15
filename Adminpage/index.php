<?php
session_start();
include 'config/db.php';
// SỬA ĐƯỜNG DẪN Ở ĐÂY
include 'layout/header.php';

// 1. Lấy danh sách danh mục (để hiện bên cột trái)
$sql_cat = "SELECT * FROM categories WHERE status = 1";
$result_cat = mysqli_query($conn, $sql_cat);

// 2. Lấy danh sách sản phẩm mới nhất (giới hạn 8 sp)
$sql_pro = "SELECT * FROM products ORDER BY pro_id DESC LIMIT 8";
$result_pro = mysqli_query($conn, $sql_pro);
?>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active bg-primary border-primary">
                <i class="fas fa-list"></i> DANH MỤC SÁCH
            </a>
            <?php while($row_cat = mysqli_fetch_assoc($result_cat)): ?>
                <a href="category.php?id=<?php echo $row_cat['cat_id']; ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-caret-right"></i> <?php echo $row_cat['cat_name']; ?>
                </a>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="col-md-9">
        <div class="alert alert-secondary d-flex justify-content-between align-items-center" role="alert">
            <h4 class="mb-0">Sách Mới Nhất</h4>
            <a href="#" class="btn btn-sm btn-outline-secondary">Xem tất cả</a>
        </div>
        
        <div class="row">
            <?php if(mysqli_num_rows($result_pro) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result_pro)): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <?php 
                                // Xử lý hiển thị ảnh (nếu không có ảnh thì dùng ảnh mẫu)
                                $img_path = "assets/image/" . $row['image'];
                                $img_src = (!empty($row['image']) && file_exists($img_path)) ? $img_path : "https://via.placeholder.com/300x300?text=No+Image"; 
                            ?>
                            <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                                <img src="<?php echo $img_src; ?>" style="max-height: 100%; max-width: 100%;" alt="<?php echo $row['pro_name']; ?>">
                            </div>
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate" title="<?php echo $row['pro_name']; ?>">
                                    <a href="product_detail.php?id=<?php echo $row['pro_id']; ?>" class="text-decoration-none text-dark">
                                        <?php echo $row['pro_name']; ?>
                                    </a>
                                </h5>
                                
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-danger fw-bold fs-5"><?php echo number_format($row['price'], 0, ',', '.'); ?> đ</span>
                                    </div>
                                    <a href="cart_add.php?id=<?php echo $row['pro_id']; ?>" class="btn btn-primary w-100">
                                        <i class="fas fa-cart-plus"></i> Chọn mua
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="100" alt="Empty">
                    <p class="mt-3 text-muted">Chưa có sản phẩm nào được cập nhật.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php 
// SỬA ĐƯỜNG DẪN Ở ĐÂY
include 'layout/footer.php'; 
?>