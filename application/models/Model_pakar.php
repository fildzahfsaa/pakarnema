<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_pakar extends CI_Model
{
    public function getAlluserpakar()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserByID($id_admin)
    {
        return $this->db->get_where('admin', ['id_admin' => $id_admin])->row_array();
    }

    public function tambah_pakar()
    {
        $data = [
            'nama_admin' => $this->input->post('nama_admin', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
        ];
        $this->db->insert('admin', $data);
    }

    public function edit_pakar($id_admin)
    {
        $data = [
            'nama_admin' => $this->input->post('nama_admin', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
        ];
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $this->db->update('admin', $data);
    }

    public function hapus_pakar($id)
    {
        return $this->db->delete('admin', array("id_admin" => $id));
    }

}
?>