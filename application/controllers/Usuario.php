<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
		$data['idUsuario'] = $idUsuario;
        $data['titulo'] = $titulo;

		$this->form_validation->set_rules('inputUsuario', 'Usuario', 'required',array('required' => 'Campo de Usuario necesario.'));
		$this->form_validation->set_rules('inputPassword', 'Password', 'required',array('required' => 'Campo de Password necesario.'));		
		$this->form_validation->set_rules('inputConfirmacionPassword', 'Campo de Confirmación', 'required|matches[inputPassword]',
			array('required' => 'Campo de Confirmación necesario.',
					'matches' => 'Password y la Confirmación del Password distintos.'));
        if ($this->form_validation->run() == FALSE)
        {       	
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
					$this->load->view('welcome_message',$datosUsuarios);
				}
        	}
        	else{
        		if($this->usuario_model->editar_usuario($idUsuario,$datosUsuarios)){
					$this->load->view('welcome_message',$datosUsuarios);
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