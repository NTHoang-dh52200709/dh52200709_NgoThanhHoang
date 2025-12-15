<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Sử dụng while hay do …while để tìm n nhỏ nhất sao cho 1 + 2 + …+ n >1000. 
        $n =1 ;
        $tong=0;
        do {
            $tong+= $n;
            $n++;
        }while($tong<=1000);
        echo" n nho nhat co la :  <br>". ($n-1) 
    ?>
</body>
</html>