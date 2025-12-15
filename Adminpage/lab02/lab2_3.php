<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 2_3</title>
</head>

<body>
<?php 
//const PI=3.14;
define("PI",3.14);
$r=10;
echo "Diện tích hình tròn có bán kính $r là: ".($r*$r*PI);
echo "<br>Có thể thay thế dòng 10: const PI = 3.14; bằng lệnh nào khác không? <br>";
echo " câu trả là có const PI= 3.14 , ta có thể thay thế bằng define(pi,3.14) ";


?>
</body>
</html>