<?php

try {
    include_once "../dbh.inc.php";

    if (isset($_POST['submit'])) {
        $id_corso = $_POST['IdCorso'];
        $data = $_POST['Data'];
        $ora_inizio = $_POST['OraInizio'];
        $ora_fine = $_POST['OraFine'];
        $sql = "INSERT INTO Lezioni (IdCorso, Data, OraInizio, OraFine) VALUES (?, ?, ?, ?);";

        // query con prepared statement solo sui putni in cui vengono inseriti valori direttamente dall'utente, come studiato per evitare SQL injection
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "isss", $id_corso, $data, $ora_inizio, $ora_fine);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: /addLesson.php?success=1");
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
    header("Location: /addLesson.php?error=".urlencode($e->getMessage()));
    exit();
}