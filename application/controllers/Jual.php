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
        $this->load->model('Detil_jual_model');
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

    public function create_action()
    {
        /**
         * simpan data master ke array
         */
        $data = array(
            'nomor_nota' => $this->input->post('nomor_nota', true),
            'tanggal' => $this->input->post('tanggal', true),
            'total' => $this->input->post('total', true),
        );

        /**
         * simpan data master ke tabel jual
         */
        $this->Jual_model->insert($data);


        /**
         * ambil nilai primary key dari tabel master ... hasil insert data terbaru
         */
        $insert_id = $this->db->insert_id();

        /**
         * collecting data detil
         */
        $post = $this->input->post();

        /**
         * loop data detil
         */
        foreach ($post['id_barang'] as $key => $item) {

            /**
             * simpan data detil ke array
             */
            $data = [
                'id_jual' => $insert_id,
                'id_barang' => $item,
                'jumlah' => $post['jumlah'][$key],
                'harga' => $post['harga'][$key],
            ];

            /**
             * simpan data detil ke tabel detil_jual
             */
            $this->Detil_jual_model->insert($data);
        }

        /**
         * kembali ke list
         */
        redirect(site_url('jual'));
    }
}
