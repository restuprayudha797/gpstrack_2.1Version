<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 6) {
            check_login($is_active);
        } else {


            $this->load->model('Admin_model', 'adm');
        }
    }

    public function index()
    {


        $data['title'] = "Dashboard";

        $this->load->view('backend/layout/header', $data);
        $this->load->view('backend/layout/navbar');
        $this->load->view('backend/admin/index-dashboard');
        $this->load->view('backend/layout/footer');
    }

    public function payment()
    {

        // set data
        $data['title'] = "Pembayaran";
        $data['payment'] = $this->adm->getAllPaymentData();



        $this->load->view('backend/layout/header', $data);
        $this->load->view('backend/layout/navbar');
        $this->load->view('backend/admin/payment/index-payment');
        $this->load->view('backend/layout/footer');
    }


    public function Prosess_Data($state, $id)
    {

        $this->adm->Prosess_Data($state, $id);
    }
}
