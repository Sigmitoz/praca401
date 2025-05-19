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
    <th>nazwa</th>
    <th>cena</th>
    <th>ilosc na magazynie</th>
</tr>
<?php
$con = mysqli_connect("localhost", "root", "", "kwiaciarnia");
$result = mysqli_query($con, "SELECT id, nazwa, ilosc_na_magazynie, cena FROM kwiaty ORDER BY id;");
while( $row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nazwa']."</td>";
        echo "<td>".$row['cena']."</td>";
        echo "<td>".$row['ilosc_na_magazynie']."</td>";
        echo "</tr>";
}
mysqli_close($con);
?>
</body>
</html>

<?php

