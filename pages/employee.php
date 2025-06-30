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
    <section>
        <article>
            <h1>fiche</h1>
                 <table border="1" width= 50% style="border-collapse: collapse" >
                    <th>numero</th>
                    <th>last name</th>
                    <th>first name </th>
                     <th>gender</th>
                     <th>hire_date</th>
                     <th>Birthday</th>
              <?php 

     $resultat=get_employe();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                    <td><?php echo $donnees['emp_no']; ?></td>
                    <td><?php echo $donnees['last_name']; ?></td>
                    <td><?php echo $donnees['first_name']; ?></td>
                    <td><?php echo $donnees['gender']; ?></td>
                    <td><?php echo $donnees['hire_date']; ?></td>
                    <td><?php echo $donnees['birth_date']; ?></td>
     </tr>
                    
        <?php }  ?> 

     </table>
     </artcle>

        <article>

        <h1>Antecedant</h1>
         <table border="1" width= 50% style="border-collapse: collapse" >
                    <th>salaire</th>
                    <th>first nam </th>
              <?php 

     $resultat=get_salaire();
     while ($donnees = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                        <td><?php echo$donnees['salary']; ?></td>
                    <td><?php echo $donnees['title']; ?> </td>
     </tr>
                    
        <?php }  ?> 
     </article>
     </table>
     </section>
</main>
    
</body>
</html>