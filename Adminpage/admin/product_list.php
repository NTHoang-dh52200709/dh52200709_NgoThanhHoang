<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit(); }

$sql = "SELECT p.*, c.cat_name 
        FROM products p 
        INNER JOIN categories c ON p.cat_id = c.cat_id 
        ORDER BY p.pro_id DESC";
$result = mysqli_query($conn, $sql);

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="col-md-10 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Quản lý Sản phẩm</h2>
        <a href="product_add.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Kho</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['pro_id']; ?></td>
                                <td>
                                    <img src="../assets/image/<?php echo $row['image']; ?>" width="60" height="60" style="object-fit: cover; border: 1px solid #ddd;">
                                </td>
                                <td><?php echo $row['pro_name']; ?></td>
                                <td><span class="badge bg-info text-dark"><?php echo $row['cat_name']; ?></span></td>
                                <td class="fw-bold text-danger"><?php echo number_format($row['price'], 0, ',', '.'); ?> đ</td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="product_delete.php?id=<?php echo $row['pro_id']; ?>" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không? Hành động này không thể hoàn tác!')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center">Chưa có sản phẩm nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>