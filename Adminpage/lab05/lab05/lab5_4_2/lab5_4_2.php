<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>bui van quynh _Dh52201345 D22_th03</h2>
    <form action="lab5_4_2.php" method="get">
        <table align="center">
            <tr>
                <td>Nhập tên:</td>
                <td><input type="text" name="nhapten"></td>
            </tr>
            <tr>
                <td>Cách tìm:</td>
                <td><input type="radio" name="ct" value="ganchinhxac" id="gan"> Gần chính xác</td>
                <td><input type="radio" name="ct" value="chinhxac" id="chinhxac"> Chính xác</td>
            </tr>
            <tr>
                <td>Loại sản phẩm:</td>
                <td><input type="checkbox" name="loai[]" value="loai1" id="1"> Loại 1</td>
                <td><input type="checkbox" name="loai[]" value="loai2" id="2"> Loại 2</td>
                <td><input type="checkbox" name="loai[]" value="loai3" id="3"> Loại 3</td>
                <td><input type="checkbox" name="loai[]" value="tatca" id="4"> Tất cả</td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    <?php
        if (isset($_GET['nhapten'])) {
            echo "Tên sản phẩm vừa nhập: " . htmlspecialchars($_GET['nhapten']);
            echo "<br>";
        }
        
        if (isset($_GET['ct'])) {
            echo "Cách tìm: " . htmlspecialchars($_GET['ct']);
            echo "<br>";
        }
        
        if (isset($_GET['loai'])) {
            echo "Loại sản phẩm: ";
            if (is_array($_GET['loai'])) {
                echo implode(",", $_GET['loai']);
                //implode: Nối các giá trị trong mảng loai[] thành một chuỗi, ngăn cách nhau bằng dấu phẩy.
            }
        } else {
            echo "Chưa chọn loại:";
        }
        
        echo "<hr>";
        print_r($_GET); 
    ?>
</body>
</html>
