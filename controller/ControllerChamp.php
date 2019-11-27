<?php
require_once File::build_path(array("model", "ModelChamp.php")); // chargement du modèle
class ControllerChamp {
    protected static $object = "champ";

    public static function readAll() {
        $tab_q = ModelChamp::selectAll();     //appel au modèle pour gerer la BD
        $controller='champ';
        $view='list';
        $pagetitle='Liste des champs';
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
    	$q = ModelChamp::select($_GET['id']);
        $controller='champ';
        $view='detail';
        $pagetitle='Detail du champ';
        require File::build_path(array("view", "view.php"));
    }

    public static function create() {
        $controller='champ';
        $view='update';
        $pagetitle='Création de champ';
    	require File::build_path(array("view", "view.php"));
    }

    public static function created() {
    	if ($_GET['typeInput'] == 'Echelle') {
            $data = array('id' => $_GET['id'],
                        'label' => $_GET['label'],
                        'max' => $_GET['max'],
                        'typeInput' => $_GET['typeInput']);
        }
        else {
            $data = array('id' => $_GET['id'],
                        'label' => $_GET['label'],
                        'typeInput' => $_GET['typeInput']);
        }
        
        $controller='champ';
        $view='errorCreated';
        $pagetitle='Erreur lors de la création';
    	if(ModelChamp::save($data) == false) {
            require File::build_path(array("view", "view.php"));
    	}
    	else {
            $tab_q = ModelChamp::selectAll();
            $view='created';
            $pagetitle = 'Création réussie';
            require File::build_path(array("view", "view.php"));
    	}
    }

    public static function delete() {
        ModelChamp::delete($_GET['id']);
        $id = $_GET['id'];
        $tab_q = ModelChamp::selectAll();
        $controller='champ';
        $view='deleted';
        $pagetitle='Car deleted';
        require File::build_path(array("view", "view.php"));
    }

    public static function error() {
        $controller='champ';
        $view='errorAction';
        $pagetitle='Aucune action de ce type';
        require File::build_path(array("view", "view.php"));
    }

    public static function update() {
        $id = $_GET['id'];
        $tab_q = ModelChamp::select($id);
        $controller='champ';
        $view='update';
        $pagetitle='Modification du champ';
        require File::build_path(array("view", "view.php"));
    }

    public static function updated() {
        if ($_GET['typeInput'] == 'Echelle') {
            $data = array('id' => $_GET['id'],
                        'label' => $_GET['label'],
                        'max' => $_GET['max'],
                        'typeInput' => $_GET['typeInput']);
        }
        else {
            $data = array('id' => $_GET['id'],
                        'label' => $_GET['label'],
                        'typeInput' => $_GET['typeInput']);
        }

        ModelChamp::update($data);
        $tab_q = ModelChamp::selectAll();
        $controller='champ';
        $view='updated';
        $pagetitle='modification';
        require File::build_path(array("view", "view.php"));
    }
}
?>