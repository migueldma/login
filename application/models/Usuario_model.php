<?php
class Usuario_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function obtener_usuario_password($usuario){
    	if(trim($usuario) != ''){
    		$sql = "SELECT credenciales FROM Usuarios WHERE usuario = ? LIMIT 1";
			$query = $this->db->query($sql, array($usuario));
			$credenciales = '';
			foreach ($query->result() as $row)
			{
			        $credenciales = $row->credenciales;
			}
			return $credenciales;
    	}
    	return false;
    }
    public function editar_usuario($idUsuario,$datos){
    	$data = array(
    		'usuario' => $datos['usuario'],
    		'credenciales'=> $datos['password'],
    		'administradorGlobal'=> $datos['administradorGlobal'],
    		'administradorBancas'=> $datos['administradorBancas'],
    		'administradorPuntoVentas'=> $datos['administradorPuntoVentas'],
    		'puntodeventa'=> $datos['puntodeventa'],
    		'status' => $datos['status']
    		);

		return $this->db->update('Usuarios', $data);
    }
    public function get_usuario($idUsuario)
    {
    	$query = $this->db->get_where('Usuarios', array('idUsuario' => $idUsuario), 1);
    	$datos = FALSE;
		foreach ($query->result() as $row)
		{
		        $datos['usuario'] = $row->usuario;
		        $datos['credenciales'] = $row->credenciales;
		        $datos['administradorGlobal'] = $row->administradorGlobal;
		        $datos['administradorBancas'] = $row->administradorBancas;
		        $datos['administradorPuntoVentas']= $row->administradorPuntoVentas;
		        $datos['puntodeventa'] = $row->puntodeventa;
		        $datos['status'] = $row->status;
		}
		return $datos;
    }
    public function crear_usuario($datos){    	
    	$data = array(
    		'usuario' => $datos['usuario'],
    		'credenciales'=> $datos['password'],
    		'administradorGlobal'=> $datos['administradorGlobal'],
    		'administradorBancas'=> $datos['administradorBancas'],
    		'administradorPuntoVentas'=> $datos['administradorPuntoVentas'],
    		'puntodeventa'=> $datos['puntodeventa'],
    		'status' => $datos['status']
    		);

    	return $this->db->insert('Usuarios', $data);
    }
}