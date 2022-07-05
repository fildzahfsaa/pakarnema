<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kondisi extends CI_Model {

    public function getAllKondisi($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_kondisi', 'ASC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            return $this->db->get('kondisi')->result_array();
        }

        if ($tipe == 'id_kondisi') {
            return $this->db->get_where('kondisi', ['id_kondisi' => $param])->row_array();
        }
    }

}

/* End of file Model_kondisi.php */

?>