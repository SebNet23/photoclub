<link href="css/styles.css" rel="stylesheet" />
<?php
 include_once("connexion.bd.php");
$cnx=ConnexionPDO();
?>


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
    $req2= $cnx->prepare('SELECT * FROM article INNER JOIN photo ON photo.id_arti = article.id_arti INNER JOIN type ON article.id_type = type.id_type INNER JOIN user ON article.id_user = user.id where user.username= ?');
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


   
   ?>
 
   
