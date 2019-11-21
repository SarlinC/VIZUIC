<?php
  $controller = static::$object;
  if ($_GET['action'] == 'create') {
    $value = 'created';
    $type = 'required';
    $id = '""';
    $label = '""';
    $typeInput = 'choisir un type';
  }
  else if($_GET['action'] == 'update') {
    $value = 'updated';
    $type = 'readonly';
    $id = htmlspecialchars($tab_q->get('id'));
    $label = htmlspecialchars($tab_q->get('label'));
    $typeInput = htmlspecialchars($tab_q->get('typeInput'));
  }
?>

<form method="get" action="./index.php"> <!-- Transmissions des infos via le Get qui utilise une query string-->
  <fieldset>
    <input type='hidden' name='action' value="<?php echo $value;?>"/>
    <input type='hidden' name='controller' value="<?php echo $controller;?>"/>
    <legend>Créer un champ :</legend>
    <p>
      <label for="id">Numéro de la question :</label>
      <input type="text" value="<?php echo $id;?>" name="id" id="id" required/>
    </p>
    <p>
      <label for="label_id">Question :</label>
      <input type="text" value="<?php echo $label;?>" name="label" id="label_id" required/>
    </p>
    <p>
      <label for="typeInput">Type :</label>
      <select id="typeInput" onchange="myFunction()">
      <option value="Texte">Texte</option>
      <option value="Nombre">Nombre</option>
      <option value="Echelle">Echelle</option>
      </select>

      <p id ="demo"></p>

      <script>
      function myFunction() {
       var x = document.getElementById("typeInput").value;
        if(x == "Echelle"){
        
        document.getElementById("demo").innerHTML = "Insérer valeur max de l'" + x;
        document.getElementById("demo").innerHTML += " <input name='maxValue' type='text' placeholder = '10'/>"
        }
        else {
        document.getElementById("demo").innerHTML = "Le type choisi est le type" + x;
        }
        }
      </script>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>