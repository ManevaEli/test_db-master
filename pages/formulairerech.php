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
    <section class="col-sm-12 col-lg-8  py-5">
        <h1>Rechercher ici</h1>
        <form action="recherche.php" method="get">
            <p>Département <input type="text" name="Departement" placeholder="Rechercher..."/></p>
                <p>Nom <input type="text" name="Nom" placeholder="Rechercher..."/></p>
                <p>Âge entre <input type="number" name="min" value="0" placeholder="Âge min"/> et <input type="number" name="max" value="1000" placeholder="Âge max"/></p>
                <input type="submit" value="Rechercher" />    
        </form>
    </section>
</body>
<footer>
    <a href="index.php" class="btn btn-link">Retour à l'accueil</a>
</footer>
</html>