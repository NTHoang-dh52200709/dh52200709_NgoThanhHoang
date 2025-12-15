<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 2_5</title>
</head>

<body>
<?php
	include("lab2_5a.php");
	include("lab2_5b.php");
	require("lab2_5b.php");

	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";

echo "<br>khi comment dòng 10 kết quả sẽ là biến X không tồn tại ";	
echo "<br> sau khi thêm include lab2_5b vào lab2_5 và đổi tên thành vd4_5 thì kết quả là 20 ";
echo "<br> sau khi thêm include lab2_5b vào lab2_5 và đổi tên thành vd4_6 thì kết quả là 30 ";
echo "<br> sau khi thay include thành iclude_once tại dòng 12 và đổi tên file thành vd4_7 thì kết quả giữa 4_6 là 30 và 4_7 là 20 , hai kết quả khác nhau  <br>";
echo"<br> thay include thành require trong vd4_6.php và vd4_7.php và lưu
lại với tên vd4_6b.php và vd4_7b.php. So sánh kết quả với câu 4.6 và 4.7 hai kết quả bằng  nhau 4.6 =30 và 4.7=30 ";

echo"<br> so sánh iclude và require , thì include vẫn sẽ chạy các đoạn mã tiếp dù bị sai , còn require sẽ không chạy tất cả các đoạn mã còn lại nếu sai ";



?>


</body>
</html>