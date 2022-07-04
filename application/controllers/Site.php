<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         $this->load->model('Funcoes_Model');
        $this->load->model('SessionsVerify_Model');

    }

    public function error(){

        $this->load->view('site/error404');

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

         endif;

            if($this->uri->segment(1) == 'categoria'):
            $this->db->from('categorias');
            $this->db->where('id', $this->uri->segment(2));
            $this->db->where('status', 1);
            $this->db->order_by('id', 'desc');
            $get = $this->db->get();
            if($get->num_rows() <=0):
              //  header("Location:/".CAMINHO);
            else:
                $valor = $get->result_array()[0];
            endif;
        $array['pageAtual'] = @$valor['nome'];
        $array['categoria'] =  $this->uri->segment(2);

        else:
        $array['pageAtual'] = 'Destaques';

        endif;
        $this->load->view('site/home',$array);
    }

    

    public function contato()
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

        endif;

        $this->load->view('site/contato');
    }

    public function parceiro()
    {
        

        $this->load->view('site/parceiro');
    }
    
    public function oferta()
    {

        $this->db->from('produtos');
        $this->db->where('id', $this->uri->segment(2));
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $get = $this->db->get();

        if($get->num_rows() > 0):


            $result = $get->result_array()[0];

        else:

            header("Location: ".base_url());


        endif;
        $this->load->view('site/fixed_files/header');
        $this->load->view('site/oferta');

    }

    public function login()
    {
        if($this->SessionsVerify_Model->logVer() == true):
            header('Location: '.base_url('minha-conta'));

        else:

            $this->load->view('site/login');

        endif;
    }

  public function cadastro()
    {

        if($this->SessionsVerify_Model->logVer() == true):
            header('Location: '.base_url('minha-conta'));

        else:

            $this->load->view('site/cadastro');

        endif;
    }

    public function minha_conta()
    {
        if($this->SessionsVerify_Model->logVer() == true):
            $this->load->view('site/perfil/minha_conta');

            else:

                header('Location: '.base_url('login'));

        endif;
    }

    public function checkout()
    {
        if($this->SessionsVerify_Model->logVer() == true):
            $this->load->view('site/checkout');

            else:

                header('Location: '.base_url('login'));

        endif;
    }

    public function comprovante()
    {
        if($this->SessionsVerify_Model->logVer() == true):
            $this->load->view('site/comprovante');

            else:

                header('Location: '.base_url('login'));

        endif;
    }


    public function paginas()
    {

    $this->db->from('paginas');
    $this->db->where('url',$this->uri->segment(2));
    $get = $this->db->get();

    if($get->num_rows() > 0):
        $result = $get->result_array();

        $array['meta_title'] = $result[0]['meta_title'];
        $array['meta_description'] = $result[0]['meta_description'];
        $array['meta_autor'] = $result[0]['meta_autor'];
        $array['meta_keywords'] = $result[0]['meta_keywords'];
        $array['conteudo'] = $result[0]['conteudo'];
        $this->load->view('site/paginas',$array);
        else:

        $this->index();

    endif;
    }


}
