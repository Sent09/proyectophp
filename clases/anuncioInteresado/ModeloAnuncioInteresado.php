<?php

class ModeloAnuncioInteresado {
    private $bd =null;
    private $tabla = "anunciointeresado";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    
    function add(AnuncioInteresado $interesado){
        $consultaSql = "insert into $this->tabla values(null, :login, :idanuncio);";
        $parametros["login"] = $interesado->getLogin();
        $parametros["idanuncio"] = $interesado->getIdanuncio();
        $resultado = $this->bd->setConsulta($consultaSql, $parametros);
        if(!$resultado){
            return -1;
        }
        return $resultado;
    }
    function delete(AnuncioInteresado $interesado){
        $consultaSql = "delete from $this->tabla where id=:id";
        $arrayConsulta["id"] = $interesado->getId();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    function deleteForLogin($id){
        return $this->delete(new AnuncioInteresado($id));
    }
    function edit(AnuncioInteresado $interesado, $id){        
        $consultaSql = "update $this->tabla set login=:login, idanuncio=:idanuncio where id=:id;";
        $parametros["login"] = $interesado->getLogin();
        $parametros["idanuncio"] = $interesado->getIdanuncio();
        $parametros["id"] = $id;
        $resultado = $this->bd->setConsulta($consultaSql, $parametros);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    
    function get($id){
        $consultaSql = "select * from $this->tabla where id=:id";
        $arrayConsulta["id"] = $id;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if($resultado){
            $interesado = new AnuncioInteresado();
            $interesado->set($this->bd->getFila());
            return $interesado;
        }else{
            return null;
        }
    }

    
     function count($condicion="1=1", $parametros=array()){
        $sql = "select count(*) from $this->tabla where $condicion";
        $r=$this->bd->setConsulta($sql, $parametros);
        if($r){
            $cantidad = $this->bd->getFila();
            return $cantidad[0];
        }
        return -1;
    }
    
    function getList($login, $pagina=0, $rpp=10, $orderby = "1"){
        $list = array();
        $principio = $pagina*$rpp;
        $sql = "select * from $this->tabla where login=:login order by $orderby limit $principio, $rpp";
        $parametros["login"] = $login;
        $r = $this->bd->setConsulta($sql, $parametros);
        if($r){
            while($fila = $this->bd->getFila()){
                $interesado = new AnuncioInteresado();
                $interesado->set($fila);
                $list[] = $interesado;
            }
        }else{
            return null;
        }
        return $list;
    } 

}