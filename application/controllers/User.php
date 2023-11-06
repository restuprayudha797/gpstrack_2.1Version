<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 3) {
            check_login($is_active);
        } else {
            // load model
        }
    }


    public function index()
    {

        // Ambil data dari database atau sumber data lainnya

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'title' => 'Dashboard',
            'content' => 'dashboard/dashboard',
            'user' => $user
        ];

        $this->load->view('user/index', $data);
    }


    public function location()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $userActive = $this->db->get_where('user_active', ['email' => $user['email']])->row_array();
        $marker  = $this->db->get('marker_' . $userActive['id_active'])->row_array();
        $data = [
            'title' => 'Location',
            'content' => 'location/index',
            'user' => $user,
            'marker' => $marker
        ];

        $this->load->view('user/index', $data);
    }

    public function saklar()
    {

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $userActive = $this->db->get_where('user_active', ['email' => $user['email']])->row_array();
        $ledStatus  = $this->db->get('ledstatus_' . $userActive['id_active'])->result_array();


        $data = [
            'title' => 'Saklar',
            'content' => 'saklar/index',
            'user' => $user,
            'ledStatus' => $ledStatus
        ];
        $this->load->view('user/index', $data);
    }

    public function on()
    {

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $userActive = $this->db->get_where('user_active', ['email' => $user['email']])->row_array();

        $tbName = 'ledstatus_' . $userActive['id_active'];
        var_dump($tbName);

        $this->db->set('state', 1);
        $this->db->update($tbName);

        redirect('saklar');
    }
    public function Off()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $userActive = $this->db->get_where('user_active', ['email' => $user['email']])->row_array();

        $tbName = 'ledstatus_' . $userActive['id_active'];
        var_dump($tbName);

        $this->db->set('state', 0);
        $this->db->update($tbName);

        redirect('saklar');
    }
}
