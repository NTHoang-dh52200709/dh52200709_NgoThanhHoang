<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Bui Van Quynh _DH52201345<br></h3>
    <h3>D22_Th03 Thu 4 ca 1 </h3>
    <?php
        $mang=array(1,24,3,5,6,78,89,456,789,678,357);
        function ShowArray($mang){
            echo "<table border=1  cellspacing =0>
                    <tr>
                        <th> INDEX</th>
                        <th> VALUE</th>
                    </tr>";
                    foreach($mang as $keyIndex => $value ){
                        echo"<tr align= center>
                            <td>".$keyIndex."</td>
                            <td>".$value."</td>
                        
                        </tr>";
                    }
                    
            
           echo "</table>";
       
        }    
        ShowArray($mang);
    ?>
</body>
</html>