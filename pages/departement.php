<?php 
require_once("../fonction/bdd.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>departement</title>
</head>
<body>
    <main>
        <section>
            <article>
             <table border="1" width= 50% style="border-collapse: collapse" >
                    <th>last name</th>
                    <th>first name </th>
              <?php 

     $resultat=get_employees();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                   <form action="employee.php" method="post">
                        <td>
                            <input type="hidden" name="emp" value="<?php echo $donnees['emp_no']; ?>">
                            <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer;">
                                <?php echo$donnees['last_name']; ?>
                            </button>
                        </td>
                    </form>
                    <td><?php echo $donnees['first_name']; ?> </td>
     </tr>
    
        <?php }  ?> 
  </table>    
     </article>
     
        </section>
    </main>
    
</body>
</html>