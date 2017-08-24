<?php
    $db = new PDO('mysql:host=localhost;dbname=annonce_immo;charset=utf8mb4', 'root', 'admin');    
    $str="SELECT r1.rub_oid as id,r1.rub_label as lab, r2.rub_label as par ";
    $str.="FROM rub_rubrique r1 ";
    $str.="left outer join rub_rubrique r2 on r1.rub_oid_parent = r2.rub_oid";
    $stmt=$db->query($str);
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
                <li><a href="utilisateurs.php">Advertisers</a><li>
                <li class=active><a href="rubriques.php">Categories</a><li>
                <li><a href="announces.php">Adverts</a><li>
            </ul>
        </div>
    </nav>
    <header class="page-header">
        <h1 class="text-center">List of categories</h1>
    </header>
    <section class ="container">
    <div class="col-md-offset-3 col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Parent</th>
                </tr>
            <tbody>
                <?php foreach($results as $key=>$value):?>
            </thead>
                <tr>
                    <td class="text-center"><?= $value['id'];?></td>
                    <td class="text-center"><?= $value['lab'];?></td>
                    <td class="text-center"><?= $value['par'];?></td>
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