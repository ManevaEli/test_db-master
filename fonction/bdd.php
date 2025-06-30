<?php

function dbconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');
        if (!$connect) {    
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}
function get_dept()
{
    $bdd = dbconnect();
    $resultat=mysqli_query($bdd , 'select * from departments');
    return $resultat;
}
function get_actualMAnager() {
     $bdd = dbconnect();
     $resultat = mysqli_query($bdd,'SELECT D.dept_no, D.dept_name, e.first_name, e.last_name, dm.from_date
FROM departments D
JOIN dept_manager dm ON D.dept_no = dm.dept_no
JOIN employees e ON dm.emp_no = e.emp_no
WHERE dm.from_date = (
    SELECT MAX(from_date)
    FROM dept_manager
    WHERE dept_no = D.dept_no
)
ORDER BY D.dept_name');
       return $resultat;
}

function get_employees()
{
     $bdd = dbconnect();
     $nom_d=$_POST['dept_no'];
    $resultat=sprintf("SELECT e.last_name, e.first_name, e.emp_no FROM employees e 
        JOIN dept_emp de ON e.emp_no = de.emp_no
        WHERE de.dept_no = '%s'
        limit 50
        ",$nom_d);

    $return =  mysqli_query($bdd,$resultat);

    return $return;
    
}

function get_employe()
{
     $bdd = dbconnect();
     $nom_d=$_POST['emp'];
    $resultat=sprintf("SELECT * from employees
    where emp_no = '%s'
        ",$nom_d);

    $return =  mysqli_query($bdd,$resultat);

    return $return;
    
}
 function get_salaire()
{
     $bdd = dbconnect();
     $nom_d=$_POST['emp'];
    $resultat=sprintf("SELECT s.salary, t.title
    from salaries s join titles t on s.emp_no = t.emp_no
    where t.emp_no = '%s'",$nom_d);

    $return =  mysqli_query($bdd,$resultat);

    return $return;
    
}
?>