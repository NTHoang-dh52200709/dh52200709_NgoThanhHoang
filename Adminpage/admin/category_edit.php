<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit(); }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE cat_id = $id";
    $result = mysqli_query($conn, $sql);
    $category = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_btn'])) {
    $cat_name = $_POST['cat_name'];
    $status = $_POST['status'];
    $id = $_POST['cat_id'];

    $sql = "UPDATE categories SET cat_name='$cat_name', status='$status' WHERE cat_id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: category_list.php'); 
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="col-md-10 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Chỉnh sửa Danh mục</h2>
        <a href="category_list.php" class="btn btn-secondary">Quay lại</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="cat_id" value="<?php echo $category['cat_id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Tên danh mục:</label>
                            <input type="text" name="cat_name" class="form-control" 
                                   value="<?php echo $category['cat_name']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái:</label>
                            <select name="status" class="form-select">
                                <option value="1" <?php if($category['status'] == 1) echo 'selected'; ?>>Hiển thị</option>
                                <option value="0" <?php if($category['status'] == 0) echo 'selected'; ?>>Ẩn</option>
                            </select>
                        </div>

                        <button type="submit" name="update_btn" class="btn btn-warning">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>