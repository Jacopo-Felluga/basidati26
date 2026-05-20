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
        <h3 class="text-center mb-4">Aggiungi Nuovo Iscritto</h3>
        <div id="success-alert" class="d-none alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successo!</strong> Iscritto aggiunto con successo.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="error-alert" class="d-none alert alert-danger alert-dismissible fade show" role="alert">
        <strong id="error-label"></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="http://basi:8888/functions/newSubscriber.php" method="POST">
            <div class="mb-3">
                <label for="cf" class="form-label">Codice Fiscale</label>
                <input type="text" class="form-control" id="cf" name="CF" required maxlength="16">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="Nome" required>
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome</label>
                <input type="text" class="form-control" id="cognome" name="Cognome " required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="tel" class="form-control" id="telefono" name="Telefono">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="Email" required>
            </div>
            <div class="mb-3">
                <label for="data_nascita" class="form-label">Data di Nascita</label>
                <input type="date" class="form-control" id="data_nascita" name="DataDiNascita" required>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" name="submit" class="btn btn-success px-5">Salva</button>
                <a href="index.php" class="btn btn-secondary px-4">Annulla</a>
            </div>
        </form>
    </div>
    <script>
        const searchParams = new URLSearchParams(window.location.search); 
        if (searchParams.get('success') === 1) {
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