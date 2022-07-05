<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pakar');
        $this->load->model('Model_penyakit');
        $this->load->model('Model_gejala');
        $this->load->model('Model_bkasus');

        //validasi level
        // if($this->session->userdata('level')!="admin"){
        //     redirect('login','refresh');
        // }
    }
    public function index()
    {
        $data['pakar'] = $this->Model_pakar->getAlluserpakar();
        $data['total_gejala'] = $this->Model_gejala->hitungTotalgejala();
        $data['total_penyakit'] = $this->Model_penyakit->hitungTotalpenyakit();
        $data['total_bkasus'] = $this->Model_bkasus->hitungTotalbkasus();

        $this->load->view('layout/Header_admin');
        $this->load->view('admin/Index', $data);
        $this->load->view('layout/Footer_admin');
    }

    //===========================Pakar============================================================
    public function tambah_pakar()
    {
        $this->form_validation->set_rules('nama_user', 'nama_user', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if($this->form_validation->run() == FALSE)
        {
            echo "<script>alert('Gagal menambah data');</script>";
            redirect('Admin/index', 'refresh');
        } else {
            $this->Model_pakar->tambah_pakar();
            echo "<script>alert('Anda berhasil menambah data');</script>";
            redirect('Admin/index', 'refresh');
        }
    }

    public function edit_pakar($id_user)
    {
        $data['pakar'] = $this->Model_pakar->getUserByID($id_user);
        $this->form_validation->set_rules('nama_user', 'nama_user', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/Header_admin');
            $this->load->view('admin/Editpakar', $data);
            $this->load->view('layout/Footer_admin');
        } else {
            $this->Model_pakar->edit_pakar($id_user);
            echo "<script>alert('Anda berhasil update data');</script>";
            redirect('Admin/index', 'refresh');
        }
    }

    public function hapus_pakar($id)
    {
        if ($this->Model_pakar->hapus_pakar($id)) {
            $this->session->set_flashdata('hapus_user', true);
        } else {
            $this->session->set_flashdata('hapus_data', false);
        }
        redirect('Admin/index', 'refresh');
    }

    //===========================Penyakit============================================================
    public function Datapenyakit()
    {
        $data['penyakit'] = $this->Model_penyakit->getAlldatapenyakit();

        $this->load->view('layout/Header_admin');
        $this->load->view('admin/Datapenyakit', $data);
        $this->load->view('layout/Footer_admin');
    }

    public function tambah_penyakit()
    {
        $this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'required');
        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'required');
        $this->form_validation->set_rules('penanganan', 'penanganan', 'required');

        if($this->form_validation->run() == FALSE)
        {
            echo "<script>alert('Gagal menambah data');</script>";
            redirect('Admin/Datapenyakit', 'refresh');
        } else {
            $cek1 = $this->db->query("SELECT * FROM penyakit where kode_penyakit='".$this->input->post('kode_penyakit')."'");
            $cek2 = $this->db->query("SELECT * FROM penyakit where nama_penyakit='".$this->input->post('nama_penyakit')."'");
            
            if($cek1->num_rows()>=1 || $cek2->num_rows()>=1 || $cek1->num_rows()>=1 && $cek2->num_rows()>=1){
                echo "<script>alert('Maaf gagal input data, Data sudah ada,..');</script>";
                redirect('Admin/Datapenyakit', 'refresh');
            }else{
                $this->Model_penyakit->tambah_penyakit();
                echo "<script>alert('Anda berhasil menambah data');</script>";
                redirect('Admin/Datapenyakit', 'refresh');
            }
        }
    }

    public function edit_penyakit($kode_penyakit)
    {
        $data['penyakit'] = $this->Model_penyakit->getPenyakitByID($kode_penyakit);
        $this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'required');
        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'required');
        $this->form_validation->set_rules('penanganan', 'penanganan', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/Header_admin');
            $this->load->view('admin/Editpenyakit', $data);
            $this->load->view('layout/Footer_admin');
        } else {
            $this->Model_penyakit->edit_penyakit($kode_penyakit);
            echo "<script>alert('Anda berhasil update data');</script>";
            redirect('Admin/Datapenyakit', 'refresh');
        }
    }

    public function hapus_penyakit($kode)
    {
        if ($this->Model_penyakit->hapus_penyakit($kode)) {
            $this->session->set_flashdata('hapus_penyakit', true);
        } else {
            $this->session->set_flashdata('hapus_data', false);
        }
        redirect('Admin/Datapenyakit', 'refresh');
    }

    //===========================Gejala============================================================
    public function Datagejala()
    {
        $data['gejala'] = $this->Model_gejala->getAlldatagejala();

        $this->load->view('layout/Header_admin');
        $this->load->view('admin/Datagejala', $data);
        $this->load->view('layout/Footer_admin');
    }

    public function tambah_gejala()
    {
        $this->form_validation->set_rules('kode_gejala', 'kode_gejala', 'required');
        $this->form_validation->set_rules('nama_gejala', 'nama_gejala', 'required');
        $this->form_validation->set_rules('bobot_pakar', 'bobot_pakar', 'required');

        if($this->form_validation->run() == FALSE)
        {
            echo "<script>alert('Gagal menambah data');</script>";
            redirect('Admin/Datagejala', 'refresh');
        } else {
            $cek1 = $this->db->query("SELECT * FROM gejala where kode_gejala='".$this->input->post('kode_gejala')."'");
            $cek2 = $this->db->query("SELECT * FROM gejala where nama_gejala='".$this->input->post('nama_gejala')."'");
            
            if($cek1->num_rows()>=1 || $cek2->num_rows()>=1 || $cek1->num_rows()>=1 && $cek2->num_rows()>=1){
                echo "<script>alert('Maaf gagal input data, Data sudah ada,..');</script>";
                redirect('Admin/Datagejala', 'refresh');
            }else{
                $this->Model_gejala->tambah_gejala();
                echo "<script>alert('Anda berhasil menambah data');</script>";
                redirect('Admin/Datagejala', 'refresh');
            }
            
        }
    }

    public function edit_gejala($kode_gejala)
    {
        $data['gejala'] = $this->Model_gejala->getGejalaByID($kode_gejala);
        $this->form_validation->set_rules('kode_gejala', 'kode_gejala', 'required');
        $this->form_validation->set_rules('nama_gejala', 'nama_gejala', 'required');
        $this->form_validation->set_rules('bobot_pakar', 'bobot_pakar', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/Header_admin');
            $this->load->view('admin/Editgejala', $data);
            $this->load->view('layout/Footer_admin');
        } else {
            $this->Model_gejala->edit_gejala($kode_gejala);
            echo "<script>alert('Anda berhasil update data');</script>";
            redirect('Admin/Datagejala', 'refresh');
        }
    }

    public function hapus_gejala($kode)
    {
        if ($this->Model_gejala->hapus_gejala($kode)) {
            $this->session->set_flashdata('hapus_gejala', true);
        } else {
            $this->session->set_flashdata('hapus_data', false);
        }
        redirect('Admin/Datagejala', 'refresh');
    }

    //===========================Basis Kasus============================================================
    public function Databkasus()
    {
        $data['bkasus'] = $this->Model_bkasus->getAlldatabkasus_penyakit();
        $data['penyakit'] = $this->Model_penyakit->fetch_penyakit();
        $data['gejala'] = $this->Model_gejala->fetch_gejala();

        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'required');
        $this->form_validation->set_rules('nama_gejala', 'nama_gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/Header_admin');
            $this->load->view('admin/Databkasus', $data);
            $this->load->view('layout/Footer_admin');
        } else {
            $cek1 = $this->db->query("SELECT * FROM basiskasus where kode_penyakit='".$this->input->post('nama_penyakit')."'");
            
            if($cek1->num_rows()>=1){
                echo "<script>alert('Maaf gagal input data, Data sudah ada,..');</script>";
                $this->load->view('layout/Header_admin');
                $this->load->view('admin/Databkasus', $data);
                $this->load->view('layout/Footer_admin');
            }else{
                $this->Model_bkasus->tambahbkasus();
                $this->Model_bkasus->tambah_Dbkasus();
                echo "<script>alert('Anda berhasil menambah data');</script>";
                redirect($this->uri->uri_string());
            }
        }

        // $this->load->view('layout/Header_admin');
        // $this->load->view('admin/Databkasus', $data);
        // $this->load->view('layout/Footer_admin');
    }

    public function hapus_bkasus($id)
    {
        if ($this->Model_bkasus->hapus_bkasus($id)) {
            $this->session->set_flashdata('hapus_bkasus', true);
        } else {
            $this->session->set_flashdata('hapus_bkasus', false);
        }
        redirect('admin/Databkasus', 'refresh');
    }

    //===========================Detail Basis Kasus============================================================
    public function DataDbkasus()
    {
        $id_pengetahuan = $this->uri->segment(3);

        // $data['detail_bkasus'] = $this->Model_bkasus->getdbkasusByID($id_bkasus);
        $data['tampil_dbkasus'] = $this->Model_bkasus->getAlldataDbkasus($id_pengetahuan);
        $data['gejala'] = $this->Model_gejala->fetch_gejala();
        $data['penyakit'] = $this->Model_bkasus->getAlldataDbkasus_penyakit($id_pengetahuan);

        $this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'required');
        $this->form_validation->set_rules('kode_gejala', 'kode_gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/Header_admin');
            $this->load->view('admin/Datadbkasus', $data);
            $this->load->view('layout/Footer_admin');
        } else {
            $this->Model_bkasus->tambahDbkasus();
            echo "<script>alert('Anda berhasil menambah data');</script>";
            redirect($this->uri->uri_string());
        }

        // $this->load->view('layout/Header_admin');
        // $this->load->view('admin/Datadbkasus', $data);
        // $this->load->view('layout/Footer_admin');
    }

    public function hapus_dbkasus($id)
    {
        if ($this->Model_bkasus->hapus_dbkasus($id)) {
            $this->session->set_flashdata('hapus_dbkasus', true);
        } else {
            $this->session->set_flashdata('hapus_dbkasus', false);
        }
        redirect('Admin/Databkasus','refresh');
    }

    //=========================================Logout=============================================================
    public function logout(){
        // $this->session->sess_destroy();
        
        redirect('Login','refresh');
    }
}