<?php
include("db.php");

$ilosci = $_POST['ilosci'] ?? [];
$id_klienta = 1; // Stałe ID klienta

foreach ($ilosci as $id_kwiatu => $ilosc) {
    $ilosc = (int)$ilosc;
    $id_kwiatu = (int)$id_kwiatu;

    if ($ilosc > 0) {
        // Pobierz cenę kwiatu
        $stmt = $conn->prepare("SELECT cena FROM kwiaty WHERE id = ?");
        $stmt->bind_param("i", $id_kwiatu);
        $stmt->execute();
        $stmt->bind_result($cena);
        $stmt->fetch();
        $stmt->close();

        // Dodaj bukiet
        $stmt = $conn->prepare("INSERT INTO bukiet (id_kwiatu, data, cena) VALUES (?, CURDATE(), ?)");
        $cena_bukietu = $cena * $ilosc;
        $stmt->bind_param("ii", $id_kwiatu, $cena_bukietu);
        $stmt->execute();
        $id_bukietu = $stmt->insert_id;
        $stmt->close();

        // Dodaj do bukiet_kwiat
        $stmt = $conn->prepare("INSERT INTO bukiet_kwiat (id_bukietu, id_kwiatu, ilosc) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $id_bukietu, $id_kwiatu, $ilosc);
        $stmt->execute();
        $stmt->close();

        // Dodaj zamówienie
        $stmt = $conn->prepare("INSERT INTO zamowienia (id_klienta, Id_bukietu, data, czy_zrealizowano) VALUES (?, ?, CURDATE(), 0)");
        $stmt->bind_param("ii", $id_klienta, $id_bukietu);
        $stmt->execute();
        $stmt->close();
    }
}

echo "<p>Zamówienie złożone!</p>";
echo '<a href="wyszukiwarka.php">Powrót do strony głównej</a>';
