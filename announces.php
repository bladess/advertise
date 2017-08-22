<?php
    $db = new PDO('mysql:host=localhost;dbname=annonce;charset=utf8mb4', 'root', 'admin');
    $str = "SELECT id_announces, title, price, description, last_name, first_name FROM announces ";
    $str.="INNER JOIN users on announces.id_users = users.id_users";
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                </tr>
            <tbody>
                <?php foreach($results as $key=>$value):?>
            </thead>
                <tr>
                    <td class="text-center"><?= $value['id_announces'];?></td>
                    <td class="text-center"><?= $value['title'];?></td>
                    <td class="text-center"><?= $value['description'];?></td>
                    <td class="text-center"><?= $value['price'];?></td>
                    <td class="text-center"><?= $value['first_name'];?></td>
                    <td class="text-center"><?= $value['last_name'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </section>
    <footer>
    </footer>
</span>
</body>
</html>