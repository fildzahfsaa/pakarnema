<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_gejala extends CI_Model
{
    public function getAlldatagejala()
    {
        $this->db->select('*');
        $this->db->from('gejala');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllgejala()
    {
        $this->db->select('*');
        $this->db->from('gejala');
        return $this->db->get();
    }

    public function getGejalaByID($kode_gejala)
    {
        return $this->db->get_where('gejala', ['kode_gejala' => $kode_gejala])->row_array();
    }

    public function tambah_gejala()
    {
        $data = [
            'kode_gejala' => $this->input->post('kode_gejala', true),
            'nama_gejala' => $this->input->post('nama_gejala', true),
        ];
        $this->db->insert('gejala', $data);
    }

    public function edit_gejala($kode_gejala)
    {
        $data = [
            'kode_gejala' => $this->input->post('kode_gejala', true),
            'nama_gejala' => $this->input->post('nama_gejala', true),
        ];
        $this->db->where('kode_gejala', $this->input->post('kode_gejala'));
        $this->db->update('gejala', $data);
    }

    public function hapus_gejala($kode)
    {
        return $this->db->delete('gejala', array("kode_gejala" => $kode));
    }

    public function fetch_gejala()
    {
        $this->db->order_by("nama_gejala", "ASC");
        $query = $this->db->get("gejala");
        return $query->result();
    }

    public function hitungTotalgejala()
    {   
        $query = $this->db->get('gejala');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
}

?>