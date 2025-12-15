<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab2_2</title>
</head>

<body>
<?php
$a=1;
$kq=0;
function f()
{
	$GLOBALS['b']=2;
	global $kq;
	$kq=$GLOBALS['a']+$GLOBALS['b'];
}
f();
echo "a = $a<br/>";
echo "b = $b<br/>";
echo "kq = $kq<br/>";
echo " sau khi xóa GLobal kết quả xuất ra sẽ là 0 , 
vì global dùng để định nghĩa một biến và biến đó là biến toàn cục <br>
với a =1, b=2 và kq ban đầu được gán ban đầu là 0 , việc bỏ global ở kq bị sai logic  "

?>
</body>
</html>