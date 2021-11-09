
<head>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="img/inscri.png" rel="icon"/>
  <title>Club Photo | Inscription</title>
</head>
<body>
  <?php
  include('connexion.bd.php');
    $cnx=ConnexionPDO();
if (isset($_POST['util'], $_POST['mail'], $_POST['mdp'])){
    $hash = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $prep=$cnx->prepare("INSERT INTO user(id,username,email,password) VALUES (NULL, ?, ?, ?)");
    $prep->bindValue(1,$_POST['util']);
    $prep->bindValue(2,$_POST['mail']);
    $prep->bindValue(3,$hash);
    $prep->execute();
      
   // 1) Hasher le mot de passe de l'utilisateur avec password_hash()
   // 2) Requête préparée INSERT : INSERT into users VALUES (null, ?, ?, ?)
   // 3) Envoyer la requête préparée au serveur
   if ($prep){
  echo "<h3>Vous êtes inscrit avec succès.</h3>
  <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>";
   }
}else{
?>


<?php
include('navbar.php');
?>
<?php
include('titre.php');
?>  
<<section class="page-section bg-light" id="inscription">
            <div class="login">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Inscription</h2>
                    <h3 class="section-subheading text-muted">Inscrivez-vous !</h3>
                </div>
             </div>  
    <form id="test" method="post" action=>
            <div class="form-group login">
                <input type="text" class="form-control" name="util" placeholder="Nom d'utilisateur">
            </div>
        <div class="form-group login">
            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">

        </div>
             <div class="form-group login">
                <input type="text" class="form-control" name="mail" placeholder="Email">

            </div>

    <center>
    <a href="login.php#connexion"> Déja inscrit ?</a> 
    <center>
    <br>
    <button type="submit" name="inscriBUTTON" class="btn btn-primary">S'inscire</button>
    </center>
    <br>
        </form>
    <br>
</section>




    <?php } ?>
    </body>
    </html>

