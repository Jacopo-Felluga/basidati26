<?php
    include_once "dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include "head.php";
?>
<body>
    <?php 
    include "navbar.php";
    ?>
    <div class="container text-center">
        <!-- iscritti -->

        <h1>Lezioni</h1>
        <div class="row">
            <div class="col-6">
                <a href="/addLesson.php"><button class="btn btn-primary mb-3">Aggiungi Lezione</button></a>
            </div>    
        <div class="col-6">
                <a href="/"><button class="btn btn-primary mb-3">Torna indietro</button></a>
            </div>
        </div>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Nome Corso</th>
                <th>Data</th>
                <th>Ora Inizio</th>
                <th>Ora Fine</th>
                <th>Sala</th>
            </tr>
        <?php
            // $sql = "SELECT * FROM Lezioni WHERE Data >= CURDATE() ORDER BY Data  LIMIT 10;";
            $sql = "SELECT *, Corsi.Nome AS NomeCorso, Sale.Nome AS NomeSala FROM Lezioni INNER JOIN Corsi ON Lezioni.IdCorso = Corsi.Id INNER JOIN Sale ON Corsi.IdSala = Sale.Id WHERE Data >= '2026-06-29' ORDER BY Data;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $datePieces = explode("-", $row['Data']);
                    $startHourPieces = explode(":", $row['OraInizio']);
                    $endHourPieces = explode(":", $row['OraFine']);
                    $convertedDate = $datePieces[2]."/".$datePieces[1]."/".$datePieces[0];
                    echo "<tr><td>" . $row['NomeCorso'] . "</td><td>" . $convertedDate . "</td><td>" . $startHourPieces[0] . ":" . $startHourPieces[1] . "</td><td>" . $endHourPieces[0] . ":" . $endHourPieces[1] . "</td><td>" . $row['NomeSala'] . "</td></tr>";
                }
            }
        ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>