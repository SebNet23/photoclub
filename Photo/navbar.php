<?php
if (session_status()==PHP_SESSION_NONE){
   session_start(); 
}
$_SESSION['page'] = 'compte.php';
include_once("connexion.bd.php");
$cnx=ConnexionPDO();
    ?>
<div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link href="css/styles.css" rel="stylesheet" />



        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                
                <a class="navbar-brand js-scroll-trigger"class="nav-item" href="#connexion"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#projet">Projet</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#galerie">Galerie</a></li>    

<?php 
if(isset($_SESSION['name'])){ ?> <!-- TEST NAME EXISTE-->
   <li class="dropdown nav-item" id="li-dd-connect">
          <a class="nav_connect" class="dropdown-toggle" data-toggle="dropdown" class="nav-link js-scroll-trigger">Connecté : <?php echo $_SESSION['name']; ?>
          <img id="down_arrow_icon" src="img/down_arrow.png"></a>
          <ul class="dropdown-menu">
                        <li class="divider"></li>

                        <li><a class="dropdown-item" href="compte.php"><img class="icon_dropdown" src="img/settings.png">Compte   </a></li>
                        <li class="divider"></li>
                           <li><a  class="dropdown-item" href="logout.php"><img class="icon_dropdown" src="img/logout.png">Déconnexion </a></li>
                         </ul>
                          </li>

<?php }else { ?>
    <link href="css/styles.css" rel="stylesheet" />
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="inscription.php#inscription">Inscription</a></li> 
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php#connexion">Connexion</a></li>

<?php
}
?>

                       
                    </ul>
                <!--<img class = "logotest" class="navbar-brand js-scroll-trigger"class="nav-item" src="assets\img/key.png">-->
                </div>
            </div>

        </nav>

