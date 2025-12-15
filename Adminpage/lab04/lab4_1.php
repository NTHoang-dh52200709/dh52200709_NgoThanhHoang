<pre><?php
    echo " Bui Van Quynh D22_TH03<br>";
    echo " DH52201345_Thu 4 ca 1<br><br>";
$a = array();//mảng rỗng
$b = array(1, 3, 5); //mảng có 3 phần tử
/*
$b[0] = 1;
$b[1] = 3;
$b[2] = 5;
*/
$c = array("a"=>2, "b"=>4, "c"=>6);//mảng có 3 phần tử.Các index của mảng là chuỗi
/*
$c['a']= 2;
$c['b'] = 4;
$c['c'] = 6
*/

$na = Count($a);
$nb = Count($b);
$nc = Count($c);
echo "Mảng a có $na phần tử <br> ";
echo "Mảng b có $nb phần tử <br> ";
echo "Mảng c có $nc phần tử <br> ";
print_r($a);
var_dump($b);
print_r($c);
$a[] = 3;
$b[] = 7;
$c['d'] = 8;
echo "<hr> Sau khi thêm phần tử, nội dung các mảng  là :";
print_r($a);
print_r($b);
print_r($c);

$x = 1;
unset($a[$x]);// khong bi xoa 
unset($b[$x]);//b voi index =1 gia tri bi xoa la 3
unset($c['a']); // trong c voi chuoi a mang gia tri bi xoa la = 2
echo "<hr> Sau khi xóa phần tử, nội dung các mảng  là :";
print_r($a);
print_r($b);
print_r($c);

$value = 2;
$key = 'b';
if (isset($c[$key])) // kiem tra xem phan tu co key b khong , neu co thi thuc hien con gia tri , truong hop nay ta co b =4 , 4+2 =6 
    $c[$key] += $value; 
else 
    $c[$key] = $value;
echo "<hr> Kết quả mảng c là:";
print_r($c);

?>