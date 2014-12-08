<?php

class AnuncioInteresado {
    private $id, $login, $idanuncio;
    function __construct($id=null, $login=null, $idanuncio=null) {
        $this->id = $id;
        $this->login = $login;
        $this->idanuncio = $idanuncio;
    }

    function set($datos, $inicio=0){
        $this->id = $datos[0+$inicio];
        $this->login = $datos[1+$inicio];
        $this->idanuncio = $datos[2+$inicio];
    }
    
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getIdanuncio() {
        return $this->idanuncio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setIdanuncio($idanuncio) {
        $this->idanuncio = $idanuncio;
    }
}

?>
