<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
    	<nav>
    		<div>
	    		<a href="index.php?action=readAll&controller=question">Gestion question</a>
                <a href="index.php?action=create&controller=question">Creation de question</a>
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