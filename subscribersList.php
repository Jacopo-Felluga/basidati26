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

        <h1>Iscritti</h1>
        <div class="row">
        <div class="col-6">
                <a href="/addSubscriber.php"><button class="btn btn-primary mb-3">Aggiungi Iscritto</button></a>
            </div>    
        <div class="col-6">
                <a href="/"><button class="btn btn-primary mb-3">Torna indietro</button></a>
            </div>
        </div>
        <table class="table table-striped">
            <tr>
                <th>CF</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Data di Nascita</th>
                <th>N. Iscrizioni</th>
            </tr>
        <?php
            $sql = "SELECT * FROM iscritti ORDER BY CF";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $datePieces = explode("-", $row['DataDiNascita']);
                    $convertedDate = $datePieces[2]."/".$datePieces[1]."/".$datePieces[0];
                    echo "<tr><td>" . $row['CF'] . "</td><td>" . $row['Nome'] . "</td><td>" . $row['Cognome'] . "</td><td>" . $row['Telefono'] . "</td><td>" . $row['Email'] . "</td><td>" . $convertedDate . "</td><td>" . $row['NumeroIscrizioni'] . "</td></tr>";
                }
            }
        ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>