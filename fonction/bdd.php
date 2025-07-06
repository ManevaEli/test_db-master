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
     $resultat = mysqli_query($bdd,'SELECT D.dept_no, D.dept_name, e.first_name, e.last_name,
       dm.from_date,
       (SELECT COUNT(*) FROM v_employees_departements v WHERE v.dept_name = D.dept_name) as nb
FROM departments D
JOIN dept_manager dm ON D.dept_no = dm.dept_no
JOIN employees e ON dm.emp_no = e.emp_no
WHERE dm.from_date = (
    SELECT MAX(from_date)
    FROM dept_manager
    WHERE dept_no = D.dept_no
)
ORDER BY D.dept_name
');
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
function recherche($name, $dept, $min, $max)
{    
    $bdd = dbconnect();
    $nom = sprintf ("SELECT e.first_name, e.last_name
    FROM employees e 
    JOIN dept_emp de ON e.emp_no = de.emp_no
    JOIN departments d ON de.dept_no = d.dept_no 
    WHERE 1=1 
    AND e.first_name LIKE '%%%s%%'
    AND d.dept_name LIKE '%%%s%%'
    AND TIMESTAMPDIFF(YEAR, e.birth_date, NOW()) BETWEEN %d AND %d LIMIT 20", $name, $dept, $min, $max);
    $sqlpub=mysqli_query($bdd,$nom);
    return $sqlpub;

}
function getQuery($dept, $name, $min, $max, $page) {
    $sql = "SELECT * FROM v_employees_departements WHERE 1=1";
    if (strcmp($dept, ' ') != 0) {
        $sql .= sprintf(" AND dept_name LIKE '%%%s%%'", $dept);
    }

    if (strcmp($name, ' ') != 0) {
        $sql .= sprintf(" AND first_name LIKE '%%%s%%'", $name);
    }

    if (strcmp($min, ' ') != 0 && strcmp($max, ' ') != 0 && $min < $max) {
        $sql .= " AND birth_date < DATE_SUB(NOW(), INTERVAL " . $min . " YEAR) AND birth_date > DATE_SUB(NOW(), INTERVAL " . $max . " YEAR)";
    }

    if ($page == 1) {
        $sql .= " LIMIT 20";
    } else {
        $sql .= " LIMIT " . 20 * ($page - 1) . ", 20";
    }

    return $sql;
}

function getNbResult($dept, $name, $min, $max)
{
    $sql = "SELECT COUNT(*) nb FROM v_employees_departements
    WHERE 1=1";
    if (strcmp($dept, ' ') != 0) {
        $sql .= sprintf(" AND dept_name LIKE '%%%s%%'", $dept);
    }

    if (strcmp($name, ' ') != 0) {
        $sql .= sprintf(" AND first_name LIKE '%%%s%%'", $name);
    }

    if (strcmp($min, ' ') != 0 && strcmp($max, ' ') != 0 && $min < $max) {
        $sql .= " AND birth_date < DATE_SUB(NOW(), INTERVAL " . $min . " YEAR) AND birth_date > DATE_SUB(NOW(), INTERVAL " . $max . " YEAR)";
    }

    $result = mysqli_query(dbconnect(), $sql);
    if ($data = mysqli_fetch_assoc($result)) {
        return $data['nb'];
    }
    return 0;
}

function searchEmploye($dept, $name, $min, $max, $page)
{
    $sql = getQuery($dept, $name, $min, $max, $page);
    $tab = mysqli_query(dbconnect(), $sql);
    $result = array();
    while ($data = mysqli_fetch_assoc($tab)) {
        $result[] = $data;
    }
    mysqli_free_result($tab);
    return $result;
}
function countSalaire()
{
    $bdd = dbconnect();
    $resultat = mysqli_query($bdd, "SELECT dept_name, COUNT(*) AS nb, AVG(salary) AS salaire_moyenne FROM v_employees_departements GROUP BY dept_name");
    
    $donnees = [];
    while ($ligne = mysqli_fetch_assoc($resultat)) {
        $donnees[] = $ligne;
    }
    return $donnees;
}

function countEmplye(){

    $bdd = dbconnect();
    $resultat = mysqli_query($bdd, "SELECT dept_name, COUNT(*) AS nb FROM v_employees_departements GROUP BY dept_name");
    $donnees = [];
    while ($ligne = mysqli_fetch_assoc($resultat)) {
        $donnees[] = $ligne;
    }
    return $donnees;

}


function formatDate($dateStr) {
    $timestamp = strtotime($dateStr);
    if (!$timestamp) return false;
    return strftime('%d %b %Y', $timestamp);
}

?>