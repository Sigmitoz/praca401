<?php
include("db.php");

$szukane = isset($_GET['szukaj']) ? "%" . $_GET['szukaj'] . "%" : "%";

$stmt = $conn->prepare("SELECT id, nazwa, cena, obraz FROM kwiaty WHERE nazwa LIKE ?");
$stmt->bind_param("s", $szukane);
$stmt->execute();
$wynik = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyszukiwarka kwiatów</title>
    <style>
        header img{
        width: 50px;
    }

    header {
      background-color: #5a189a;
      border-bottom: 4px solid black;
      text-align: center;
      padding: 0.4em;
      font-size: 3em;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
    }
    </style>
</head>
<body>
    <header>
    <a href="logowanie.php"><img src="login.png" alt="" style="height: 50px;"></a>
    <a href="glowna.html"><p>KWIACIARNIA</p></a>
    <a href="wyszukiwarka.php"><img src="trolley.png" alt="" style="height: 50px;"></a>
  </header>
    
    <h1>Wyszukiwarka kwiatów</h1>
    <form method="GET">
        <input type="text" name="szukaj" placeholder="Szukaj kwiatu..." value="<?= htmlspecialchars($_GET['szukaj'] ?? '') ?>">
        <button type="submit">Szukaj</button>
    </form>

    <form method="POST" action="zaplac.php">
        <div style="display: flex; flex-wrap: wrap;">
            <?php while ($row = $wynik->fetch_assoc()): ?>
                <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['obraz']) ?>" width="100"><br>
                    <strong><?= htmlspecialchars($row['nazwa']) ?></strong><br>
                    Cena: <?= $row['cena'] ?> zł<br>
                    <label>Ilość: 
                        <input type="number" name="ilosci[<?= $row['id'] ?>]" min="0" max="100" value="0">
                    </label>
                </div>
            <?php endwhile; ?>
        </div>
        <button type="submit">Zapłać</button>
    </form>
</body>
</html>
