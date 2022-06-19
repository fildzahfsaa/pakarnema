<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_pakar extends CI_Model
{
    public function getAlluserpakar()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserByID($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function tambah_pakar()
    {
        $data = [
            'nama_user' => $this->input->post('nama_user', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
        ];
        $this->db->insert('user', $data);
    }

    public function edit_pakar($id_user)
    {
        $data = [
            'nama_user' => $this->input->post('nama_user', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function hapus_pakar($id)
    {
        return $this->db->delete('user', array("id_user" => $id));
    }

}
?>