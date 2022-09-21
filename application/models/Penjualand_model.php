<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Penjualand_model extends CI_Model
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
                tb_jual_d
        ";
        return $this->db->query($q)->result();
    }

    function insert($data)
    {
        $this->db->insert('tb_jual_d', $data);
    }

    function get_data_by_jual_h_id($id)
    {
        $q = "
            select
                *
            from
                tb_jual_d
            where
                jual_h_id = ".$id."
        ";
        return $this->db->query($q)->result();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_jual_d', $data);
    }
}
