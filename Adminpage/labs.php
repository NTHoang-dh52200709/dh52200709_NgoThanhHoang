<?php
session_start();
include 'layout/header.php';
?>

<div class="container py-5">
    <h1 class="text-center text-success fw-bold mb-5">📚 BÀI TẬP THỰC HÀNH</h1>

    <div class="card shadow border-0 mx-auto" style="max-width: 700px;">
        <div class="card-body p-5">
            <h5 class="card-title mb-4 text-secondary">Danh sách các bài Lab:</h5>
            
            <div class="list-group list-group-flush">
                <a href="lab01/vi_du_05/bookstore/index.php" class="list-group-item list-group-item-action py-3">
                    <i class="fas fa-folder-open text-warning me-2"></i> Bài thực hành số 01 (Lab01)
                </a>
                <a href="lab02/index.php" class="list-group-item list-group-item-action py-3">
                    <i class="fas fa-folder-open text-warning me-2"></i> Bài thực hành số 02 (Lab02)
                </a>
                <a href="lab03_TH/index.php" class="list-group-item list-group-item-action py-3">
                    <i class="fas fa-folder-open text-warning me-2"></i> Bài thực hành số 03 (Lab03)
                </a>
                <a href="lab04/index.php" class="list-group-item list-group-item-action py-3">
                    <i class="fas fa-folder-open text-warning me-2"></i> Bài thực hành số 04 (Lab04)
                </a>
               <a href="lab05/lab05/lab5_1.php" class="list-group-item list-group-item-action py-3">
                    <i class="fas fa-folder-open text-warning me-2"></i> Bài thực hành số 05 (Lab05)
                </a>
                <a href="lab06/index.php" class="list-group-item list-group-item-action py-3">
                    <i class="fas fa-folder-open text-warning me-2"></i> Bài thực hành số 06 (Lab06)
                </a>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-outline-success">
            <i class="fas fa-home"></i> Về trang chủ
        </a>
    </div>
</div>

<?php 
include 'layout/footer.php'; 
?>