<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <title>Rejestracja klienta</title>
  <link rel="stylesheet" href="stylrej.css">
</head>
<body>
   <header>
    <a href="logowanie.php"><img src="login.png" alt="" style="height: 50px;"></a>
    <a href="glowna.html"><p>KWIACIARNIA</p></a>
    <a href="wyszukiwarka.php"><img src="trolley.png" alt="" style="height: 50px;"></a>
  </header>

  <h2>Rejestracja klienta</h2>

  <form method="POST">
    Imię: <input type="text" name="imie" required>
    Nazwisko: <input type="text" name="nazwisko" required>
    Telefon: <input type="number" name="telefon" maxlength="9" required>
    Adres: <input type="text" name="adres" required>
    Hasło: <input type="password" name="haslo" required>
    <button type="submit">Zarejestruj się</button>
  </form>

  <?php 
    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $telefon = $_POST['telefon'];
        $adres = $_POST['adres'];
        $haslo = $_POST['haslo'];

        $stmt = $conn->prepare("INSERT INTO klient (Imie, Nazwisko, Telefon, Adres, haslo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $imie, $nazwisko, $telefon, $adres, $haslo);

        if ($stmt->execute()) {
            echo "<div class='message'>Zarejestrowano pomyślnie! <a href='logowanie.php'>Zaloguj się</a></div>";
        } else {
            echo "<div class='error'>Błąd: " . $stmt->error . "</div>";
        }
    }
  ?>

</body>
</html>
