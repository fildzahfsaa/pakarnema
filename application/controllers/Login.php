<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Model_login');
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation'));
    }
    
    public function index()
    {
        $data['title'] = 'login';
        $data = array (
			'action' => site_url('login'),
			'username' => set_value('username'),
            'password' => set_value('password'),
		);

       // load view admin/beranda.php
        $this->load->view("layout/Header_login", $data, FALSE);
        $this->load->view("Login", $data, FALSE);
        $this->load->view("layout/Footer_login", $data, FALSE);
    }

    public function proses_login(){
        $username=$this->input->post('uname');
        $password=$this->input->post('pwd');

        $ceklogin=$this->Model_login->login($username, $password);

        if($ceklogin){
            foreach($ceklogin as $row);
            $this->session->set_userdata('user', $row->username);
            $this->session->set_userdata('id_admin', $row->id_user);
            $this->session->set_userdata('nama_admin', $row->nama_user);
            // $this->session->set_userdata('level', $row->level);

            redirect('Admin/index');

            // if($this->session->userdata('level')=="admin"){
            //     redirect('Admin/index');
            // }
            // elseif($this->session->userdata('level')=="pakar"){
            //     // $this->session->set_userdata('id_user', $row->id_user);
            //     // $this->session->userdata('id_user')=="6";
            //     redirect('Pakar/index');
            // }
        }
        else{
            echo "<script>alert('Username dan password anda salah');</script>";
            $this->load->view("layout/Header_login");
            $this->load->view("Login");
            $this->load->view("layout/Footer_login");
        }
    }

}

/* End of file login.php */

?>