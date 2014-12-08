<?php

class ModeloUsuario {
    private $bd =null;
    private $tabla = "usuario";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    
    function add(Usuario $usuario){
        $consultaSql = "insert into $this->tabla values(:login, :clave, :nombre, :apellidos, :email, curdate(), 
            :isactivo, :isroot, :rol, null);";
        $parametros["login"] = $usuario->getLogin();
        $parametros["clave"] = sha1($usuario->getClave());
        $parametros["nombre"] = $usuario->getNombre();
        $parametros["apellidos"] = $usuario->getApellidos();
        $parametros["email"] = $usuario->getEmail();
        $parametros["isactivo"] =$usuario->getIsactivo();
        $parametros["isroot"] = $usuario->getIsroot();
        $parametros["rol"] = $usuario->getRol();
        $resultado = $this->bd->setConsulta($consultaSql, $parametros);
        if(!$resultado){
            return -1;
        }
        return $resultado;
    }
    function delete(Usuario $usuario){
        $consultaSql = "delete from $this->tabla where login=:login";
        $arrayConsulta["login"] = $usuario->getLogin();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    function deleteForLogin($login){
        return $this->delete(new Usuario($login));
    }
    function edit(Usuario $usuario, $loginpk){        
        $consultaSql = "update $this->tabla set login=:login, clave=:clave,
            nombre=:nombre, apellidos=:apellidos, email=:email,
            isactivo=:isactivo, isroot=:isroot, rol=:rol where login=:loginpk;";
        $parametros["login"] = $usuario->getLogin();
        $parametros["clave"] = $usuario->getClave();
        $parametros["nombre"] = $usuario->getNombre();
        $parametros["apellidos"] = $usuario->getApellidos();
        $parametros["email"] = $usuario->getEmail();
        $parametros["isactivo"] =$usuario->getIsactivo();
        $parametros["isroot"] = $usuario->getIsroot();
        $parametros["rol"] = $usuario->getRol();
        $parametros["loginpk"] = $loginpk;
        $resultado = $this->bd->setConsulta($consultaSql, $parametros);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    
    function get($login){
        $consultaSql = "select * from $this->tabla where login=:login";
        $arrayConsulta["login"] = $login;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if($resultado){
            $usuario = new Usuario();
            $usuario->set($this->bd->getFila());
            return $usuario;
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
    
    function getList($pagina=0, $rpp=10, $condicion="1=1",$parametros=array(), $orderby = "1"){
        $list = array();
        $principio = $pagina*$rpp;
        $sql = "select * from $this->tabla where $condicion order by $orderby limit $principio, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        if($r){
            while($fila = $this->bd->getFila()){
                $persona = new Usuario();
                $persona->set($fila);
                $list[] = $persona;
            }
        }else{
            return null;
        }
        return $list;
    }
    function usuarioExiste($login, $clave){
        $sql = "select * from $this->tabla where (login=:login) and (clave=:clave)";
        $parametros["login"]=$login;
        $parametros["clave"]=  sha1($clave);
        $r = $this->bd->setConsulta($sql, $parametros);        
        if($r){
            $fila = $this->bd->getFila();
            return $fila[8];
        }else{
            return null;
        }
    }

}