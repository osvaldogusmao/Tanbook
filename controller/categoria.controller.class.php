<?php

include_once '../functions/crud.class.php';

class CategoriaController extends crud {

    function __construct() {
        parent::__construct("categoria");
    }

    public function loadCategoria($value, $attr) {
        parent::load($value, $attr);
    }

    public function saveCategoria($object) {
        parent::save($object);
    }

    public function removeCategoria($value, $attr) {
        parent::remove($value, $attr);
    }

    public function updateCategoria($object, $attr) {
        parent::update($object, $attr);
    }

}

?>