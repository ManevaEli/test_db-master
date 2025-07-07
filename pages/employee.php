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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <h2>Fiche Employee</h2>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Recherche</a>
        </li>
    </div>
  </div>
</nav>

</header>
<main>
     <div class="container">
            <div class="row justify-content-md-center">
    <section  class="col-sm-12 col-lg-8 bloc py-5">
        <article>
          

              <?php 

     $resultat=get_employe();

     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>

              <h2>À propos de <?php echo $donnees['last_name'];?> <?php echo $donnees['first_name']; ?> </h2>

                      <table class="table table-striped centered-table">
                    <th scope="col">numero</th>
                    <th scope="col">last name</th>
                    <th scope="col">first name </th>
                     <th scope="col">gender</th>
                     <th scope="col">hire_date</th>
                     <th scope="col">Birthday</th>

                    <tr>
                    <td scope="row"><?php echo $donnees['emp_no']; ?></td>
                    <td scope="row"><?php echo $donnees['last_name']; ?></td>
                    <td scope="row"><?php echo $donnees['first_name']; ?></td>
                    <td scope="row"><?php echo $donnees['gender']; ?></td>
                    <td scope="row"><?php echo formatDate($donnees['hire_date']); ?></td>
                    <td scope="row"><?php echo formatDate($donnees['birth_date']); ?></td>
     </tr>
                    
      

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
                        <td scope="row">$ <?php echo formaterChiffre($donnees['salary']); ?> </td>
                    <td scope="row"><?php echo $donnees['title']; ?> </td>
     </tr>  
        <?php }  ?> 
     </article>
     </table>
     <article>
      <h1> Emploi le plus long</h1>
      <>
     </article>
     </section>
       
     </div>
     </div>
</main>
    
</body>
</html>