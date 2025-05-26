<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2">
<tr>
    <th>id</th>
    <th>kwiatki</th>
    <th>data</th>
    <th>cena</th>
</tr>
<?php
$con = mysqli_connect("localhost", "root", "", "kwiaciarnia");
$result = mysqli_query($con, "SELECT id_bukietu, id_kwiatu, data, cena FROM bukiet ORDER BY id_bukietu;");
while( $row = mysqli_fetch_array($result)){
         echo "<tr>";
        echo "<td>".$row['id_bukietu']."</td>";
        echo "<td>".$row['id_kwiatu']."</td>";
        echo "<td>".$row['data']."</td>";
        echo "<td>".$row['cena']."</td>";
        echo "</tr>";
}
mysqli_close($con);
?>
</body>
</html>

<?php

