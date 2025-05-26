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
    <th>id klienta</th>
    <th>data</th>
    <th>czy zostało zrealizowane</th>
</tr>
<?php
$con = mysqli_connect("localhost", "root", "", "kwiaciarnia");
$result = mysqli_query($con, "SELECT id, id_klienta, Id_bukietu, data, czy_zrealizowano FROM zamowienia ORDER BY id;");
while( $row = mysqli_fetch_array($result)){
         echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['id_klienta']."</td>";
        echo "<td>".$row['data']."</td>";
        echo "<td>".$row['czy_zrealizowano']."</td>";
        echo "</tr>";
}
mysqli_close($con);
?>
</body>
</html>

<?php

