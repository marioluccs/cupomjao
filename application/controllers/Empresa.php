<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcoes_Model');
        $this->load->model('SessionsVerify_Model');

    }

    public function index()
    {
        if($this->SessionsVerify_Model->logVerEmpresa() == true):

            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();
            if($get->num_rows() > 0):

                $result = $get->result_array();

            $arr['nomeEmpresa'] = $result[0]['SITE_NAME'];

            else:

            $arr['nomeEmpresa'] = '';

            endif;

            $this->db->from('empresas');
            $this->db->where('id',$_SESSION['ID_EMPRESA']);
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();

            $result = $get->result_array();
            $arr['arrEmpresa'] = $result;
            $this->load->view('empresa/home',$arr);

        else:

            $this->load->view('empresa/login');

        endif;
    }


    public function configuracoes()
    {
        if($this->SessionsVerify_Model->logVerEmpresa() == true):

            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();
            if($get->num_rows() > 0):

                $result = $get->result_array();

                $arr['nomeEmpresa'] = $result[0]['SITE_NAME'];

            else:

                $arr['nomeEmpresa'] = '';

            endif;

            $this->db->from('empresas');
            $this->db->where('id',$_SESSION['ID_EMPRESA']);
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();

            $result = $get->result_array();
            $arr['arrEmpresa'] = $result;
            $this->load->view('empresa/configuracoes',$arr);

        else:

            $this->load->view('empresa/login');

        endif;
    }

    public function produtos()
    {
        if($this->SessionsVerify_Model->logVerEmpresa() == true):

            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();
            if($get->num_rows() > 0):

                $result = $get->result_array();

                $arr['nomeEmpresa'] = $result[0]['SITE_NAME'];

            else:

                $arr['nomeEmpresa'] = '';

            endif;

            $this->db->from('empresas');
            $this->db->where('id',$_SESSION['ID_EMPRESA']);
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();

            $result = $get->result_array();
            $arr['arrEmpresa'] = $result;
            $this->load->view('empresa/produtos',$arr);

        else:

            $this->load->view('empresa/login');

        endif;
    }

    public function pedidos()
    {
        if($this->SessionsVerify_Model->logVerEmpresa() == true):

            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();
            if($get->num_rows() > 0):

                $result = $get->result_array();

                $arr['nomeEmpresa'] = $result[0]['SITE_NAME'];

            else:

                $arr['nomeEmpresa'] = '';

            endif;

            $this->db->from('empresas');
            $this->db->where('id',$_SESSION['ID_EMPRESA']);
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();

            $result = $get->result_array();
            $arr['arrEmpresa'] = $result;
            $this->load->view('empresa/pedidos',$arr);

        else:

            $this->load->view('empresa/login');

        endif;
    }

    public function pagseguro(){
        if($this->SessionsVerify_Model->logVerEmpresa() == true):

            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();
            if($get->num_rows() > 0):

                $result = $get->result_array();
                $arr['nomeEmpresa'] = $result[0]['SITE_NAME'];

            else:

                $arr['nomeEmpresa'] = '';

            endif;

            $this->db->from('empresas');
            $this->db->where('id',$_SESSION['ID_EMPRESA']);
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();

            $result = $get->result_array();
            $arr['arrEmpresa'] = $result;
            $this->load->view('empresa/pagseguro',$arr);

        else:

            $this->load->view('empresa/login');

        endif;
    }
}
