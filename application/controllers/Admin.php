<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       // $this->load->model('Funcoes_Model');
        $this->load->model('SessionsVerify_Model');
        $this->load->model('Funcoes_Model');

    }

    public function index()
    {
        $this->db->from('config');
        $this->db->order_by('id','desc');
        $this->db->limit(1,0);
        $get = $this->db->get();
        if($get->num_rows() > 0):

            $result = $get->result_array();
            if (!defined('SITE_NAME')) {
                define('SITE_NAME',''.$result[0]['SITE_NAME'].'');
            }

           if($this->SessionsVerify_Model->logVerAdmin() == true):
            $this->load->view('admin/home');

        else:
            $this->load->view('admin/login');

        endif;

        else:
            $this->load->view('configure');


        endif;
    }
}