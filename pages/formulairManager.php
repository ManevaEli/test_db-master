<?php 
require_once("../fonction/bdd.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <h3>Devenir manager</h3>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="nb_employee.php">Salaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formulairerech.php">Recherche</a>
        </li>
</div>

  </div>
</nav>

    </header>

<body>
    <header>
        <h1>Devenir Manager </h1>
        <h2>Département <?php echo $_POST['name'];?></h2>
    </header>
    <main>

    <div class="container">
    <div class="row justify-content-center">
        <section class="col-12 col-md-8 col-lg-6 py-5">
            <form action="../fonction/devenirManager.php" method="POST" class="modern-form">
                <div class="form-group mb-4">
                    <label for="date-field" class="form-label">Date de début</label>
                    <input type="date" id="date-field" name="date" class="form-control form-control-lg">
                      <input type="hidden" name="emp" value="<?php echo $_POST['no_emp']; ?>">
                      <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Valider</button>
            </form>
        </section>
    </div>
</div> 

             </body>
    </main>
</body>
<footer>
    <a href="index.php" class="btn btn-link">Retour à l'accueil</a>
</footer>

</html>
