<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit(); }

$msg = "";
if (isset($_POST['save_btn'])) {
    $cat_name = $_POST['cat_name'];
    $status = $_POST['status'];
    $sql = "INSERT INTO categories (cat_name, status) VALUES ('$cat_name', '$status')";
    if (mysqli_query($conn, $sql)) {
        header('Location: category_list.php');
    } else {
        $msg = "<div class='alert alert-danger'>Lỗi: " . mysqli_error($conn) . "</div>";
    }
}

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="col-md-10 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Thêm Danh mục mới</h2>
        <a href="category_list.php" class="btn btn-secondary">Quay lại</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?php echo $msg; ?>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Tên danh mục:</label>
                            <input type="text" name="cat_name" class="form-control" required placeholder="Nhập tên loại sách...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái:</label>
                            <select name="status" class="form-select">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>

                        <button type="submit" name="save_btn" class="btn btn-primary">Lưu dữ liệu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>