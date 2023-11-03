<?php

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 2) {
            check_login($is_active);
        }
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Informasi Pembayaran";

        $this->load->view('frontend/layout/frontend-header', $data);
        $this->load->view('frontend/layout/frontend-navbar');
        $this->load->view('frontend/payment/index-payment');
        $this->load->view('frontend/layout/frontend-footer');
    }


    public function pay()
    {

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        // Cek apakah user ada mengupload gambar
        $proof_of_payment =   $_FILES['proof_of_payment']['name'];

        $proof = 'kosong';

        if ($proof_of_payment) {

            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['max_size']     = '3024';
            $config['upload_path'] = './assets/images/proof_of_payment';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('proof_of_payment')) {

                $proof = $this->upload->data('file_name');
            } else {

                echo $this->upload->display_errors();
            }
        }

        // akhir dari pengecekan gambar

        if ($proof == 'kosong') {

            $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
            <p>Pastikan yang anda upload adalah gambar dan type :</p>
            <p>(.jpg | .jpeg | .png | .pdf)</p> </div>');
            redirect('auth/payment');
        } else {
            $data = [
                'email' => $user['email'],
                'package' => 4,
                'proof_of_payment' => $proof,
                'payment_date' => time(),
                'role_payment' => 1,
            ];

            $this->db->insert('payment', $data);

            redirect('informasi-pembayaran');
        }
    }
}
