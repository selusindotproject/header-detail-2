<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Jual extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Jual_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $jual = $this->Jual_model->get_data();
        $data = array(
            'jual' => $jual
        );
        $this->load->view('jual_list', $data);
    }

    public function create()
    {
        $barang = $this->Barang_model->get_data();
        $data = array(
            'nomor_nota' => '',
            'tanggal' => date('Y-m-d'),
            'total' => 0,
            'barang' => $barang
        );
        $this->load->view('jual_form', $data);
    }
}
