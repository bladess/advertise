<?php
    $db = new PDO('mysql:host=localhost;dbname=annonce_immo;charset=utf8mb4', 'root', 'admin');
    $stmt=$db->query('select uti_prenom,uti_nom,uti_age from uti_utilisateur ');
    $results = $stmt->fetchAll();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Annonce immobilière</title>
</head>
<body>    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i></a>   
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class=active><a href="utilisateurs.php">Advertisers</a><li>
                <li><a href="rubriques.php">Categories</a><li>
                <li><a href="announces.php">Adverts</a><li>
            </ul>
        </div>
    </nav>
    <header class="page-header">
        <h1 class="text-center">List of  advertisers</h1>
    </header>
    <section class ="container">
    <div class="col-md-offset-3 col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Age</th>
                </tr>
            <tbody>
                <?php foreach($results as $key=>$value):?>
            </thead>
                <tr>
                    <td class="text-center"><?= $value['uti_prenom'];?></td>
                    <td class="text-center"><?= $value['uti_nom'];?></td>
                    <td class="text-center"><?= $value['uti_age'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    </section>
    <footer>
    <div class="container">
        Website made by Nassim Cheurfa - 2017
    </div>
    </footer>
</span>
</body>
</html>