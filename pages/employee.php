<?php 
require_once("../fonction/bdd.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>fiche emplyoee</title>
</head>
<body>

<header>
    <h1>Employee</h1>
</header>
<main>
     <div class="container">
            <div class="row justify-content-md-center">
    <section  class="col-sm-12 col-lg-8 bloc py-5">
        <article>
            <h2>fiche</h2>
                 <table class="table table-striped centered-table">
                    <th scope="col">numero</th>
                    <th scope="col">last name</th>
                    <th scope="col">first name </th>
                     <th scope="col">gender</th>
                     <th scope="col">hire_date</th>
                     <th scope="col">Birthday</th>
              <?php 

     $resultat=get_employe();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                    <td scope="row"><?php echo $donnees['emp_no']; ?></td>
                    <td scope="row"><?php echo $donnees['last_name']; ?></td>
                    <td scope="row"><?php echo $donnees['first_name']; ?></td>
                    <td scope="row"><?php echo $donnees['gender']; ?></td>
                    <td scope="row"><?php echo formatDate($donnees['hire_date']); ?></td>
                    <td scope="row"><?php echo formatDate($donnees['birth_date']); ?></td>
     </tr>
                    
        <?php }  ?> 

     </table>
     </article>

        <article>

        <h2>Antecedant</h2>
         <table  class="table table-striped centered-table" >
                    <th scope="col" >salaire</th>
                    <th scope="col">first nam </th>
              <?php 

     $resultat=get_salaire();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                        <td scope="row"><?php echo$donnees['salary']; ?></td>
                    <td scope="row"><?php echo $donnees['title']; ?> </td>
     </tr>
                    
        <?php }  ?> 
     </article>
     </table>
     </section>
     </div>
     </div>
</main>
    
</body>
</html>