<?php
include("bdd.php");
   if (isset($_GET['no_emp'])) {
       $emp_no = $_GET['no_emp'];
   } else {
       die("Employee number not provided.");
   }
   $dept=$_GET['dept'];
$date=$_GET['date'];
changer_dept($dept, $date, $emp_no);
?>