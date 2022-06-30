<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxEmpresa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcoes_Model');
        $this->load->model('SessionsVerify_Model');
    }

    public function login()
    {
        if($this->SessionsVerify_Model->logVerEmpresa() == false):


            if (isset($_POST['email']) and isset($_POST['pass']) and !empty($_POST['email']) and !empty($_POST['pass'])):

                $this->db->from('empresas');
                $this->db->where('email', $_POST['email']);
                $this->db->where('pass', md5($_POST['pass']));
                $get = $this->db->get();
                if ($get->num_rows() > 0):

                    $result = $get->result_array();
                    if ($result[0]['status'] == 1):
                        $_SESSION['Auth03'] = 'true';
                        $_SESSION['NAME_EMPRESA'] = $result[0]['nome'];
                        $_SESSION['EMAIL_EMPRESA'] = $result[0]['email'];
                        $_SESSION['PASS_EMPRESA'] = $result[0]['pass'];
                        $_SESSION['ID_EMPRESA'] = $result[0]['id'];

                        echo 11;

                    else:

                        echo 'Usuario bloqueado!!';

                    endif;
                else:
                    echo 'Usuario ou senha incorretos!!';

                endif;
            else:

                echo 'Erro ao realizar o login!!';
            endif;

        endif;

    }

    public function logout(){
        if($this->SessionsVerify_Model->logVerEmpresa() == true):
            unset($_SESSION['ID_EMPRESA']);
            unset($_SESSION['NAME_EMPRESA']);
            unset($_SESSION['EMAIL_EMPRESA']);
            unset($_SESSION['PASS_EMPRESA']);
            unset($_SESSION['Auth03']);
            echo 11;
            endif;
        }

        public function pagseguro(){
            if($this->SessionsVerify_Model->logVerEmpresa() == true):

            $this->db->where('id',$_SESSION['ID_EMPRESA']);
            $this->db->update('empresas',$_POST);
            echo 11;
            endif;
            }

    public function editSave()
    {
        if ($this->SessionsVerify_Model->logVerEmpresa() == true):
            $urlValue = str_replace(array('adicionar', 'edit'), array('', ''), $_POST['urlValue']);
            unset($_POST['urlValue']);

       /*     if(isset($_POST['utilizado']) and $_POST['utilizado'] == 1 and isset($_POST['produtos'])):
                $this->db->from('produtos');
                $this->db->where('id', $_POST['produtos']);
                $get = $this->db->get();
                $valor = $get->result_array();

                $descontar = $valor[0]['quantidade'] - 1;

                $dps['quantidade'] = $descontar;
                $this->db->where('id', $_POST['produtos']);
                $this->db->update('produtos',$dps);
            endif;
*/

            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();

                $resultCog = $get->result_array();
            //Upload imagens

            if (isset($_FILES['image'])):
                $_FILES['image1'] = $_FILES['image'];

            endif;
            for ($i = 1; $i < 8; $i++):
                if (isset($_FILES['image' . $i]) && $_FILES['image' . $i]['size'] > 0):

                    $extensoes_aceitas = array('bmp', 'png', 'svg', 'jpeg', 'jpg', 'gif');
                    $array_extensoes = explode('.', $_FILES['image' . $i]['name']);
                    $extensao = strtolower(end($array_extensoes));

                    // Validamos se a extensão do arquivo é aceita
                    if (array_search($extensao, $extensoes_aceitas) === false):
                        unset($_FILES['image' . $i]);

                    endif;

                    // Verifica se o upload foi enviado via POST
                    if (is_uploaded_file($_FILES['image' . $i]['tmp_name'])):


                        // Monta o caminho de destino com o nome do arquivo
                        $nome_escudo = date('dmY') . '_' . rand() . $_FILES['image' . $i]['name'];

                        $subpasta = '';

                        if(isset($_SESSION['pasta']) and !empty($_SESSION['pasta'])):
                            $subpasta = $_SESSION['pasta'];
                        endif;

                        // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
                        if (!move_uploaded_file($_FILES['image' . $i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $subpasta.'/web/imagens/' . $nome_escudo)):
                            unset($_FILES['image' . $i]);

                        else:


                            if ($i == 1):
                                $_POST['image'] = $nome_escudo;
                                unset($_FILES['image1']);

                            else:
                                $_POST['image' . $i] = $nome_escudo;
                            endif;


                        endif;


                    else:


                    endif;
                else:

                    // echo $_FILES['image'.$i]['name'];

                    //var_dump($_FILES);
                    //echo $i;
                endif;
            endfor;


            //Filtrar

        if($_POST['tabela'] == 'produtos'):
            $_POST['empresas'] = $_SESSION['ID_EMPRESA'];
            endif;

            if ($_POST['tabela'] == 'produtos' and isset($_POST['empresas'])):

                $this->db->from('empresas');
                $this->db->where('id', $_POST['empresas']);
                $get = $this->db->get();
                $empresa = $get->result_array();

                $this->db->from('produtos');
                $this->db->where('empresas', $_POST['empresas']);
                $get = $this->db->get();
                $produtos = $get->num_rows();


                if($produtos >= $empresa[0]['maximo_ofertas']):

                    header('Location:' . $urlValue);

                endif;


                $this->db->from('empresas');
                $this->db->where('id', $_POST['empresas']);
                $get = $this->db->get();

                if ($get->num_rows() > 0):

                    $result = $get->result_array();
                    $_POST['localidade'] = $result[0]['localidade'];
                    $_POST['selo'] = $result[0]['selo'];
                endif;

            endif;

            if ($_POST['tabela'] == 'empresas' and isset($_POST['selo']) and isset($_POST['edit'])):
                $ard['selo'] = $_POST['selo'];
                $this->db->where('empresas', $_POST['edit']);
                $this->db->update('produtos', $ard);
            endif;

            if (isset($_POST['pass'])):
                if (empty($_POST['pass'])):

                    unset($_POST['pass']);
                else:
                    $_POST['pass'] = md5($_POST['pass']);

                endif;
            endif;
            if($_POST['tabela'] <> 'empresas'):
            $_POST['status'] = 0;
            endif;
            //Processar
            $tabela = $_POST['tabela'];
            unset($_POST['tabela']);


            if (isset($_POST['edit'])):
                $edit = $_POST['edit'];
                unset($_POST['edit']);
                $this->db->where('id', $edit);
                if ($this->db->update($tabela, $_POST)):
                    if($tabela == 'empresas'):

                        $array['corpo'] =  '<h1>Atenção Administrador - Logista</h1><br>
                    <p>Um logista alterou os dados de sua Loja.</p>
                    <p>Para Verificar  <a href="'.base_url('admin?page=3&&type=1&&edit='.$edit).'">clique aqui</a></p>
';
                    else:
                    $array['corpo'] =  '<h1>Atenção Administrador</h1><br>
                    <p>Uma oferta do site foi Alterada por um logista e está inativa até que você valide as Alterações.</p>
                    <p>Para Verificar a oferta e ativa-la <a href="'.base_url('admin?page=5&&type=1&&edit='.$edit).'">clique aqui</a></p>
';
                    endif;
                    $array['para'] =  !empty($resultCog[0]['EMAIL_ADMINISTRATIVO']) ?$resultCog[0]['EMAIL_ADMINISTRATIVO'] : $resultCog[0]['EMAIL_SITE'] ;
                    $array['npara'] =  $resultCog[0]['SITE_NAME'];
                    $array['assunto'] =  $resultCog[0]['SITE_NAME'].' - COMUNICADO AO ADMINISTRADOR';

                    if($this->Funcoes_Model->sendMail($array)):
                        header('Location:' . $urlValue);
                    else:
                        header('Location:' . $urlValue);
                    endif;
                else:
                    $_SESSION['erro'] = 'Erro ao atualiza a tabela!';
                    $array['para'] =  !empty($resultCog[0]['EMAIL_ADMINISTRATIVO']) ?$resultCog[0]['EMAIL_ADMINISTRATIVO'] : $resultCog[0]['EMAIL_SITE'] ;
                    $array['npara'] =  $resultCog[0]['SITE_NAME'];
                    $array['assunto'] =  $resultCog[0]['SITE_NAME'].' - COMUNICADO AO ADMINISTRADOR';

                    if($this->Funcoes_Model->sendMail($array)):
                        header('Location:' . $urlValue);
                    else:
                        header('Location:' . $urlValue);
                    endif;
                    endif;
            else:

                if ($this->db->insert($tabela, $_POST)):


                    $array['corpo'] =  '<h1>Atenção Administrador</h1><br>
                    <p>Uma oferta do site foi Adicionada por um logista e está inativa até que você valide as Alterações.</p>
                    <p>Para Verificar a oferta e ativa-la <a href="'.base_url('admin?page=5&&type=1&&edit='.$this->db->insert_id()).'">clique aqui</a></p>
';
                    $array['para'] =  !empty($resultCog[0]['EMAIL_ADMINISTRATIVO']) ?$resultCog[0]['EMAIL_ADMINISTRATIVO'] : $resultCog[0]['EMAIL_SITE'] ;
                    $array['npara'] =  $resultCog[0]['SITE_NAME'];
                    $array['assunto'] =  $resultCog[0]['SITE_NAME'].' - COMUNICADO AO ADMINISTRADOR';

                    if($tabela <> 'empresas'):

                    if($this->Funcoes_Model->sendMail($array)):
                        header('Location:' . $urlValue);
                    else:
                        header('Location:' . $urlValue);
                    endif;
                    else:
                        header('Location:' . $urlValue);

                    endif;
                    else:

                        $array['corpo'] =  '<h1>Atenção Administrador</h1><br>
                    <p>Uma oferta do site foi Adicionada por um logista e está inativa até que você valide as Alterações.</p>
                    <p>Para Verificar a oferta e ativa-la <a href="'.base_url('admin?page=5&&type=1&&edit='.$this->db->insert_id()).'">clique aqui</a></p>
';
                        $array['para'] =  !empty($resultCog[0]['EMAIL_ADMINISTRATIVO']) ?$resultCog[0]['EMAIL_ADMINISTRATIVO'] : $resultCog[0]['EMAIL_SITE'] ;
                        $array['npara'] =  $resultCog[0]['SITE_NAME'];
                        $array['assunto'] =  $resultCog[0]['SITE_NAME'].' - COMUNICADO AO ADMINISTRADOR';
                        if($tabela <> 'empresas'):

                        if($this->Funcoes_Model->sendMail($array)):
                            header('Location:' . $urlValue);
                        else:
                            header('Location:' . $urlValue);
                        endif;
                        else:
                        header('Location:' . $urlValue);
                        endif;
                endif;
            endif;
        endif;

    }

}
