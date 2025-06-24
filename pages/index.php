<?php 
require_once("../fonction/bdd.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>liste des départements<h1>
            
    </header>
    <main>
        <section>
            <article>
                 <table border="1" width= 50% style="border-collapse: collapse" >
                    <th>numero departement<t/h>
                    <th>departement</th>
                    <th>last name</th>
                    <th>first name </th>
                  <?php 
     $resultat=get_actualMAnager();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
   
                    <tr>
                    <td> <?php echo $donnees['dept_no']; ?> </td>
                    <form action="departement.php" method="post">
                        <td>
                            <input type="hidden" name="dept_no" value="<?php echo $donnees['dept_no']; ?>">
                            <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer;">
                                <?php echo $donnees['dept_name']; ?>
                            </button>
                        </td>
                    </form>
                    <td><?php echo $donnees['last_name']; ?> <?php echo $donnees['first_name']; ?> </td>
                    <td><?php echo $donnees['from_date']; ?> </td>
                    </tr>
        <?php }  ?> 

             </table>
            </article>
        </section>
    </main>
</body>
</html>


