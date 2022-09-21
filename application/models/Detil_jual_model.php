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

    function insert($data)
    {
        $this->db->insert('detil_jual', $data);
    }
}
