<?php
    echo '
    <form method="get" action="">
    	<fieldset>
    		<input type="hidden" name="action" value="error.php"/>
    		<input type="hidden" name="controller" value="formulaire"/>
    		<legend> Formulaire de VIZUIC : </legend>';
    		foreach ($tab_q as $q){
    			$label = htmlspecialchars($q->get("label"));
    			echo "
    		<fieldset>
	    		<legend>Question {$q->get('id')}:</legend>
			    <p>
			    	<strong>
			      		{$label}
			      	</strong>
			    </p>";
				    if(htmlspecialchars($q->get("typeInput")) == "nombre"){
				    	$type = "radio";

				    	echo "<div class='box'>";

							for ($i=0; $i < 6; $i++) { 
								echo "
								<div>
									<div class='radiobox'>
										<label for='type_id'>$i</label>
									</div>
									<div>
										<input placeholder = 'Exemple : 10' type=" . $type . " name='{$q->get('id')}' id='type_id' value='$i' required/>
									</div>
								</div>";
							}

						echo "
						</div>";
					} 



					if(htmlspecialchars($q->get("typeInput")) == "Echelle"){
				    	$type = "radio";

				    	echo "<div class='box'>";

				    	if (isset($_GET['maxValue'])){
				    		
				    		$x = '' . $_GET['maxValue'];
				    		
				    	}
				    	else{
				    		$x = '5';
				    	}

							for ($i=0; $i < $x; $i++) { 
								echo "
								<div>
									<div class='radiobox'>
										<label for='type_id'>$i</label>
									</div>
									<div>
										<input type=" . $type . " name='{$q->get('id')}' id='type_id' value='$i' required/>
									</div>
								</div>";
							}

						echo "
						</div>";

				    }




				    else {
				    	$type = "text";
				    	echo "
				    		<p>
			      				<input placeholder = 'Exemple : Je suis pour' type=" . $type . " name='{$q->get('id')}' id='type_id' required/>
			    			</p>";
				    }
			    echo"
			    <button>
			    	<a href='./index.php?action=delete&controller=champ&id={$q->get('id')}'>Supprimer</a>
			    </button>
			    <button>
			    	<a href='./index.php?action=update&controller=champ&id={$q->get('id')}'>Mettre à Jour</a>
			    </button>
		    </fieldset>";
		
			}
	echo '
	</fieldset>
	<p>
		<input type="submit" value="Envoyer" />
	</p>
	</form>';
?>