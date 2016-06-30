<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('usuario_model');		

		$this->form_validation->set_rules('inputUsuario', 'Usuario', 'required',array('required' => 'Campo de Usuario necesario.'));
		$this->form_validation->set_rules('inputPassword', 'Password', 'required',array('required' => 'Campo de Password necesario.'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('/login/login_view');
        }
        else
        {
    		$usuario = $this->input->post('inputUsuario');
			$password = $this->input->post('inputPassword');
			$bdPassword = $this->usuario_model->obtener_usuario_password($usuario);
            if($bdPassword == $this->convertir_password_seguro($password)){
            	$this->load->view('/usuario/manejo_usuario_view');
            }            	
            else{
            	$data['error'] = 'Usuario o Password incorrectos.';
            	$this->load->view('/login/login_view',$data);
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
