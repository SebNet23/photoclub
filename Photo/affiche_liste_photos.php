<link href="css/styles.css" rel="stylesheet" />
<?php
 include_once("connexion.bd.php");
$cnx=ConnexionPDO();
$affichage_type = $cnx->prepare("select * from type ");
$affichage_type -> execute();

?>



<section class="page-section bg-light" id="galerie">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Galerie</h2>
                    <h3 class="section-subheading text-muted">Photo prise par le club</h3>
                    <?php if ($ligne=$affichage_type->fetch(PDO::FETCH_OBJ)){
                        ?>
                       <h3 class="section-subheading text-muted"><?php echo "Type sélectionné : " . $ligne->nom_type; ?></h3>
                       <?php   
                   }  
                   ?>
                </div>
            
            </div>
 <form id="select-type" method="post" action="">

<select class="form-select" name="type">

    <option selected disabled value="">--Selectionner un type--</option>

<?php while($ligne=$affichage_type->fetch(PDO::FETCH_OBJ)){ ?>
    
    <option name="type" value="<?php echo $ligne->id_type; ?>"><?php echo $ligne->nom_type; ?></option>
<?php
}
?>
</select>

    <input type="submit" name="buttontype" class="btn btn-primary" href="#galerie" value="Choisir"></input> 
    
</form>


<?php if(isset($_POST['buttontype'])){ ?>
 <table class="table table-dark">
      <tr>
       <th>Titre</th>
       <th>Article</th>
       <th>Image</th>
    </tr>
<?php
    $req1= $cnx->prepare('SELECT * FROM article INNER JOIN photo ON photo.id_arti = article.id_arti
     where article.id_type = ?');

$req1->BindValue(1, $_POST["type"]);
$req1->execute();

    while($ligne = $req1->fetch(PDO::FETCH_OBJ)){
        ?>
    <tr>
     <form type="get" action="affichage_photo.php">

     <td><a href="affiche_photo.php?article_id=<?php echo $ligne->id_arti ?>">
      <?php echo $ligne->titre_photo; ?></td>
       <td><?php echo $ligne->texte_photo; ?></td>
       <td><?php echo"<img src=\"$ligne->nom_photo\">"?></td>
     </form>
    </tr>
<?php
    }

    }
?>
</table>     
</div>
<section class="page-section">
</section>