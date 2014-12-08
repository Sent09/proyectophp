<?php

class Validar{
    
    static function isCorreo($v){
       return filter_var($v, FILTER_VALIDATE_EMAIL);          
    }
    static function isEntero($v){
        return filter_var($v, FILTER_VALIDATE_INT);
    }
    
    static function isNumero($v){
        return filter_var($v, FILTER_VALIDATE_FLOAT);
    }
    
    static function isTelefono($v){
        
    }
    
    static function isURL($v){
        return filter_var($v, FILTER_VALIDATE_URL);
    }
    static function isIP($v){
        return filter_var($v, FILTER_VALIDATE_IP);
    }
    
    static function isFecha($v){
        
    }
    
    static function isDNI($v){
        
    }
    
    static function isCP($v){
        
    }
    
    static function isLongitud($v, $lmin=1, $lmax=1){
        
    }
    static function isScript($v){
        
    }
    static function isLogin($v){
        return self::isCondicion($v, '/^[A-Za-z][A-Za-z0-9](5,9)$/');
    }
    static function isClave($v){
        return self::isCondicion($v, '/^[A-Za-z0-9](6,10)$/');
    }
    static function isCondicion($v, $condicion){
        return preg_march($condicion, $v);
    }
    
    static function isAltaUsuario($login, $clave, $claveConfirmada, $nombre, $apellidos, $email){
        return self::isLogin($login) && ($clave == $claveConfirmada) && self::isCorreo($email) && self::isClave($clave)
                && strlen($nombre) > 2 && strlen($apellidos) > 3;
    }
}

?>
