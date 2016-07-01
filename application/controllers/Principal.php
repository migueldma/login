<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('idUsuario'))
        	redirect('/login/index', 'refresh');
    }

	public function index(){
		$this->load->library('comunes_lib');
		$this->load->view('/templates/header');
		$this->load->view('/principal/principal_view');
		$this->load->view('/templates/footer');
	}

	
}