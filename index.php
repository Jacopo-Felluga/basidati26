<?php
    include_once "dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Gestionale Palestra Mitica</h1>
    <div class="container text-center">
        <!-- iscritti -->
        <hr />    
        <h3>Iscritti</h3>
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary mb-3">Visualizza Tutti</button>
            </div>
            <div class="col-6">
                <button class="btn btn-primary mb-3">Aggiungi Iscritto</button>
            </div>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Data di Nascita</th>
                <th>N. Iscrizioni</th>
            </tr>
        <?php
            $sql = "SELECT * FROM iscritti LIMIT 10;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $datePieces = explode("-", $row['DataDiNascita']);
                    $convertedDate = $datePieces[2]."/".$datePieces[1]."/".$datePieces[0];
                    echo "<tr><td>" . $row['Nome'] . "</td><td>" . $row['Cognome'] . "</td><td>" . $row['Telefono'] . "</td><td>" . $row['Email'] . "</td><td>" . $convertedDate . "</td><td>" . $row['NumeroIscrizioni'] . "</td></tr>";
                }
            }
        ?>
        </table>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>