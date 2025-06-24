<?php 
require_once("../fonction/bdd.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>departement</title>
</head>
<body>
    <main>
        <section>
             <table border="1" width= 50% style="border-collapse: collapse" >
                    <th>last name</th>
                    <th>first name </th>
              <?php 

     $resultat=get_employees();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                    <td><?php echo $donnees['last_name']; ?> </td>
                    <td><?php echo $donnees['first_name']; ?> </td>
     </tr>
                    
        <?php }  ?> 


      
        </section>
    </main>
    
</body>
</html>