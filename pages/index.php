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
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <h1>Liste des départements</h1>
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
</div>

  </div>
</nav>

    </header>
    <main>
        <div class="container">
            <div class="row justify-content-md-center">
                <section class="col-sm-12 col-lg-8 bloc py-5">
                    <article>
                        <table class="table table-striped centered-table">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro département</th>
                                    <th scope="col">Nom du Département</th>
                                    <th scope="col">Nom du manager</th>
                                    <th scope="col">Nombre d'Employee</th>
                                </tr>
                            </thead>
                            <body>
                                <?php 
                                $resultat = get_actualMAnager();
                               
                                while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $donnees['dept_no']; ?></td>
                                        <td scope="row">
                                            <form action="departement.php" method="post" style="display: inline;">
                                                <input type="hidden" name="dept_no" value="<?php echo $donnees['dept_no']; ?>">
                                                <input type="hidden" name="dept_name" value="<?php echo $donnees['dept_name']; ?>">
                                                <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer;">
                                                    <?php echo $donnees['dept_name']; ?>
                                                </button>
                                            </form>
                                        </td>
                                        <td scope="row"><?php echo $donnees['last_name']; ?> <?php echo $donnees['first_name']; ?></td>      
                                        <td scope="row"><?php echo formaterChiffre($donnees['nb']); ?></td>      

                                    </tr>
                                      <?php } ?>
                           
                            </body>
                        </table>
                    </article>
               
                </section>
            </div>
        </div>
    </main>
</body>
</html>
