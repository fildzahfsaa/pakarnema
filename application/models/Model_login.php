<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    function login($username, $password){
        $this->db->select('nama_admin, username, password, id_admin');
        $this->db->from('admin');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->limit(1);
        
        $query=$this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }

}

/* End of file Model_login.php */

?>