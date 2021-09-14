<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Main_model');
        $this->load->helper(array('Form', 'Cookie', 'String'));
    }

    public function index(){
        
        if($_POST){
            $this->login();
        } else {
            // ambil cookie
            $cookie = get_cookie('admintoafl');
            // cek session
            if ($this->session->userdata('username')) {
                redirect(base_url("home"));
            } else if($cookie <> '') {
                
                $row = $this->Main_model->get_one("admin", ["cookie" => $cookie]);
    
                if ($row) {
                    $this->_daftarkan_session($row);
                } else {
                    $data['title'] = 'Login';
                    $this->load->view("pages/auth/sign-in", $data);
                }
            } else {
                $data['title'] = 'Login';
                $this->load->view("pages/auth/sign-in", $data);
            }
        }
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post("password", TRUE);
        $remember = $this->input->post('remember');
        $row = $this->Main_model->get_one("admin", ["username" => $username, "password" => MD5($password)]);

        if ($row) {
            // login berhasil
            // 1. Buat Cookies jika remember di check
            if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie('admintoafl', $key, 3600*24*365); // set expired 30 hari kedepan
                // simpan key di database
                
                $this->Main_model->edit_data("admin", ["id_admin" => $row['id_admin']], ["cookie" => $key]);
            }
            $this->_daftarkan_session($row);
        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Login gagal, kombinasi username dan password salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            $data['title'] = 'Login';
            $this->load->view("pages/auth/sign-in", $data);
        }
    }

    public function _daftarkan_session($row) {
        // 1. Daftarkan Session
        $sess = array(
            'admintoafl' => $row['username']
        );

        $this->session->set_userdata($sess);
        // 2. Redirect ke home
        redirect(base_url("home"));
    }

    public function logout(){
        // delete cookie dan session
        delete_cookie('admintoafl');
        $this->session->sess_destroy();
        redirect(base_url("auth"));
    }
    

}

/* End of file Auth.php */
