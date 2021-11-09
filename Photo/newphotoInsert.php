
<section class="page-section bg-light" id="insert">
<?php
    $insert_succes = "false"; 


        if (isset($_POST['valid_ajout'])) {
    //Pour le nom dans la base de donnée et du fichier
    $newimage =  'img/Galerie-BDD/' . '-' . $_FILES["input_new_image"]["name"];
    //Pour l'upload dans les dossiers de XAMPP
    $target_direction2 = "img/Galerie-BDD/";
    $target_file2 = $target_direction2 . basename($newimage);
 
    //Requete
      if(move_uploaded_file($_FILES['input_new_image']["tmp_name"], $target_file2)) {
        $req3 = $cnx->prepare("INSERT INTO photo VALUES(NULL,?,?,?,?)");
        $req3->bindValue(1,$_POST['titre_insert']);
        $req3->bindValue(2,$_POST['texte_photo_insert']);
        $req3->bindValue(3,$_GET['numero']);
        $req3->bindValue(4,$newimage);
        $req3->execute();

        $insert_succes = "true";
      }
  }
       ?>

	<div class="container_insert">
        <div class="text-center">
                    <h2 class="section-heading text-uppercase">Insertion de photos</h2>
                    <h3 class="section-subheading text-muted">Insérez de nouvelles photos</h3>
        </div>
        <div id="insert_div">
                	<form  method="POST" action="" enctype="multipart/form-data">
                	<input class="input_insert" type="text" name="titre_insert" placeholder="Titre de la photo" class=" form-control">
        </div>
            
        <div class="image-upload">
            <label  for="file-input">
    				<img src="img/image.png"/>
  					</label>
  					<input id="file-input" name="input_new_image" type="file" />
				</div>
				
  				<textarea class="textarea_insert" name="texte_photo_insert" placeholder="Détail de la photo"></textarea>
          <br>
          <br>
          <br>
          <br>
          <br>
          </div>
          <div>

            <?php $requete2=$cnx->prepare('SELECT * FROM photo INNER JOIN article ON photo.id_arti = article.id_arti WHERE article.id_arti = ?');
              $requete2->BindValue(1,$_GET['numero']);
              $requete2->execute();

              $ligne=$requete2->fetch(PDO::FETCH_OBJ);

            ?>
          <input type="text" class="input_type_insert" READONLY name="" placeholder=" Article : <?php echo $ligne->titre_arti;?>">
         </select>
         <input href="#section_votre_galerie" id="valid_ajout"class="btn btn-primary" type="submit" name="valid_ajout">
           </div>
        </form> 
        <?php
        if ($insert_succes == "true"){
        ?>
        <br>
        <br>
        <div class="alert alert-success" role="alert">
        Insertion réussie
        </div>
        <?php
      }
      ?> 
                
</div>
</section>
