<?php

try {
    include_once "../dbh.inc.php";

    if (isset($_POST['submit'])) {
        $cf = $_POST['CF'];
        $nome = $_POST['Nome'];
        $cognome = $_POST['Cognome'];
        $telefono = $_POST['Telefono'];
        $email = $_POST['Email'];
        $data_nascita = $_POST['DataDiNascita'];
        $sql = "INSERT INTO Iscritti (CF, Nome, Cognome, Telefono, Email, DataDiNascita, NumeroIscrizioni)  VALUES (?, ?, ?, ?, ?, ?, 0);";

        // query con prepared statement come studiato per evitare SQL injection
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "ssssss", $cf, $nome, $cognome, $telefono, $email, $data_nascita);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: /addSubscriber.php?success=1");
                exit();
            } else {
                die("Errore durante l'inserimento: " . mysqli_stmt_error($stmt));
            }
            
            mysqli_stmt_close($stmt);
        } else {
            die("Errore nella preparazione della query: " . mysqli_error($conn));
        }
    }
} catch (Exception $e) {
    header("Location: /addSubscriber.php?error=".urlencode($e->getMessage()));
    exit();
}