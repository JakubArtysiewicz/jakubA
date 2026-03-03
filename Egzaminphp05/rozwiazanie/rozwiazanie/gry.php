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

                mysqli_close($conn);

                ?>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>000000000000</p>
        </section>
        <section id="srodkowy">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "gry");
                $query = "SELECT gry.id, gry.nazwa, gry.zdjecie FROM gry;";
                $answer = mysqli_query($conn, $query);
                while($row = mysqli_fetch_row($answer)){
                    echo "<div>";
                    echo "<img  src = '$row[2]' alt = '$row[1]' title = '$row[0]'>";
                    echo "<p>" . $row[1] . "</p>";
                    echo "</div>";
                }
                mysqli_close($conn);
            ?>
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

            <?php

                if(isset($_POST['nazwa'])){

                    $opis = $_POST['opis'];
                    $nazwa = $_POST['nazwa'];
                    $cena = $_POST['cena'];
                    $zdjecie = $_POST['zdjecie'];

                    $query = "INSERT INTO `gry` (`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('$nazwa', '$opis', '0', '$cena', '$zdjecie');";
                    $conn = mysqli_connect("localhost", "root", "", "gry");
                    mysqli_query($conn, $query);
                    mysqli_close($conn);

                }
            ?>
            
        </section>
    </main>
    <footer>
        <form action="gry.php" method="POST">
            <label>
                nazwa<input type="text" name="id">
            </label>
            <button type="submit" name="pokaz">Pokaż opis</button>
        </form>

        <?php
            if(isset($_POST['pokaz'])){
                $id = $_POST['id'];
                $query = "SELECT gry.nazwa, LEFT(gry.opis, 100) AS skrot_opisu, gry.punkty, gry.cena FROM gry WHERE gry.id = '$id';";
                $conn = mysqli_connect("localhost", "root", "", "gry");
                $answer = mysqli_query($conn, $query);
                while($row = mysqli_fetch_row($answer)){

                    echo "<h2>" . $row[0] . "," . $row[2] . "punktów" . $row[3] . "zł" . "</h2>" ;
                    echo "<p>" . $row[1] . "</p>";

                }
            
                mysqli_close($conn);

            }
        ?>
    </footer>
</body>

</html>