<?php
session_start();
include 'config/db.php';
include 'layout/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT p.*, c.cat_name 
            FROM products p 
            JOIN categories c ON p.cat_id = c.cat_id 
            WHERE p.pro_id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    
    if (!$product) {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Sản phẩm không tồn tại!</div></div>";
        include 'layout/footer.php';
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $product['cat_name']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $product['pro_name']; ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-5">
            <?php 
                $img_path = "assets/image/" . $product['image'];
                $img_src = (!empty($product['image']) && file_exists($img_path)) ? $img_path : "https://via.placeholder.com/500x500?text=No+Image"; 
            ?>
            <div class="card shadow-sm">
                <img src="<?php echo $img_src; ?>" class="img-fluid rounded" alt="<?php echo $product['pro_name']; ?>">
            </div>
        </div>

        <div class="col-md-7">
            <h2 class="fw-bold"><?php echo $product['pro_name']; ?></h2>
            <p class="text-muted">Danh mục: <span class="badge bg-info text-dark"><?php echo $product['cat_name']; ?></span></p>
            
            <h3 class="text-danger my-3"><?php echo number_format($product['price'], 0, ',', '.'); ?> đ</h3>
            
            <p><strong>Tình trạng:</strong> 
                <?php echo ($product['quantity'] > 0) ? '<span class="text-success">Còn hàng</span>' : '<span class="text-danger">Hết hàng</span>'; ?>
            </p>

            <p class="lead" style="font-size: 1rem;"><?php echo nl2br($product['description']); ?></p>

            <hr>

            <form action="cart_add.php" method="GET" class="d-flex align-items-center">
                <input type="hidden" name="id" value="<?php echo $product['pro_id']; ?>">
                
                <div class="me-3" style="width: 100px;">
                    <input type="number" name="quantity" class="form-control" value="1" min="1" max="<?php echo $product['quantity']; ?>">
                </div>

                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                </button>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h4>Sản phẩm cùng danh mục</h4>
        <div class="row mt-3">
            <?php
            $cat_id = $product['cat_id'];
            $current_id = $product['pro_id'];
            $sql_rel = "SELECT * FROM products WHERE cat_id = $cat_id AND pro_id != $current_id LIMIT 4";
            $result_rel = mysqli_query($conn, $sql_rel);

            if(mysqli_num_rows($result_rel) > 0) {
                while($rel = mysqli_fetch_assoc($result_rel)) {
                    $rel_img = "assets/image/" . $rel['image'];
                    ?>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100">
                            <img src="<?php echo $rel_img; ?>" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h6 class="card-title text-truncate">
                                    <a href="product_detail.php?id=<?php echo $rel['pro_id']; ?>" class="text-decoration-none text-dark">
                                        <?php echo $rel['pro_name']; ?>
                                    </a>
                                </h6>
                                <p class="text-danger fw-bold"><?php echo number_format($rel['price'], 0, ',', '.'); ?> đ</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-muted'>Chưa có sản phẩm liên quan.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>