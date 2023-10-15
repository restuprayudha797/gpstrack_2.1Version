<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{


    public function index(){


    $data['title'] = 'Beranda';

    $this->load->view('frontend/layout/frontend-header', $data);
    $this->load->view('frontend/layout/frontend-navbar');
    $this->load->view('frontend/home/index-home');
    $this->load->view('frontend/layout/frontend-footer');


    }



}
