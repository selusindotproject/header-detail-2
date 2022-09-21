<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Jual_model extends CI_Model
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
                jual
        ";
        return $this->db->query($q)->result();
    }

    function get_data_by_id_jual($id_jual)
    {
        $q = "
            select
                *
            from
                jual
            where
                id_jual = ".$id_jual."
        ";
        return $this->db->query($q)->row();
    }

    function insert($data)
    {
        $this->db->insert('jual', $data);
    }

    function update($id_jual, $data)
    {
        $this->db->where('id_jual', $id_jual);
        $this->db->update('jual', $data);
    }

    function delete($id_jual)
    {
        $this->db->where('id_jual', $id_jual);
        $this->db->delete('jual');
    }
}
