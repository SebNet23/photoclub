<?php
if(isset($_SESSION['name'])){ ?>
	<header class="masthead" id="accueil">
            <div class="container">
                <div class="masthead-subheading">Club de photo de Limoges</div>
                <div class="masthead-heading text-uppercase">Content de vous voir <?php echo $_SESSION['name']; ?></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="compte.php">Gérer votre compte</a>
            </div>
        </header>

<?php } else {
    ?>
    	<header class="masthead" id="accueil">
            <div class="container">
                <div class="masthead-subheading">Club de photo de Limoges</div>
                <div class="masthead-heading text-uppercase">Rejoignez nous !</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="index.php#projet">En savoir plus</a>
            </div>
        </header>
<?php
}
?>