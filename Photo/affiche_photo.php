<link href="css/stylephoto.css" rel="stylesheet" />
<link href="img/image.png" rel="icon"/>


<?php
 include_once("connexion.bd.php");

if(isset($_GET['article_id'])){

$cnx=ConnexionPDO();

    $req1= $cnx->prepare('SELECT * FROM article INNER JOIN photo ON photo.id_arti = article.id_arti
     where article.id_arti = ?');

	$req1->BindValue(1, $_GET["article_id"]);
	$req1->execute();
	?>

<?php $ligne = $req1->fetch(PDO::FETCH_OBJ); ?>  
<title> Détails | <?php echo $ligne->titre_photo; ?> </title>


    <a href="index.php#galerie"><img id="cross" src="img/cross.png"></a>
  	 <div class="title">
  	<h1 id="main-title-details">Titre de la photo :<br> <?php echo $ligne->titre_photo; ?></h1>
  	</div>
  	<br>
    
    
     
    <div class="details-container">
         <div class="desc-container">
          <p class="desc-title">Texte Photo : </p>
          <p class="desc"><?php echo $ligne->texte_photo; ?></p>
          <p class="desc-title">Description de l'article  <?php echo $_GET['article_id']?> :</p>
          <p class="desc"><?php echo $ligne->texte_arti; ?></p>
          <p class="desc-title">Nom de l'article :</p>
          <p class="desc"><?php echo $ligne->titre_arti; ?></p>
         </div>

         <div class="details-image">
         <img <?php echo"<img src=\"$ligne->nom_photo\""?> > </img>
         </div>
    </div>
  
<?php
}
?>