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

    <title>departement</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row justify-content-md-center">

        <section class="col-sm-12 col-lg-8 bloc py-5">
            <article>
             <table class="table table-striped centered-table">
                    <th scope="col">last name</th>
                    <th scope="col">first name </th>
              <?php 
     $resultat=get_employees();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                   <form action="employee.php" method="post">
                        <td scope="row">
                            <input type="hidden" name="emp" value="<?php echo $donnees['emp_no']; ?>">
                            <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer;">
                                <?php echo$donnees['last_name']; ?>
                            </button>
                        </td>
                    </form>
                    <td scope="row"><?php echo $donnees['first_name']; ?> </td>
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