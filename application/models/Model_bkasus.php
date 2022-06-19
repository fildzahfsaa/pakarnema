<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_bkasus extends CI_Model
{
    public function getAlldatabkasus()
    {
        $this->db->select('*');
        $this->db->from('basiskasus');
        $this->db->join('penyakit', 'penyakit.kode_penyakit = basiskasus.kode_penyakit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahbkasus()
    {
        $data = 
        [
            'kode_penyakit' => $this->input->post('nama_penyakit',true),
        ];
        $this->db->insert('basiskasus', $data);
    }

    public function hapus_bkasus($id)
    {
        return $this->db->delete('basiskasus', array("id_bkasus" => $id));
	}

    public function getdbkasusByID($id_bkasus){
		$this->db->select('*');
        $this->db->from('detail_basiskasus');
        $this->db->join('basiskasus', 'basiskasus.id_bkasus = detail_basiskasus.id_bkasus');
        $this->db->join('gejala', 'gejala.kode_gejala = detail_basiskasus.kode_gejala');
        $this->db->where('basiskasus.id_bkasus', $id_bkasus);
        // $this->db->order_by("detail_basiskasus.id_bkasus", "ASC");
		return $this->db->get()->result_array();
    }

    public function tambahDbkasus()
    {
        $data = 
        [
            'id_bkasus' => $this->input->post('id_bkasus',true),
            'kode_gejala'=> $this->input->post('nama_gejala'),
            'bobot_pakar'=> $this->input->post('bobot_pakar'),
        ];
        $this->db->insert('detail_basiskasus', $data);
    }

    public function hapus_dbkasus($id)
    {
        return $this->db->delete('detail_basiskasus', array("id_dbkasus" => $id));
	}

    public function hitungTotalbkasus()
    {   
        $query = $this->db->get('basiskasus');
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