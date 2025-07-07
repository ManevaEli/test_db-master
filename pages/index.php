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
        <h1>Liste des départements</h1>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-md-center">

                <section class="col-sm-12 col-lg-8  py-5">
                    <form action="recherche.php" method="get">
                        <p>Département <input type="text" name="Departement" placeholder="Rechercher..."/></p>
                        <p>Nom <input type="text" name="Nom" placeholder="Rechercher..."/></p>
                        <p>Âge entre <input type="number" name="min" value="0" placeholder="Âge min"/> et <input type="number" name="max" value="1000" placeholder="Âge max"/></p>
                        <input type="submit" value="Rechercher" />    
                    </form>
                </section>

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
