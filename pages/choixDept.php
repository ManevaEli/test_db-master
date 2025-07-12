<?php
require_once("../fonction/bdd.php");
session_start();
$emp_no=$_GET['no_emp'];
$_SESSION=$_GET['no_emp'];
$listeDepartements = get_dept();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Employees</title>
</head>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <!-- <h1>Liste des départements</h1> -->
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
        <li class="nav-item">
          <a class="nav-link" href="add_dept.php">Ajouter Département</a>
        </li>

</div>

  </div>
</nav>

    </header>

<body>
    <header>
        <h1>Changer de Département</h1>
    </header>
    <main>
    <div class="container">
    <div class="row justify-content-center">
    <p>Département actuel: <?php echo $_GET['name_dept']; ?></p>
    <p>Date de début: <?php echo $_GET['date_debut']; ?></p>
    <section class="col-12 col-md-8 col-lg-6 py-5">
        <form action="../fonction/traitement_dept.php" method="get" class="modern-form">
        <input type = "hidden" name="no_emp" value="<?php echo $emp_no; ?>"> 
<div class="form-group mb-4">
    <label for="departement">Departement</label>
    <select name="dept" id="departement">
        <option value="">Aucun</option>
<?php foreach ($listeDepartements as $ld): ?>
    <?php if ($ld['dept_name'] != $_GET['name_dept']): ?>
        <option value="<?= htmlspecialchars($ld['dept_no']) ?>" data-dept-name="<?= htmlspecialchars($ld['dept_name']) ?>">
            <?= htmlspecialchars($ld['dept_name']) ?>
        </option>
    <?php endif; ?>
<?php endforeach; ?>
    </select>
</div>
                <div class="form-group mb-4">
                    <label for="date-field" class="form-label">Date de début</label>
                    <input type="date" id="date-field" name="date" class="form-control form-control-lg">
                </div>
                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Valider</button>
            </form>
    </section>
    </main>
</body>
<footer>
    <a href="index.php" class="btn btn-link">Retour à l'accueil</a>
</footer>
</html>
