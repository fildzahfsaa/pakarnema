<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daftar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('layout/Header');
        $this->load->view('Daftar');
        $this->load->view('layout/Footer');
    }
}