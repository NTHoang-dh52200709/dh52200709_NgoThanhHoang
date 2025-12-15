<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <h4>Bui van quynh DH52201345<br></h4>
            <h4>D22_Th03_Thu4 ca 1 Thay NGhia</h4>
            <?php
                $mang= array(); 
                $sanpham = array("id"=> "sp1", "name"=> "Sản phẩm 1 ");  
                $mang[] = $sanpham; 
                $sanpham = array("id"=> "sp2", "name"=> "Sản phẩm 2 ");  
                $mang[] = $sanpham; 
                $sanpham= array("id"=> "sp3", "name"=> "Sản phẩm 3 ");  
                $mang[] = $sanpham; 

                function ShowArray ($Mang){
                    echo "<table border='1' cellspacing ='0' , cellsadding='3'>
                            <tr>
                            <th>STT</th>
                            <th>MA San PHAM</th>
                            <th> TEN SAN PHAM </th>
                            </tr>";

                        for ($i=0; $i < count($Mang);$i++){
                            echo"<tr>
                                    <td>".($i+1 )."</td>
                                    <td>".$Mang[$i]['id']."</td>
                                    <td>".$Mang[$i]['name']."</td>
                            </tr>";
                        }
                echo   "</table>" ;   
                
                }
         ShowArray($mang);
            ?>


</body>
</html>