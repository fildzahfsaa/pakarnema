<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_penyakit extends CI_Model
{
    public function getAlldatapenyakit()
    {
        $this->db->select('*');
        $this->db->from('penyakit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenyakitByID($kode_penyakit)
    {
        return $this->db->get_where('penyakit', ['kode_penyakit' => $kode_penyakit])->row_array();
    }

    public function tambah_penyakit()
    {
        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit', true),
            'nama_penyakit' => $this->input->post('nama_penyakit', true),
            'penanganan' => $this->input->post('penanganan', true),
        ];
        $this->db->insert('penyakit', $data);
    }

    public function edit_penyakit($kode_penyakit)
    {
        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit', true),
            'nama_penyakit' => $this->input->post('nama_penyakit', true),
            'penanganan' => $this->input->post('penanganan', true),
        ];
        $this->db->where('kode_penyakit', $this->input->post('kode_penyakit'));
        $this->db->update('penyakit', $data);
    }

    public function hapus_penyakit($kode)
    {
        return $this->db->delete('penyakit', array("kode_penyakit" => $kode));
    }

    public function fetch_penyakit()
    {
        $this->db->order_by("nama_penyakit", "ASC");
        $query = $this->db->get("penyakit");
        return $query->result();
    }

    public function hitungTotalpenyakit()
    {   
        $query = $this->db->get('penyakit');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function getPenyakit($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('kode_penyakit', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            return $this->db->get('penyakit')->result_array();
        }

        if ($tipe == 'kode_penyakit') {
            return $this->db->get_where('penyakit', ['kode_penyakit' => $param])->row_array();
        }
    }

    public function getHasilPenyakit($list_penyakit) {
        $array_hasil_penyakit = array();

        foreach ($list_penyakit as $kode_penyakit => $nilai) {
            $penyakit_temp = $this->getPenyakit('kode_penyakit', $kode_penyakit);
            $penyakit = array(
                'kode_penyakit' => $penyakit_temp['kode_penyakit'],
                'nama_penyakit' => $penyakit_temp['nama_penyakit'],
                'nilai_perhitungan' => (float) $nilai,
            );

            // * menambahkan penyakit ke array penyakit
            array_push($array_hasil_penyakit, $penyakit);
        }

        return $array_hasil_penyakit;
    }
}

?>