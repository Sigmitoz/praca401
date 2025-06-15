<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <title>Logowanie z avatar</title>
  <link rel="stylesheet" href="cs24.css">
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

  <form class="login-container" action="#" method="POST">
    <div class="avatar-circle">
      <img src="avatar.jpg" alt="Avatar profilowy" />
    </div>
    <input type="text" name="telefon" placeholder="Telefon" required autocomplete="username" />
    <input type="password" name="haslo" placeholder="Hasło" required autocomplete="current-password" />
    <button type="submit">Zaloguj</button>
  </form>
  
  <?php 
  include("db.php");

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $telefon = $_POST['telefon'];
      $haslo = $_POST['haslo'];
      
      $stmt = $conn->prepare("SELECT id, Imie, Nazwisko FROM klient WHERE Telefon = ? AND haslo = ?");
      $stmt->bind_param("is", $telefon, $haslo);
      $stmt->execute();
      $result = $stmt->get_result();
      
      if ($user = $result->fetch_assoc()) {
          $_SESSION['klient_id'] = $user['id'];
          $_SESSION['imie'] = $user['Imie'];
          $_SESSION['nazwisko'] = $user['Nazwisko'];
          header("Location: panel.php");
          exit;
      } else {
          echo "<p style='text-align:center; color:red;'>Nieprawidłowy telefon lub hasło.</p>";
          echo "<p style='text-align:center;'><a href='rejestracja.php'>Nie masz konta? Zarejestruj się tutaj</a></p>";
      }
  }
  ?>
</body>
</html>
