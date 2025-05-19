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
    <th>imie</th>
    <th>nazwisko</th>
    <th>telefon</th>
    <th>adres</th>
</tr>
<?php
$con = mysqli_connect("localhost", "root", "", "kwiaciarnia");
$result = mysqli_query($con, "SELECT id, imie, nazwisko, telefon, adres FROM klient ORDER BY id;");
while( $row = mysqli_fetch_array($result)){
         echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['imie']."</td>";
        echo "<td>".$row['nazwisko']."</td>";
        echo "<td>".$row['telefon']."</td>";
        echo "<td>".$row['adres']."</td>";
        echo "</tr>";
}
mysqli_close($con);
?>
</body>
</html>

<?php

