<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Konsultasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_konsultasi');
		$this->load->model('Model_gejala');
        $this->load->model('Model_kondisi');
        $this->load->model('Model_penyakit');
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
			"data_gejala"   => $this->Model_gejala->getAlldatagejala(),
            "kondisi"       => $this->Model_kondisi->getAllKondisi('all')
		];
        // $data['kondisi'] = $this->Kondisi_model->getKondisi('all');

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

                // * perhitungan CF START
                // * inisiasi variabel yang akan diinput ke db
                $list_gejala = array();
                $list_penyakit = array();

                // * ambil pilihan pengguna
                $input_gejala_kondisi = $this->input->post('kondisi');

                foreach ($input_gejala_kondisi as $row) {
                    // * jika pengguna memilih kondisi dan tidak 0
                    if (strlen($row) > 1) {
                        // * memecah id gejala dan id kondisi yang dipilih pengguna misal 16_1 menjadi array [16,1]
                        $split_pilihan = explode('_', $row);

                        // * menyimpan gejala dan kondisi yang dipilih pengguna kedalam list_gejala
                        $list_gejala += array($split_pilihan[0] => $split_pilihan[1]);
                    }
                }

                // ? ambil semua penyakit
                $semua_penyakit = $this->Model_konsultasi->getPenyakit();

                // ? perulangan menghitung CF tiap penyakit
                foreach ($semua_penyakit as $penyakit) {

                    // ? ambil semua basis pengetahuan dari penyakit saat ini berdasar id_penyakit
                    $pengetahuan_terkait = $this->Model_konsultasi->getPengetahuan('kode_penyakit', $penyakit['kode_penyakit']);

                    // ? inisiasi variabel CF untuk perhitungan
                    $cf = 0;
                    $cf_lama = 0;
                    // ! perulangan menghitung CF[H,E] 1, CF[H,E] 2, dst
                    // ! urutan untuk penanda urutan CF[H,E]
                    $urutancf = 1;

                    // ? hitung dan cek tiap pengetahuan terkait
                    foreach ($pengetahuan_terkait as $pengetahuan) {
                        // ? cek tiap gejala pada pengetahuan terkait                    

                        foreach ($input_gejala_kondisi as $gejala) {
                            $gejala = explode("_", $gejala);

                            // ? jika gejala pada pengetahuan sama dengan gejala yang diinput pengguna
                            if ($pengetahuan['kode_gejala'] == $gejala[0]) {
                                // ? ambil kondisi terpilih untuk mengakses cf_kondisi
                                $kondisi_terpilih = $this->Model_kondisi->getAllKondisi('id_kondisi', $gejala[1]);

                                // ? perhitungan rumus CF gejala iterasi saat ini
                                $cf = $pengetahuan['bobot_pakar'] * $kondisi_terpilih['cf_kondisi'];

                                // echo 'urutan: ' . $urutancf . '<br>';
                                // echo 'CF GEJALA SAAT INI: CF PAKAR * CF KONDISI DIPILIH USER <br>';
                                // echo 'CF GEJALA SAAT INI:' . $pengetahuan['cf_pakar'] . ' * ' . $kondisi_terpilih['cf_kondisi'] . '<br>';
                                // echo 'CF GEJALA SAAT ini: ' . $cf . '<br><br>';

                                // ? iterasi pertama maka CF 1 langsung menjadi CF OLD
                                if ($urutancf <= 1) {
                                    $cf_lama = $cf;

                                    // echo 'CF OLD: ' . $cf_lama . '<br><br>';
                                } else { // ? selain iterasi pertama maka gunakan rumus perhitungan dengan cf lama sebelumnya (CF COMBINE)                                
                                    // echo 'CF OLD[' . $urutancf . ']: CF OLD[' . ($urutancf - 1) . '] + (' . $cf . ' * (1 - CF OLD[' . ($urutancf - 1) . '])) <br>';
                                    // echo 'CF OLD[' . $urutancf . ']: ' . $cf_lama . ' + (' . $cf . ' * (1 - ' . $cf_lama . ')) <br>';

                                    $cf_lama = $cf_lama + ($cf * (1 - $cf_lama));

                                    // echo 'CF OLD: ' . $cf_lama . '<br><br>';
                                }

                                $urutancf++;
                            }
                        }
                    }
                    if ($cf_lama > 0) { // ! jika nilai tidak negatif maka tambahkan ke daftar diagnosa
                        //  ? tambahkan penyakit ke daftar list jika sesuai gejala dan perhitungan
                        $list_penyakit += array($penyakit['kode_penyakit'] => number_format($cf_lama, 4));
                    }
                }

                // * mengurutkan dari nilai tertinggi ke rendah
                arsort($list_penyakit);

                // echo '<pre>';
                // var_dump($list_penyakit);
                // echo '</pre>';
                // die;

                // * perhitungan CF END

                
            }

            // Mengurutkan array hasil descending
            $this->array_sort_by_column($final, 'hasil');

            // Passing data ke Views
            $data['judul']      = 'Hasil Perhitungan Metode CBR';
            $data['sub_judul']  = 'Hasil Analisa Dengan Metode CBR';
            $data['final']      = $final;
            $data['klas']       = $this->Model_konsultasi->getData();
            $data['ciri']       = $this->input->post('kode_gejala', true);
            
            // ? tampilkan hasil perhitungan CF
            $data['hasil_penyakit'] = $this->Model_penyakit->getHasilPenyakit($list_penyakit);
            $data['hasil_gejala'] = $this->Model_gejala->getHasilGejala($list_gejala);
            

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