<?php
    echo '
    <form method="get" action="./index.php">
    	<fieldset>
    		<input type="hidden" name="action" value=error.php/>
    		<input type="hidden" name="controller" value=formulaire/>
    		<legend> Formulaire de VIZUIC : </legend>';
    		foreach ($tab_q as $q){
    			echo '
    		<fieldset>
	    		<legend>formulaire ' . htmlspecialchars($q->get("id")) . ' :</legend>
			    <p>
			      <label for="label_id">Label</label> :
			      <input type="text" value=' . htmlspecialchars($q->get("label")) . ' name="label" id="label_id" readonly/>
			    </p>';
				    if(htmlspecialchars($q->get("typeInput")) == "nombre"){
				    	$type = "radio";
				    }else{
				    	$type = "text";
				    }
			    echo'
			    <p>
			      <label for="type_id">Type</label> :
			      <input type=' . $type . ' value=' . htmlspecialchars($q->get("typeInput")) . ' name="typeInput" id="type_id" readonly/>
			    </p>
		    </fieldset>';
		
			}
	echo '
	</fieldset>
	</form>
	<p>
		<input type="submit" value="Envoyer" />
	</p>';
?>