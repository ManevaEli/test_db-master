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
        <h1>Nombre d'employés et salaire moyenne</h1>
    </header>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Département</th>
                <th>Genre</th>
                <th>Nombre d'employés</th>
                <th>Salaire moyen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $ligne): ?>
                <tr>
                    <td><?= htmlspecialchars($ligne['dept_name']) ?></td>
                    <td><?= htmlspecialchars($ligne['gender']) ?></td>
                    <td><?= htmlspecialchars($ligne['nb']) ?></td>
                    <td><?= number_format($ligne['salaire_moyenne'], 2) ?> $</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<footer>
    <a href="index.php" class="btn btn-link">Retour à l'accueil</a>
</footer>
</html>
