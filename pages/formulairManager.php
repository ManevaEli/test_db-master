<?php 
require_once("../fonction/bdd.php");
echo $_POST['no_emp'];
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
        <h1>Devenir Manager </h1>
        <h1> Département : </h1>
    </header>
    <main>

    <div class="container">
    <div class="row justify-content-center">
        <section class="col-12 col-md-8 col-lg-6 py-5">
            <form action="#" method="get" class="modern-form">
                <div class="form-group mb-4">
                    <label for="date-field" class="form-label">Date de début</label>
                    <input type="date" id="date-field" name="date" class="form-control form-control-lg">
                </div>
                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Valider</button>
            </form>
        </section>
    </div>
</div> 

             </body>
    </main>
</body>
</html>
