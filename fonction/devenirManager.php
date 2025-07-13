<?php

require_once("../fonction/bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Manager</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php 
if (isset($_POST['date']) && isset($_POST['emp']) && isset($_POST['name'])) {
    $date = $_POST['date'];
    $no_emp = $_POST['emp'];
    $nom_dept = $_POST['name'];

    $pre_manager = recentMAnager();

    echo "Date précédente : $pre_manager<br>";
    echo "Date proposée : $date<br>";

    if ($pre_manager < $date) {
        $bdd = dbconnect();

        $num = get_numdept($nom_dept);

        $sql = sprintf(
            "INSERT INTO dept_manager (dept_no, emp_no, from_date, to_date)
             VALUES ('%s', '%s', '%s', '9999-01-01')",
            $num, $no_emp, $date
        );

        $result = mysqli_query($bdd, $sql);

      if ($result) {
    echo '
    <div class="success-message">
        ✅ Nouveau manager enregistré 🎉
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
    </div>';
} else {
    echo '<div class="error-message">❌ Erreur SQL : ' . mysqli_error($bdd) . '</div>';
}
    } else {
        echo " Le manager actuel est plus récent ou égal à la date proposée.";
    }
} else {
    echo " Données manquantes dans le formulaire (date, emp ou name).";
}


?>

</body>
</html>

   