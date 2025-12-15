<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_get_image = "SELECT image FROM products WHERE pro_id = $id";
    $result = mysqli_query($conn, $sql_get_image);
    $row = mysqli_fetch_assoc($result);
    
    // Đường dẫn ảnh trên server
    $image_path = "../assets/image/" . $row['image'];

    $sql_delete = "DELETE FROM products WHERE pro_id = $id";
    
    if (mysqli_query($conn, $sql_delete)) {
        if (file_exists($image_path)) {
            unlink($image_path); 
        }
        
        header('Location: product_list.php');
    } else {
        echo "Lỗi xóa sản phẩm: " . mysqli_error($conn);
    }
} else {
    header('Location: product_list.php');
}
?>