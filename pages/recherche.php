<?php
require_once("../fonction/bdd.php");
$department=$_GET['Departement'];
$nom=$_GET['Nom'];
$minim=$_GET['min'];
$maxim=$_GET['max'];
if (!isset($_GET['page'])) {
    $page = 1;
}else{
    $page = $_GET['page'];
}
$result=searchEmploye($department, $nom, $minim, $maxim, $page);

?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employees</title>
    	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <table class="table table-striped table-hover">
    <tr>
            <th scope="col">Emp no</th>
            <th scope="col">Departement</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $le): ?>
            <tr>
                <td><?= htmlspecialchars($le['emp_no']) ?></td>
                <td><?= htmlspecialchars($le['dept_name']) ?></td>
                <td><?= htmlspecialchars($le['first_name']) ?></td>
                <td><?= htmlspecialchars($le['last_name']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </body>
    <footer class="text-center mt-4 mb-4">

    <div class="btn-group" role="group">
        <a href="recherche.php?Departement=<?= $department ?>&Nom=<?= $nom ?>&min=<?= $minim ?>&max=<?= $maxim ?>&page=<?= $page-1 ?>" 
           class="btn btn-outline-primary <?= $page <= 1 ? 'disabled' : '' ?>">
           Précédent
        </a>
        <a href="recherche.php?Departement=<?= $department ?>&Nom=<?= $nom ?>&min=<?= $minim ?>&max=<?= $maxim ?>&page=<?= $page+1 ?>" 
           class="btn btn-outline-primary">
           Suivant
        </a>
    </div>
    <div class="mt-2">
        <a href="index.php" class="btn btn-link">Retour à l'accueil</a>
    </div>
</footer>
</html>

