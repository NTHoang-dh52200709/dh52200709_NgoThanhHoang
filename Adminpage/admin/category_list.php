<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit(); }

$sql = "SELECT * FROM categories ORDER BY cat_id DESC";
$result = mysqli_query($conn, $sql);

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="col-md-10 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Quản lý Danh mục</h2>
        <a href="category_add.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th width="15%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row['cat_name']; ?></td>
                                <td>
                                    <?php if($row['status'] == 1): ?>
                                        <span class="badge bg-success">Hiển thị</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Ẩn</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="category_edit.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="category_delete.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center">Chưa có dữ liệu</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>