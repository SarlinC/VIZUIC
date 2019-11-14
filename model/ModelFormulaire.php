<?php
require_once File::build_path(array("model", "Model.php"));
  class ModelFormulaire extends Model {
     
      private $label;
      private $typeInput;
      private $id;
      protected static $object = "formulaire";
      protected static $primary = "id";
          
      //getter générique
      public function get($label_attribut){
        return $this->$label_attribut;
      }

      //setter générique
      public function set($label_attribut,$value){
        $this->$label_attribut = $value;
      }

      // un constructeur
      // La syntaxe ... = NULL signifie que l'argument est optionel
      // Si un argument optionnel n'est pas fourni,
      //   alors il prend la valeur par défaut, NULL dans notre cas
      public function __construct($data = NULL) {
        if (!is_null($data['label']) && !is_null($data['typeInput']) && !is_null($data['id'])) {
          // Si aucun de $m, $c et $i sont nuls,
          // c'est forcement qu'on les a fournis
          // donc on retombe sur le constructeur à 3 arguments
          $this->label = $data['label'];
          $this->typeInput = $data['typeInput'];
          $this->id = $data['id'];
        }
      }

    public static function save($voiture) {
      try{
        $sql = "INSERT INTO Formulaire (label, typeInput, id) VALUES (:label, :typeInput, :id)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array("label" => $voiture->label, "typeInput" => $voiture->typeInput, "id" => $voiture->id);
        
        $req_prep->execute($values);
      }
      catch(PDOException $e) {
        if($e->getCode() == 23000) {
          return false;
        }
      }
      return true;
    }
  }
?>