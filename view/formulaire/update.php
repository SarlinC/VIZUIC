<?php
  $controller = static::$object;
  if ($_GET['action'] == 'create') {
    $value = 'created';
    $type = 'required';
    $id = '""';
    $label = '""';
    $typeInput = '""';
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
    <legend>Mon formulaire :</legend>
    <p>
      <label for="id">Id</label> :
      <input type="text" value="<?php echo $id;?>" name="id" id="id" <?php echo $type;?>/>
    </p>
    <p>
      <label for="label_id">Label</label> :
      <input type="text" value="<?php echo $label;?>" name="label" id="label_id" required/>
    </p>
    <p>
      <label for="type_id">Type</label> :
      <input type="text" value="<?php echo $typeInput;?>" name="typeInput" id="type_id" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>