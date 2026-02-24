<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>KONTAKT</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </section>
        <section id="srodkowy">
            <h2>GALERIA</h2>
            <?php 
            $conn = mysqli_connect("localhost","root","","egzamin3");
            $query = "SELECT nazwaPliku, podpis from zdjecia ORDER BY podpis ASC;";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_row($result)){
                echo '<img src="'.$row[0].'" alt = "'.$row[1].'">';
            };
            mysqli_close($conn);
            ?>
        </section>
        <section id="prawy">
            <h2>PROMOCJE</h2>
            <table>
                <tr>
                    <td>Jesień</td>
                    <td>Grupa 4+</td>
                    <td>Grupa 10+</td>
                </tr>
                <tr>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                </tr>
            </table>
        </section>
    </main>
    <section id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php 
            $conn = mysqli_connect("localhost","root","","egzamin3");
            $query2 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE wycieczki.dostepna LIKE 1;";
            $result2 = mysqli_query($conn,$query2);
            while($row = mysqli_fetch_row($result2)){
            echo ''.$row[0].' '.$row[1].' '.$row[2]."cena: ".$row[3]."<br>";
            };
            mysqli_close($conn);
            ?>
    </section>
    <footer>
        <p>Stronę wykonał: 0000000000000</p>
    </footer>
</body>

</html>