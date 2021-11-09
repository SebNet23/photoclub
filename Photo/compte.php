


<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <meta charset="utf-8" />
        <link href="img/icon.png" rel="icon"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/compte.css" rel="stylesheet" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<title>Club Photo | Compte</title>
<link href="img/user.png" rel="icon"/>
</head>

<body class="compte_body">

  <?php
include('navbar.php');
?>
<?php
if (isset($_POST['valid'])) {
    //Pour le nom dans la base de donnée
    $profileImageName =  'img/PDP/' . date("d.m.y") . '-' . $_SESSION['name'] . '-' . $_FILES["profileImage"]["name"];
    //Pour l'upload dans les dossiers de XAMPP
    $target_direction = "img/PDP/";
    $target_file = $target_direction . basename($profileImageName);

 
    //Requete
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $req = $cnx->prepare("UPDATE user SET pdp=? WHERE username = ?" );
        $req->bindValue(1,$profileImageName);
        $req->bindValue(2,$_SESSION['name']);
        $req->execute();
       
    }
  }
 }

 ?>



<section  class="info_design page-section bg-dark" id="info">
 <div class="container">
                <div class="text-center">
                    <h2 class="titre_info section-heading text-uppercase">Vos informations</h2>
                    <h3 class="under_tittle">A garder pour vous</h3>
                </div>
</div>

<DIV class="compte_gauche">



<?php
  $req3= $cnx->prepare('SELECT * FROM user where username=?');
  $req3->BindValue(1,$_SESSION['name']);
  $req3->execute();

  $ligne=$req3->fetch(PDO::FETCH_OBJ);
  $var = NULL;
?> 

  <br>
  
  
  

<form method="POST" action="" enctype="multipart/form-data">
  <div class="form-group">
    <h2 class="change_photo_title">Votre photo de profil :</h2>

    <?php if (($ligne->pdp)==$var) {
  ?>
  <label class="label_compte">Pas encore de photo de profil ?<br>
  Importez-en une !</label>
  <?php
  } else {
    echo"<img class=\"pdp_compte\"  src=\"$ligne->pdp\">";
  }?>




    <div class="custom-file-upload">
      <label for="file-upload" class="custom-file-upload1">
       Choisissez votre photo <img id="upload_compte"src="img/upload.png">
      </label>
      <input id="file-upload" name="profileImage" type="file"/>
      <input type="submit" name="valid" id="appli_pdp" class="btn btn-primary"  value="Appliquer"></input>
    </div>
    
  </div>
</form>

</DIV>

<div class="vertical-line"></div>


	<div class="compte_droite"> 
  <form method="POST" action="">
    <h2 class="change_info_title">Changez vos informations :</h2>

  <label class="label_compte">Email :</label>
  <input type="text" name="newmail" placeholder="<?php echo $ligne->email?>" class=" input_compte form-control">

  <label class="label_compte" >Mot de passe :</label>
  <input type="password" name="newmdp" placeholder="••••••" class=" input_compte form-control">
  
  <input id="appli_val" type="submit" name="valid_info" class="btn btn-primary" href="compte.php#info" value="Appliquez les changements"></input>

  </form>

<?php
/*Si bouton appliqué*/
if(isset($_POST['valid_info'])){
              $hash = password_hash($_POST['newmdp'], PASSWORD_BCRYPT);
                $prep=$cnx->prepare("UPDATE user SET email=?, password=? WHERE username= ?");
                $prep->execute(array($_POST['newmail'],
              $hash,$_SESSION['name']));
?>
<br>
                <div class="alert alert-success" role="alert">
                Changement effectué sur vos informations !
                </div>
<?php
}
?>


</div>
</section>

<section class="page-section bg-light" id="perso_galerie">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Votre galerie</h2>
                    <h3 class="section-subheading text-muted">Photo prise par vous</h3>
                </div>
<h3>Liste des articles</h3>
<table class="table table-dark">
  <tr>
    <td>Date</td>
    <td>Description Article</td>
    <td>Titre</td>
    <td>Type</td>
    <td>Photos</td>

<?php 
    $req2= $cnx->prepare('SELECT * FROM article  INNER JOIN type ON article.id_type = type.id_type INNER JOIN user ON article.id_user = user.id where user.username= ?');
	$req2->BindValue(1,$_SESSION['name']);
	$req2->execute();

    while($ligne = $req2->fetch(PDO::FETCH_OBJ)){
               ?>
    <tr>
      <td><?php echo $ligne->date_arti; ?></td>
      <td><?php echo $ligne->texte_arti; ?></td>
      <td><?php echo $ligne->titre_arti; ?></td>
      <td><?php echo $ligne->nom_type; ?></td>
      <td><a href="compte.php?numero=<?=$ligne->id_arti ?>&date=<?= $ligne->date_arti ?>&texte=<?= $ligne->texte_arti?>#section_votre_galerie"><img id="gallery_compte"src="./img/gallery.png"></a></td>
    </tr>
<?php
    }
?>
</table>
</section>



<section id="section_votre_galerie"class="page-section bg-light" class="insert_new_photo">
  <div class="container">
  <div class="text-center">


<?php
if(isset($_GET['numero'])){
   ?> 
           <h3>Vos photos du <?php echo $_GET['date']?> pour l'article : <?php echo $_GET['texte']?></h3>
        <?php
        $requete=$cnx->prepare('SELECT * FROM photo INNER JOIN article ON photo.id_arti = article.id_arti WHERE article.id_arti = ?');
        $requete->BindValue(1,$_GET['numero']);
        $requete->execute();
        ?>
        <table class="table table-dark">
           <tr>
            <td>Titre</td>
            <td>Description</td>
            <td>Photo</td>
           </tr>
        <?php
        while($resul = $requete->fetch(PDO::FETCH_OBJ)){
           ?>
            
           
           <tr>
             <td><?php echo $resul->titre_photo; ?></td>
             <td><?php echo $resul->texte_photo; ?></td>
             <td><img id="gallery_compte"src=<?php echo $resul->nom_photo ?>></a></td>
           </tr>
           <?php
           }
           ?>
           </table>
           <?php
           include('newphotoInsert.php'); 
           ?>
          </div>
          </div> 
          </section> 
          <?php
          if(!isset($_GET['numero'])) {
     ?> 
     <div class="alert alert-danger" role="alert">
    Aucune photo présente pour cet article.
       </div>
  <?php
   }
   }
 
    include('pied_de_page.html');  
   ?>




  
</body>
</html>









 
     