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

        <h1>Corsi</h1>
        <div class="row">
            <div class="col-6">
                <a href="" ><button class="btn btn-primary mb-3">Aggiungi Corso</button></a>
            </div>
            <div class="col-6">
                <a href="/" ><button class="btn btn-primary mb-3">Torna indietro</button></a>
            </div>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Stato</th>
                <th>Sala</th>
                <th>Istruttore</th>
                <th>Categoria</th>
            </tr>        
        <?php
            $sql = "SELECT *, Sale.Nome AS NomeSala, Istruttori.Nome AS NomeIstruttore, Istruttori.Cognome AS CognomeIstruttore, Categorie.Nome AS NomeCategoria FROM Corsi INNER JOIN Sale ON Corsi.IdSala = Sale.Id INNER JOIN Istruttori ON Corsi.IdIstruttore = Istruttori.CF INNER JOIN Categorie ON Corsi.IdCategoria = Categorie.Id;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $datePieces = explode("-", $row['DataDiNascita']);
                    $convertedDate = $datePieces[2]."/".$datePieces[1]."/".$datePieces[0];
                    echo "<tr><td>" . $row['Nome'] . "</td><td>" . ($row['Stato'] == 1 ? "<font color='green'>Attivo</font>" : "<font color='red'>Non Attivo</font>") . "</td><td>" . $row['NomeSala'] . "</td><td>" . $row['NomeIstruttore'] . " " . $row['CognomeIstruttore'] . "</td><td>" . $row['NomeCategoria'] . "</td></tr>";
                }
            }
        ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>