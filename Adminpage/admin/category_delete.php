<?php
session_start();
include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM categories WHERE cat_id = $id";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: category_list.php');
    } else {
        echo "Lỗi xóa: " . mysqli_error($conn);
    }
} else {
    header('Location: category_list.php');
}
?>