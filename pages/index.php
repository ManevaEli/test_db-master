<?php 
require_once("../fonction/bdd.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="style.css">
        <link href="../bootstrap/css/bootstrap.min.css"rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.bundle.mini.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <h1>liste des départements<h1>
            
    </header>
    <main>
        <div class="container">
        <div class="row justify-content-md-center">
        <section class="col-sm-12 col-lg-8 bloc">
            <article>
                 <table class=" table table-dark table-striped centered-table" >
                     <thead>
                    <th scope="col">numero departement<t/h>
                    <th scope="col">departement</th>
                    <th scope="col">last name</th>
                    <th scope="col">Date </th>
                    </thead>
                  <?php 
     $resultat=get_actualMAnager();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
   <link rel="stylesheet" type="text/css" href="style.css">
                    <tr>
                    <td scope="row"> <?php echo $donnees['dept_no']; ?> </td>
                    <form action="departement.php" method="post">
                        <td scope="row">
                            <input type="hidden" name="dept_no" value="<?php echo $donnees['dept_no']; ?>">
                            <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer;">
                                <?php echo $donnees['dept_name']; ?>
                            </button>
                        </td>
                    </form>
                    <td scope="row"><?php echo $donnees['last_name']; ?> <?php echo $donnees['first_name']; ?> </td>
                    <td scope="row"><?php echo $donnees['from_date']; ?> </td>
                    </tr>
        <?php }  ?> 


             </table>
            </article>
        </section>
     </div>
     </div>
    </main>
</body>
</html>





