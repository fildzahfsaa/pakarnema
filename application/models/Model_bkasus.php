<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_bkasus extends CI_Model
{

    public function getAlldataDbkasus($id_pengetahuan)
    {
        $this->db->select('*');
        $this->db->from('basiskasus');
        $this->db->join('gejala', 'gejala.kode_gejala = basiskasus.kode_gejala');
        $this->db->where('basiskasus.kode_penyakit', $id_pengetahuan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAlldataDbkasus_penyakit($id_pengetahuan)
    {
        $this->db->select('*');
        $this->db->from('penyakit');
        $this->db->where('penyakit.kode_penyakit', $id_pengetahuan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAlldatabkasus_penyakit()
    {
        $this->db->select('*');
        $this->db->from('penyakit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getIdbkasus(){
		$query = $this->db->query("SELECT MAX(id_bkasus) as idbkasus from basiskasus");
		$hasil = $query->row();
		return $hasil->idbkasus;
    }

    public function tambahbkasus()
    {
        $data = 
        [
            'kode_penyakit' => $this->input->post('nama_penyakit',true),
        ];
        $this->db->insert('basiskasus', $data);
    }

    // public function tambah_Dbkasus()
    // {
    //     $data = 
    //     [
    //         'kode_penyakit' => $this->input->post('kode_penyakit',true),
    //         'kode_gejala'=> $this->input->post('kode_gejala',true),
    //     ];

    //      $insert =$this->db->insert('basiskasus', $data);
    // }

    public function tambahDbkasus()
    {
        $data = 
        [
            'kode_penyakit' => $this->input->post('kode_penyakit',true),
            'kode_gejala'=> $this->input->post('kode_gejala',true),
        ];
        $this->db->insert('basiskasus', $data);
    }

    public function hapus_dbkasus($id)
    {
        return $this->db->delete('basiskasus', array("id_bkasus" => $id));
	}

    public function hapus_bkasus($id)
    {
        return $this->db->delete('basiskasus', array("id_bkasus" => $id));
	}

    // public function getdbkasusByID($id_bkasus){
	// 	$this->db->select('*');
    //     $this->db->from('detail_basiskasus');
    //     $this->db->join('basiskasus', 'basiskasus.id_bkasus = detail_basiskasus.id_bkasus');
    //     $this->db->join('gejala', 'gejala.kode_gejala = detail_basiskasus.kode_gejala');
    //     $this->db->where('basiskasus.id_bkasus', $id_bkasus);
    //     // $this->db->order_by("detail_basiskasus.id_bkasus", "ASC");
	// 	return $this->db->get()->result_array();
    // }

    

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