<?php
require_once("../fonction/bdd.php");
$result = countSalaire();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <h2>Nombre employé et salaire moyen pour chaque département</h2>
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

       <div class="container">
            <div class="row justify-content-md-center text-center">

        <section class="col-sm-12 col-lg-8 bloc py-5" >
    <table class="table table-striped centered-table">
        <thead>
            <tr>
                <th  scope="col">Département</th>
                <th scope="col">Genre</th>
                <th scope="col">Nombre d'employés</th>
                <th scope="col">Salaire moyen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $ligne): ?>
                <tr>
                    <td scope="row"><?= htmlspecialchars($ligne['dept_name']) ?></td>
                    <td scope="row"><?= htmlspecialchars($ligne['gender']) ?></td>
                    <td scope="row"><?= htmlspecialchars($ligne['nb']) ?></td>
                    <td scope="row"><?= number_format($ligne['salaire_moyenne'], 2) ?> $</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </section>
            </div>
            </div>
</body>
</html>
