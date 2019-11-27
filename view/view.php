<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
    	<nav>
    		<div>
	    		<a href="index.php?action=readAll&controller=champ">Gestion formulaire</a>
                <a href="index.php?action=create&controller=champ">Creation de champ</a>
    		</div>
    	</nav>
		<?php
		// Si $controleur='voiture' et $view='list',
		// alors $filepath="/chemin_du_site/view/voiture/list.php"
		$filepath = File::build_path(array("view", static::$object, "$view.php"));
		require $filepath;
		?>
    </body>
    <p style="border: 1px solid black;text-align:right;padding-right:1em;">
  		Formulaire de VIZUIC
	</p>
</html>