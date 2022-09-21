<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Penjualan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->model('Barang_model');
        $this->load->model('Penjualand_model');
    }

    public function index()
    {
        $dataPenjualan = $this->Penjualan_model->get_data();
        $data = array(
            'dataPenjualan' => $dataPenjualan,
        );
        $this->load->view('penjualan_list', $data);
    }

    public function create()
    {
        $dataBarang = $this->Barang_model->get_data();
        $data = array(
            'no_nota' => '',
            'tgl' => date('Y-m-d'),
            'total' => 0,
            'dataBarang' => $dataBarang,
        );
        $this->load->view('penjualan_form', $data);
    }

    public function create_action()
    {
        /**
         * simpan data header ke array
         */
        $data = array(
            'no_nota' => $this->input->post('no_nota', true),
            'tgl' => $this->input->post('tgl', true),
            'total' => $this->input->post('total', true),
        );

        /**
         * simpan data header ke tabel header
         */
        $this->Penjualan_model->insert($data);


        /**
         * ambil nilai primary key dari tabel header ... hasil insert data terbaru
         */
        $insert_id = $this->db->insert_id();

        /**
         * collecting data detail
         */
        $data = $this->input->post();
        foreach ($data['barang_id'] as $key => $item) {
            /**
             * simpan data detail ke array
             */
            $detail = [
                'jual_h_id' => $insert_id,
                'barang_id' => $item,
                'qty' => $data['qty'][$key],
                'harga' => $data['harga'][$key],
                'sub_total' => $data['sub_total'][$key],
            ];
            /**
             * simpan data detail ke tabel detail
             */
            $this->Penjualand_model->insert($detail);
        }

        /**
         * kembali ke list
         */
        redirect(site_url('penjualan'));
    }

    public function update($id)
    {
        $row = $this->Penjualan_model->get_data_by_id($id);
        if ($row) {
            $dataBarang = $this->Barang_model->get_data();
            $dataDetail = $this->Penjualand_model->get_data_by_jual_h_id($id);
            $data = array(
                'no_nota' => $row->no_nota,
                'tgl' => $row->tgl,
                'total' => $row->total,
                'dataBarang' => $dataBarang,
                'dataDetail' => $dataDetail,
            );
            $this->load->view('penjualan_form', $data);
        }
    }

    public function update_action($id)
    {
        $row = $this->Penjualan_model->get_data_by_id($id);
        if ($row) {
            $dataBarang = $this->Barang_model->get_data();
            $dataDetail = $this->Penjualand_model->get_data_by_jual_h_id($id);
            $data = array(
                'no_nota' => $row->no_nota,
                'tgl' => $row->tgl,
                'total' => $row->total,
                'dataBarang' => $dataBarang,
                'dataDetail' => $dataDetail,
            );
            $this->load->view('penjualan_form', $data);
        }
    }
}
