<?php
     $error= "Succes";
     $first_name =htmlspecialchars($_POST["first_name"]);
     $last_name=htmlspecialchars($_POST["last_name"]);
     $age=htmlspecialchars($_POST["age"]);
     $pass = htmlspecialchars($_POST["passwd"]);
     $mail = htmlspecialchars($_POST["email"]);
     $passconf = htmlspecialchars($_POST["passwdconf"]); 
     $pseudo = htmlspecialchars($_POST["pseudo"]);
    if(isset($_POST)&&strlen($pass)>7){
        if($pass == $passconf){
            $db = new PDO('mysql:host=localhost;dbname=annonce_immo;charset=utf8mb4', 'root', 'admin');
            $insert = "insert into uti_utilisateur (uti_prenom, uti_nom, uti_password, uti_pseudo, uti_email, uti_age) values ";
            $insert.= sprintf("('%s','%s','%s','%s','%s','%d');",$first_name,$last_name,$pass,$pseudo,$mail,$age);
            $stm = $db->query($insert); 

        }
            
        else{
            $error = "Pass and Pass confirmation are differents";
        }
       }
       else{
           $error = "Pass too short";
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
                <li><a href="index.php">Home</a></li>
                <li><a href="utilisateurs.php">Advertisers</a><li>
                <li><a href="rubriques.php">Categories</a><li>
                <li><a href="announces.php">Adverts</a><li>
                <li class=active><a href="ajout_user.php">Add User</a><li>
            </ul>
        </div>
    </nav>
    <header class="page-header">
        <h1 class="text-center">New User</h1>
        <?= $error ?>
    </header>
    <section class="container">
            <form method="POST" class="col-md-offset-4 col-md-4" action="ajout_user.php">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" name="first_name" required/>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" name="last_name" required/>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input class="form-control" type="number" id="age" name="age" required/>
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input class="form-control" type="text" id="pseudo" name="pseudo" required/>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name="email"required/>
            </div>
            <div class="form-group">
                <label for="passwd">Password</label>
                <input class="form-control" type="password" id="passwd" name="passwd"required/>
            </div>
            <div class="form-group">
                <label for="passwdconf">Password confirmation   </label>
                <input class="form-control" type="password" id="passwdconf" name="passwdconf" required/>
            </div>
            <button type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Add Advertiser</button>
            
        </form>
        
    </section>
    <footer>
    <div class="container">
        Website made by Nassim Cheurfa - 2017
    </div>
    </footer>
</body>
</html>