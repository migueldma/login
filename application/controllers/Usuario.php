<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('comunes_lib');
        if(!$this->session->userdata('idUsuario'))
        	redirect('/login/index', 'refresh');
    }

	public function ver_usuarios(){
		$this->load->helper('url');
		$this->load->model('usuario_model');
		$this->load->library('table');

		$data['usuarios'] = $this->usuario_model->get_usuarios();
		$this->load->view('/templates/header');
		$this->load->view('/usuario/ver_usuarios',$data);
	}

	public function eliminar_usuario($idUsuario){
		$this->load->model('usuario_model');
		$this->load->helper('url');
		if($this->usuario_model->eliminar_usuario($idUsuario)){
			redirect('/usuario/ver_usuarios', 'refresh');
		}

	}

	public function manejo_usuario($idUsuario = '')
	{	
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('usuario_model');		

		$titulo = 'Creación de Usuario';
		if(trim($idUsuario) == ''){
			$idUsuario = $this->input->post('idUsuario');
			
		}
		else{		
			$titulo = 'Edición de Usuario';	

		}
		if(trim($idUsuario) != ''){
			$data['datosUsuario'] = $this->usuario_model->get_usuario($idUsuario);
		}
		else{
			$this->form_validation->set_rules('inputPassword', 'Password', 'required',array('required' => 'Campo de Password necesario.'));		
			$this->form_validation->set_rules('inputConfirmacionPassword', 'Campo de Confirmación', 'required|matches[inputPassword]',
			array('required' => 'Campo de Confirmación necesario.',
					'matches' => 'Password y la Confirmación del Password distintos.'));
		}
		$data['idUsuario'] = $idUsuario;
        $data['titulo'] = $titulo;

		$this->form_validation->set_rules('inputUsuario', 'Usuario', 'required',array('required' => 'Campo de Usuario necesario.'));
		
        if ($this->form_validation->run() == FALSE)
        {   
        	$this->load->view('/templates/header');    	
            $this->load->view('/usuario/manejo_usuario_view',$data);	        	
        }
        else
        {
        		$datosUsuarios['administradorGlobal'] = 0;
        		$datosUsuarios['administradorBancas'] = 0;
        		$datosUsuarios['administradorPuntoVentas'] = 0;
        		$datosUsuarios['puntodeventa'] = 0;
        		switch ($this->input->post('selectTipoUsuario')) {
        			case '0':
        				$datosUsuarios['administradorGlobal'] = 1;
        				break;
        			case '1':
        				$datosUsuarios['administradorBancas'] = 1;
        				break;
        			case '2':
        				$datosUsuarios['administradorPuntoVentas'] = 1;
        				break;
        			case '3':
        				$datosUsuarios['puntodeventa'] = 1;
        				break;
        		}
        		$datosUsuarios['usuario'] = $this->input->post('inputUsuario');
        		$datosUsuarios['password'] = $this->convertir_password_seguro($this->input->post('inputPassword'));
        		$datosUsuarios['status'] = $this->input->post('selectStatus');
        	if(trim($idUsuario) == ''){
				if($this->usuario_model->crear_usuario($datosUsuarios)){
					redirect('/usuario/ver_usuarios', 'refresh');
				}
        	}
        	else{
        		if($this->usuario_model->editar_usuario($idUsuario,$datosUsuarios)){
					redirect('/usuario/ver_usuarios', 'refresh');
				}	
        	}           
        }
	}

	private function convertir_password_seguro($password){
		if(trim($password) != ''){
			return hash('sha512', $password);
		}
		return false;
	}
}