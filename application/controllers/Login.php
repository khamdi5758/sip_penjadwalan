<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->has_userdata('id_user')) {
        //     redirect('Welcome');
        // }
        $this->load->model('User_Model');
        $this->load->library('form_validation');
    }
    function index()
    {
        // tampil list range jam
        $this->load->view('login');
    }


    public function validation()
    {
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        if ($this->form_validation->run() == FALSE) {
            redirect("Login");
        } else {
            $username  = $this->input->post('username', true);
            $password  = $this->input->post('password', true);
            $validation = $this->User_Model->validation($username, $password);
            if (is_object($validation)) {
                $newdata = array(
                    'id_user'     => $validation->id_user,
                    'username'  => $validation->username,
                    'level' => $validation->level
                );
                $this->session->set_userdata($newdata);
                redirect('Welcome');
            } else {
                $this->session->set_flashdata('flash_rangejam', 'Dihapus');
                redirect('Login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function binary()
    {
        $arr = [2, 8, 11, 13, 15, 17, 19, 21, 23, 30, 35, 45, 77, 88, 98];
        $left = 0;
        $right = count($arr) - 1;
        $mid = 0;
        $val = 2;
        while ($left <= $right) {
            $mid = ($left + $right) / 2;
            if ($val < $arr[$mid]) {
                $left = $mid - 1;
            } else if ($val > $arr[$mid]) {
                $left = $mid + 1;
            } else {
                echo $mid;
                die;
            }
        }
    }
}
