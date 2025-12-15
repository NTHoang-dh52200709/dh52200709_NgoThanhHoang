<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 3_4</title>
</head>

<body>
<?php
// Kết hợp hàm và vòng lặp
function kiemtranguyento($x) { // Kiểm tra 1 số có nguyên tố hay không
    if ($x < 2)
        return false;
    if ($x == 2)
        return true;
    for ($i = 2; $i <= sqrt($x); $i++)
        if ($x % $i == 0)
            return false;
    return true;
}

echo "Kiểm tra 12: ";
if (kiemtranguyento(12))
    echo "12 là số nguyên tố.<br>";
else
    echo "12 không phải số nguyên tố.<br>";


function KT_SNT($y) {
    if ($y < 2)
        return false;
    $i = 2;
    $isNT = true;
    do {
        if ($y % $i == 0) {
            $isNT = false;
            break;
        }
        $i++;
    } while ($i <= sqrt($y));
    return $isNT;
}

$so = 29;
echo "Kiểm tra số 29: ";
if (KT_SNT($so))
    echo "$so là số nguyên tố trong vòng lặp do...while.<br>";
else
    echo "$so không phải số nguyên tố trong vòng lặp do...while.<br>";
?>

</body>
</html>
