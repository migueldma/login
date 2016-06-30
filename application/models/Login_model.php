<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        //$this->load->database();
    }
    public function obtener_usuario_password($usuario){
    	if(trim($usuario) != ''){
    		return $usuario;
    	}
    	return false;
    }
}