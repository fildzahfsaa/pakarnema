<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Diagnosa extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_gejala');
    }
    public function index()
    {
        $this->load->view('layout/Header');
        $this->load->view('Diagnosa');
        $this->load->view('layout/Footer');
    }
}