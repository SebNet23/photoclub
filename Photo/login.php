    <?php
    session_start();
    ?>
    <!DOCTYPE html>
    <html>
      
    <head>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="img/login.png" rel="icon"/>
        <title>Club Photo | Connexion</title>
    </head>
    <body>
    <?php
require_once 'bdd.php';

     //echo $_POST['username'];

    if(isset($_POST['username'])){
      echo "entre";
    $prep=$conn1->prepare("SELECT * FROM user WHERE username=?");
    $prep->execute(array($_POST['username']));

   // 2) Envoyer la requête préparée au serveur et récupérer l'enregistrement
     $resultat= $prep->fetch(PDO::FETCH_OBJ);
   // 3) Vérifier le mot de passe avec le hash du champ username : password_verify()
     if(password_verify($_POST['mdp'], $resultat->password)){
    echo 'OK';
    $_SESSION['name']=$_POST['username'];
    
    //
       header("Location: index.php");

    } else {
    echo 'ERREUR';
    }
   // 4) Charger la variable de session avec le nom de l'utilisateur
    }

    ?>
    <form method="POST" action="votregalerie.php"></form>
    <input type="hidden" name="iduser" value="<?php $resultat?->id?>">



<?php
include('navbar.php');
?>
<?php
include('titre.php');
?>     
<section class="page-section bg-light" id="connexion">
            <div class="login">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Connexion</h2>
                    <h3 class="section-subheading text-muted">Connectez-vous !</h3>
                </div>
             </div>  
    <form id="test" method="post" action=>
            <div class="form-group login">
                <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
            </div>
        <div class="form-group login">
            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">

        </div>

    <center>
    <a href="inscription.php#inscription"> Pas encore inscrit ?</a> 
    <center>
    <br>
    <button type="submit" name="inscriBUTTON" class="btn btn-primary">Se connecter</button>
    </center>
    <br>
        </form>
    <br>
</section>



   
    </html>

