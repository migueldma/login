<?php
class Usuario_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_usuarios(){
    	$sql = "SELECT * FROM Usuarios ";
		$query = $this->db->query($sql);
		$usuarios = array();
		foreach ($query->result() as $row)
		{
			$usuario = array();
			$usuario['idUsuario'] = $row->idUsuario;
	        $usuario['usuario'] = $row->usuario;
	        $usuario['credenciales'] = $row->credenciales;
	        $usuario['administradorGlobal'] = $row->administradorGlobal;
	        $usuario['administradorBancas'] = $row->administradorBancas;
	        $usuario['administradorPuntoVentas']= $row->administradorPuntoVentas;
	        $usuario['puntodeventa'] = $row->puntodeventa;
	        $usuario['status'] = $row->status;
			$usuarios[] = $usuario;
		}
		return $usuarios;
    }
    public function eliminar_usuario($idUsuario){
    	if(trim($idUsuario) != ''){
    		return $this->db->delete('Usuarios', array('idUsuario' => $idUsuario)); 
    	}
    	return false;
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
    	$this->db->set($data);
    	$this->db->where('idUsuario', $idUsuario);
		return $this->db->update('Usuarios');
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