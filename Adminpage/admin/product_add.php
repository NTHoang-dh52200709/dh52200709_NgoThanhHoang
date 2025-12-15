<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit(); }

$sql_cat = "SELECT * FROM categories";
$result_cat = mysqli_query($conn, $sql_cat);

$msg = "";

if (isset($_POST['save_pro_btn'])) {
    $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
    $cat_id = $_POST['cat_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $image = $_FILES['image']['name']; 
    $image_tmp = $_FILES['image']['tmp_name']; 

    $image = time() . '_' . $image;
    
    $target = "../assets/image/" . $image;

    if (move_uploaded_file($image_tmp, $target)) {
        $sql = "INSERT INTO products (pro_name, cat_id, price, quantity, description, image) 
                VALUES ('$pro_name', '$cat_id', '$price', '$quantity', '$description', '$image')";
        
        if (mysqli_query($conn, $sql)) {
            header('Location: product_list.php');
        } else {
            $msg = "Lỗi SQL: " . mysqli_error($conn);
        }
    } else {
        $msg = "Lỗi upload ảnh! Hãy kiểm tra lại thư mục assets/assets/";
    }
}

include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="col-md-10 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Thêm Sản phẩm mới</h2>
        <a href="product_list.php" class="btn btn-secondary">Quay lại</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if($msg) echo "<div class='alert alert-danger'>$msg</div>"; ?>
            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tên sản phẩm:</label>
                        <input type="text" name="pro_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Danh mục:</label>
                        <select name="cat_id" class="form-select" required>
                            <option value="">-- Chọn danh mục --</option>
                            <?php while($row_cat = mysqli_fetch_assoc($result_cat)): ?>
                                <option value="<?php echo $row_cat['cat_id']; ?>">
                                    <?php echo $row_cat['cat_name']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Giá tiền (VNĐ):</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số lượng kho:</label>
                        <input type="number" name="quantity" class="form-control" value="10">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Hình ảnh:</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Mô tả sản phẩm:</label>
                        <textarea name="description" class="form-control" rows="4"></textarea>
                    </div>
                </div>

                <button type="submit" name="save_pro_btn" class="btn btn-primary">
                    <i class="fas fa-save"></i> Lưu sản phẩm
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>