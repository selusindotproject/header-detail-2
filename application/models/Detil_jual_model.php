<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Detil_jual_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_data()
    {
        $q = "
            select
                *
            from
                detil_jual
        ";
        return $this->db->query($q)->result();
    }

    function get_data_by_id_jual($id_jual)
    {
        $q = "
            select
                *
            from
                detil_jual
            where
                id_jual = ".$id_jual."
        ";
        return $this->db->query($q)->result();
    }

    function insert($data)
    {
        $this->db->insert('detil_jual', $data);
    }

    function delete_by_id_jual($id_jual)
    {
        $this->db->where('id_jual', $id_jual);
        $this->db->delete('detil_jual');
    }
}
