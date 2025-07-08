<?php
require_once("../fonction/bdd.php");

$date =$_POST['date'];
echo $pre_manager=recentMAnager();

if($pre_manager < $date)
{
    $num = get_numdept();
    $no_emp= $_POST['emp'];
    $bdd = dbconnect();
    $sql = $sql = sprintf(
    "INSERT INTO dept_manager (dept_no, emp_no, from_date, to_date)
     VALUES ('%s', '%s', '%s', '9999-01-01')",
    $num, $no_emp, $date
);

    echo "nouveau manager enregistré";
}
else {
    echo "Erreur : la date est antérieure au dernier manager";;
}
?>
