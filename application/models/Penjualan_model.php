<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Penjualan_model extends CI_Model
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
                tb_jual_h
        ";
        return $this->db->query($q)->result();
    }

    function insert($data)
    {
        $this->db->insert('tb_jual_h', $data);
    }

    function get_data_by_id($id)
    {
        $q = "
            select
                *
            from
                tb_jual_h
            where
                id = ".$id."
        ";
        return $this->db->query($q)->row();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_jual_h', $data);
    }
}
