<?php
require_once("../fonction/bdd.php");
$department=$_GET['Departement'];
$nom=$_GET['Nom'];
$minim=$_GET['min'];
$maxim=$_GET['max'];
$page= isset($_GET['page']) ? (int)$_GET['page'] : 1;
$result=recherche($nom, $department, $minim, $maxim);

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
    <?php
if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
            <p><?php echo $data['first_name'], ' ', $data['last_name']; ?></p>
        <?php } ?>
<?php } else {
    echo "Aucun employe ne correspond à votre recherche '".$nom."'";
}
mysqli_free_result($result);
?>
    <p><a href="?page=0">precedant </a> <a href="?page=1">suivant</a></p>



    </body>
    <footer>
    <p><a href="index.php">retourner</a></p>
</footer>
</html>

