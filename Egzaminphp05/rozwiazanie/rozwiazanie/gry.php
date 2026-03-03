<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <main>
        <section id="lewy">
            <h3>Top 5 gier w tym miesiącu</h3>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "gry");
                $query = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
                $answer = mysqli_query($conn, $query);
                echo "<ul>";
                while($row = mysqli_fetch_row($answer)){
                    echo "<li>";
                    echo "<span class = 'nazwa'>" . $row[0] ."</span>";
                    echo "<span class = 'punkty'>" . $row[1] ."</span>";
                    echo "</li>";
                };
                echo "</ul>";
                ?>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>000000000000</p>
        </section>
        <section id="srodkowy">
            
        </section>
        <section id="prawy">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="POST">
                <label>
                    nazwa<br>
                    <input type="text" name="nazwa"><br>
                </label>
                <label>
                    opis<br>
                    <input type="text" name="opis"><br>
                </label>
                <label>
                    cena<br>
                    <input type="text" name="cena"><br>
                </label>
                <label>
                    zdjecie<br>
                    <input type="text" name="zdjecie"><br>
                </label>
                <button type="submit" name="dodaj">DODAJ</button>
            </form>
            
        </section>
    </main>
    <footer>
        <form action="gry.php" method="POST">
            <label>
                nazwa<input type="text" name="id">
            </label>
            <button type="submit" name="pokaz">Pokaż opis</button>
        </form>
        
        <h2></h2>
    </footer>
</body>

</html>