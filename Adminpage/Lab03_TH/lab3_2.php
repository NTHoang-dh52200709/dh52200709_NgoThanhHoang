<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 3_2</title>
</head>

<body>
<?php

function cong($a,$b)
{
	return $a+$b;
}

function swap(&$a,&$b)
{
	$t=$a;
	$a=$b;
	$b=$t;
}
$x=1;
$y=2;
swap($x,$y);
echo "x=$x; y=$y";
/*
Hàm cong($a, $b):

Đây là một hàm đơn giản nhận hai tham số $a và $b, sau đó trả về tổng của chúng ($a + $b).

Hàm swap(&$a, &$b):

Hàm này nhận hai tham số tham chiếu (được ký hiệu bởi dấu & trước biến). Điều này có nghĩa là mọi thay đổi được thực hiện đối với $a và $b trong hàm swap() sẽ ảnh hưởng trực tiếp đến các biến $x và $y ngoài hàm, chứ không phải bản sao của chúng.

Cách thức hoạt động của hàm:

Đầu tiên, nó lưu giá trị của $a vào một biến tạm ($t).

Sau đó, giá trị của $b được gán cho $a.

Cuối cùng, giá trị ban đầu của $a (lưu trong $t) được gán cho $b.

Kết quả là giá trị của $a và $b sẽ bị hoán đổi cho nhau.

Thực thi mã:

$x = 1; $y = 2;: Đây là việc khởi tạo giá trị ban đầu cho hai biến $x và $y.

swap($x, $y);: Gọi hàm swap để hoán đổi giá trị của $x và $y. Sau khi hoán đổi, $x sẽ là 2 và $y sẽ là 1.

echo "x=$x; y=$y";: Cuối cùng, dòng này in ra giá trị của $x và $y, kết quả sẽ là: x=2; y=1.*/
?>

</body>
</html>