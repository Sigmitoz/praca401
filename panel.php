<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="logowanie.php"><img src="login.png" alt="" style="height: 50px;"></a>
        <a href="glowna.html"><p>KWIACIARNIA</p></a>
        <a href="wyszukiwarka.php"><img src="trolley.png" alt="" style="height: 50px;"></a>
    </header>
    <main>
    <?php
        include("db.php");
        
        if (!isset($_SESSION['klient_id'])) {
            header("Location: logowanie.php");
            exit;
        }
        echo '<div class="zalogowany">';
        echo "Zalogowany jako: " . $_SESSION['imie'] . " " . $_SESSION['nazwisko'] . "<br>";
        echo "<a href='wyszukiwarka.php'>Przejdź do wyszukiwarki</a><br>";
        echo "<a href='logout.php'>Wyloguj się</a>";
        echo '</div>';
        ?>
    </main>
</body>  
<style>
    main{
        display: flex;
        justify-content: center;
    }

    .zalogowany{
    margin: 50px;
    color: white;
    width: auto;
    padding: 50px;
    height: 150px;
    background-color: #9d4edd;
    border-radius: 10%;
}
</style>
</html>

