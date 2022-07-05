<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Konsultasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_konsultasi');
		$this->load->model('Model_gejala');
    }
    public function index()
    {
		$data = [
			"get_no_user" => $this->Model_konsultasi->get_no_user()
		];

        $this->load->view('layout/Header');
        $this->load->view('Konsultasi', $data);
        $this->load->view('layout/Footer');
    }

	public function tambah_user()
	{
		$show = $this->Model_konsultasi;
		$id_user = $_POST["id_user"];
		$this->session->set_userdata('id_user', $id_user);

		if ($show->simpan_user()) {
			// $this->session->set_flashdata('success', 'Berhasil Menambah Data Faktor Penyakit');
			redirect(site_url('Konsultasi/konsul'));
		}
	}

	public function konsul()
	{
		$data = [
			"data_gejala" => $this->Model_gejala->getAlldatagejala()
		];

		$this->load->view('layout/Header');
        $this->load->view('Konsultasi2', $data);
        $this->load->view('layout/Footer');
	}

	public function proses_cbr()
	{
		
		
		// Make Validation URL
        if (!$this->input->post('gejala', true)) {
            redirect('Konsultasi/konsul');
        } else {
            $data3   = $this->Model_konsultasi->getPenyakit();

            // Mulai Perhitungan Metode CBR
            $i = 0;
            foreach ($data3 as $row) {

                $jml        = 0;
                $nilai      = 0;
                $penyakit   = $row['kode_penyakit'];
                $kasus      = $this->Model_konsultasi->getStatus($penyakit);
                $status     = $kasus['nama_penyakit'];
                // $dipilih1   = $this->Model_konsultasi->getDataKonsul();
                $dipilih = count($this->input->post('gejala', true));
                // $dipilih    = count($dipilih1 , true);

                // Perulangan perhitungan metode CBR
                foreach ($this->input->post('gejala', true) as $selected) {
                    $gejala   = $selected;
                    $row    = $this->Model_konsultasi->getGejala($gejala);
                    $get    = $this->Model_konsultasi->getSama($penyakit, $gejala);
                    if (isset($get)) {
                        $jml += 1;
                        $nilai += (1 * $get['bobot_pakar']);
                    } else {
                        $jml += 0;
                    }
                }

                $pembagi    = $this->Model_konsultasi->getPembagi($penyakit);
                $jml_gejala   = $this->Model_konsultasi->getJmlGejala($penyakit);
                $hasil = $nilai / "$pembagi";

                $final[$i] = array(
                    'kode_penyakit'      => $penyakit,
                    'nama_penyakit'    => $status,
                    'jml_cocok'     => $jml,
                    'jml_gejala'    => $jml_gejala,
                    'jml_dipilih'   => $dipilih,
                    'bobot_sama'    => $nilai,
                    'total_bobot'   => $pembagi,
                    'hasil'         => $hasil
                );

                $i++;
            }

            // Mengurutkan array hasil descending
            $this->array_sort_by_column($final, 'hasil');

            // Passing data ke Views
            $data['judul']      = 'Hasil Perhitungan Metode CBR';
            $data['sub_judul']  = 'Hasil Analisa Dengan Metode CBR';
            $data['final']      = $final;
            $data['klas']       = $this->Model_konsultasi->getData();
            $data['ciri']       = $this->input->post('kode_gejala', true);
            // $this->load->view('user/v_header', $data);
            // $this->load->view('user/v_sidebar');
            // $this->load->view('v_perhitungan', $data);
            // $this->load->view('user/v_footer');

			$this->load->view('layout/Header');
			$this->load->view('Hasil_konsultasi', $data);
			$this->load->view('layout/Footer');
        }
	}
	// Fungsi Descending Array
    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

}