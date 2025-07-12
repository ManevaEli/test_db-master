<?php 
require_once("../fonction/bdd.php"); 
session_start();
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
    <h3>Département <?php echo $_POST['name']; ?></h3>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="nb_employee.php">Salaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formulairerech.php">Recherche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_dept.php">Ajouter Département</a>
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
            <p class="text-info-emphasis"> Fiche d'Employe</p>
              <?php 

     $resultat=get_employe();

     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>

              <h2>À propos de <?php echo $donnees['last_name'];?> <?php echo $donnees['first_name']; ?> </h2>

                      <table class="table table-striped centered-table">
                    <th scope="col">Département</th>
                    <th scope="col">numero</th>
                    <th scope="col">nom</th>
                    <th scope="col">prénoms</th>
                     <th scope="col">genre</th>
                     <th scope="col">date de début</th>
                     <th scope="col">date de naissance</th>

                    <tr>
                    <td scope="row"><?php echo $donnees['dept_name']; ?></td>
                    <td scope="row"><?php echo $donnees['emp_no']; ?></td>
                    <td scope="row"><?php echo $donnees['last_name']; ?></td>
                    <td scope="row"><?php echo $donnees['first_name']; ?></td>
                    <td scope="row"><?php echo $donnees['gender']; ?></td>
                    <td scope="row"><?php echo formatDate($donnees['hire_date']); ?></td>
                    <td scope="row"><?php echo formatDate($donnees['birth_date']); ?></td>
     </tr>               
     </table>
     <section class="buttons py-5" style="display: flex; justify-content: center; gap: 8px;">
    <form class="button-group" action="formulairManager.php" method="POST">
        <button class="btn btn-primary btn-lg" type="submit">Devenir Manager</button>
        <input type = "hidden" name="no_emp" value="<?php echo $donnees['emp_no']; ?>"> 
        <input type = "hidden" name="name" value="<?php echo $_POST['name']; ?>"> 
    </form>
    <form class="button-group" action="choixDept.php" method="GET">
        <input type = "hidden" name="name_dept" value="<?php echo $donnees['dept_name']; ?>"> 
        <input type = "hidden" name="date_debut" value="<?php echo $donnees['from_date']; ?>"> 
        <input type = "hidden" name="no_emp" value="<?php echo $donnees['emp_no']; ?>"> 
        <button class="btn btn-secondary btn-lg" type="submit">Changer de département</button>
    </form>
</section>
       <?php }?>
     </article>

        <article>

        <h2>Antecedant</h2>
         <table  class="table table-striped centered-table" >
                    <th scope="col">salaire</th>
                    <th scope="col"> fonction </th>
              <?php 

     $resultat=get_salaire();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                        <td scope="row">$ <?php echo formaterChiffre($donnees['salary']); ?> </td>
                    <td scope="row"><?php echo $donnees['title']; ?> </td>
     </tr>  
        <?php }  ?> 
     </table>
     </article>
     <article>
      <h2> Emploi le plus long </h2>
       <table  class="table table-striped centered-table" >
                    <th scope="col" >Fonction</th>
                    <th scope="col">date de debut</th>
                    <th scope="col">date de fin</th>
                    <th scope="col">durée</th>
            
     <?php 

     $resultat=getEmploipluslong();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                        <td scope="row"><?php echo $donnees['title'];?></td>
                    <td scope="row"><?php echo formatDate($donnees['from_date']);?> </td>
                    <?php if (formatDate($donnees['to_date']) == "01 Jan 9999") { ?>
                    
                        <td scope="row">continu</td>
                         <td scope="row">jours ++</td>

                  <?php   }  else  { ?>
                    <td scope="row"><?php echo formatDate($donnees['to_date']);?> </td>
                     <td scope="row"><?php echo formaterChiffre($donnees['duration']);?>  jours</td>    
                    <?php } ?>         
     </tr>  
    
     <?php } ?>
     </table>
     </article>
     </section>
       
     </div>
     </div>
</main>
    
</body>
</html>