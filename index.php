<?php
    $first_name =$_POST["first_name"];
    $last_name=$_POST["last_name"];
    if(!empty($first_name) && !empty($last_name)){
        $db = new PDO('mysql:host=localhost;dbname=annonce;charset=utf8mb4', 'root', 'admin');
        $query = "INSERT INTO users (first_name,last_name) values ('".$first_name."','".$last_name ."');";
        $stmt=$db->query($query);
    } 
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
                <li class=active><a href="index.php">Home</a></li>
                <li><a href="utilisateurs.php">Advertisers</a><li>
                <li><a href="rubriques.php">Categories</a><li>
                <li><a href="announces.php">Adverts</a><li>
            </ul>
        </div>
    </nav>
    <header class="page-header">
        <h1 class="text-center">Welcome to our adverts website</h1>
    </header>
    <section class="container">
            <form method="POST" class="col-md-offset-4 col-md-4"action="index.php">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" name="first_name"/>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" name="last_name"/>
            </div>
            <button type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Add Advertiser</button>
        </form>
    </section>
    <footer>
    </footer>
</span>
</body>
</html>