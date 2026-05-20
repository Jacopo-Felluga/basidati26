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
    <div class="container mt-5" style="max-width: 600px;">
        <h3 class="text-center mb-4">Aggiungi Nuova Lezione</h3>
        <div id="success-alert" class="d-none alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successo!</strong> Lezione aggiunta con successo.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="error-alert" class="d-none alert alert-danger alert-dismissible fade show" role="alert">
        <strong id="error-label"></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="http://basi:8888/functions/newLesson.php" method="POST">
            <div class="mb-3">
                <label for="id_corso" class="form-label">Codice ID Corso</label>
                <input type="number" class="form-control" id="id_corso" name="IdCorso" required min="1" placeholder="Es. 5">
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data Lezione</label>
                <input type="date" class="form-control" id="data" name="Data" required>
            </div>

            <div class="mb-3">
                <label for="ora_inizio" class="form-label">Ora Inizio</label>
                <input type="time" class="form-control" id="ora_inizio" name="OraInizio" required>
            </div>
            <div class="mb-3">
                <label for="ora_fine" class="form-label">Ora Fine</label>
                <input type="time" class="form-control" id="ora_fine" name="OraFine" required>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" name="submit" class="btn btn-success px-5">Salva Lezione</button>
                <a href="index.php" class="btn btn-secondary px-4">Annulla</a>
            </div>
        </form>
    </div>
    <script>
        const searchParams = new URLSearchParams(window.location.search); 
        if (searchParams.get('success') === "1") {
            document.getElementById('success-alert').classList.remove("d-none");
        }
        if (searchParams.has('error')) {
            document.getElementById('error-alert').classList.remove("d-none");
            document.getElementById('error-label').textContent = searchParams.get('error');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>