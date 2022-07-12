<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_konsultasi extends CI_Model
{

    public function getAlldatakonsultasi()
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->join('penyakit', 'penyakit.kode_penyakit = konsultasi.kode_penyakit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAlldataDkonsultasi($id_konsultasi)
    {
        $this->db->select('*');
        $this->db->from('konsultasi');
        $this->db->where('id_konsultasi', $id_konsultasi);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hitungTotalkonsultasi()
    {   
        $query = $this->db->get('konsultasi');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function insertHasil($data)
    {
        return $this->db->insert('konsultasi', $data);
    }

    public function getPenyakit()
    {
        $query = "SELECT penyakit.* FROM penyakit";
        return $this->db->query($query)->result_array();
    }

    public function getStatus($penyakit)
    {
        $query = "SELECT penyakit.* FROM penyakit WHERE kode_penyakit ='$penyakit'";
        return $this->db->query($query)->row_array();
    }

    // public function getDataKonsul()
    // {
    //     $this->db->select('bobot_user');
    //     $this->db->from('konsultasi');
    //     $this->db->where('id_user', $this->session->userdata('id_user'));
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function getGejala($gejala)
    {
        
        $query = "SELECT gejala.* 
        FROM gejala
        WHERE kode_gejala ='$gejala'";
        return $this->db->query($query)->row_array();
    }

    public function getSama($penyakit, $gejala)
    {
        $query = "SELECT basiskasus.*, gejala.bobot_pakar 
        FROM basiskasus
        JOIN gejala ON gejala.kode_gejala = basiskasus.kode_gejala  
        WHERE basiskasus.kode_penyakit='$penyakit' AND basiskasus.kode_gejala='$gejala'";

        return $this->db->query($query)->row_array();
    }

    public function getPembagi($penyakit)
    {
        $query = "SELECT SUM(gejala.bobot_pakar) AS TOTAL
                FROM basiskasus 
                JOIN gejala ON gejala.kode_gejala = basiskasus.kode_gejala
                WHERE kode_penyakit='$penyakit'";
        $bagi = $this->db->query($query)->row_array();
        return $bagi['TOTAL'];
    }

    public function getJmlGejala($penyakit)
    {

        $this->db->from('basiskasus ');
        $this->db->where('kode_penyakit', $penyakit);
        return $this->db->count_all_results();
    }

    public function getData()
    {
        $query = "SELECT A.*, (SELECT COUNT(kode_penyakit) FROM basiskasus WHERE kode_penyakit = A.kode_penyakit) AS jumlah, penyakit.nama_penyakit, gejala.kode_gejala, gejala.nama_gejala, gejala.bobot_pakar
        FROM basiskasus A
        JOIN penyakit ON penyakit.kode_penyakit = A.kode_penyakit
        JOIN gejala ON gejala.kode_gejala = A.kode_gejala";

        return $this->db->query($query)->result_array();
    }

    public function getPengetahuan($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_bkasus', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            $this->db->join('penyakit', 'basiskasus.kode_penyakit = penyakit.kode_penyakit');
            $this->db->join('gejala', 'basiskasus.kode_gejala = gejala.kode_gejala');
            return $this->db->get('basiskasus')->result_array();
        }

        if ($tipe == 'id_bkasus') {
            return $this->db->get_where('basiskasus', ['id_bkasus' => $param])->row_array();
        }

        if ($tipe == 'kode_penyakit') {
            $this->db->join('gejala', 'basiskasus.kode_gejala = gejala.kode_gejala');
            return $this->db->get_where('basiskasus', ['kode_penyakit' => $param])->result_array();
        }
    }

}

?>