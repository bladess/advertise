<?php
    $db = new PDO('mysql:host=localhost;dbname=annonce_immo;charset=utf8mb4', 'root', 'admin');
    
    
    $str = "SELECT ann_oid, ann_titre, ann_prix, ann_description, uti_prenom, uti_nom,rub_label FROM ann_annonce ";
    $str.="INNER JOIN uti_utilisateur on ann_annonce.uti_oid = uti_utilisateur.uti_oid ";
    $str.="INNER JOIN rub_rubrique on ann_annonce.rub_oid=rub_rubrique.rub_oid";
    if(!empty($_GET['name'])){
        $str.= " WHERE ann_titre like '%". htmlspecialchars($_GET['name'])."%'";
    }
    
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
                <li><a href="rubriques.php">Categories</a><li>
                <li class=active><a href="announces.php">Adverts</a><li>
            </ul>
        </div>
    </nav>
    <header class="page-header">
        <h1 class="text-center">List of adverts</h1>
    </header>
    <section class ="container">
        <div class="row">
            <form method="GET" class="col-md-offset-8 col-md-4 form-inline">
                    <div class="form-group">
                        <label for="name">Search by title</label>
                        <input class="form-control" type="text" id="name" name="name"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type ="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </div>
            </form>
        </div>
        <div class="row">
            <hr class="col-md-offset-8 col-md-4 form-inline"></hr><!-- petit separateur-->
        </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Category</th>
                </tr>
            <tbody>
                <?php foreach($results as $key=>$value):?>
            </thead>
                <tr>
                    <td class="text-center"><?= $value['ann_oid'];?></td>
                    <td class="text-center"><?= $value['ann_titre'];?></td>
                    <td class="text-center"><?= $value['ann_description'];?></td>
                    <td class="text-center"><?= $value['ann_prix'];?></td>
                    <td class="text-center"><?= $value['uti_prenom'];?></td>
                    <td class="text-center"><?= $value['uti_nom'];?></td>
                    <td class="text-center"><?= $value['rub_label'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    </section>
    <footer>
    </footer>
</span>
</body>
</html>