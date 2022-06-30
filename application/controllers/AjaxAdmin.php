<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcoes_Model');
        $this->load->model('SessionsVerify_Model');

    }


    //Funções de Acesso
    public function loginAdm()
    {

        if (isset($_POST['user']) and isset($_POST['pass']) and !empty($_POST['user']) and !empty($_POST['pass'])):


            $this->db->from('administracao');
            $get = $this->db->get();
            if ($get->num_rows() == 0):

                $dd['user'] = $_POST['user'];
                $dd['pass'] = md5($_POST['pass']);
                $dd['status'] = 1;
                $this->db->insert('administracao', $dd);

            endif;


            $this->db->from('administracao');
            $this->db->where('user', $_POST['user']);
            $this->db->where('pass', md5($_POST['pass']));
            $get = $this->db->get();
            if ($get->num_rows() > 0):

                $result = $get->result_array();
                if ($result[0]['status'] == 1):
                    $_SESSION['Auth02'] = 'true';
                    $_SESSION['NAME_ADMIN'] = $result[0]['nome'];
                    $_SESSION['NAME_ADMIN'] = $result[0]['nome'];
                    $_SESSION['PASS_ADMIN'] = $result[0]['pass'];
                    $_SESSION['ID_ADMIN'] = $result[0]['id'];

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
    }

    public function editSave()
    {
        if ($this->SessionsVerify_Model->logVerAdmin() == true):
            
                        $urlValue = str_replace(array('adicionar', 'edit'), array('', ''), $_POST['urlValue']);

            

/*
            if(isset($_POST['utilizado']) and $_POST['utilizado'] == 1 and isset($_POST['produtos'])):
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

            if(isset($_POST['tabela']) and $_POST['tabela'] == 'produtos'):




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

                $empresa_dado = $get->result_array();




                $this->db->from('produtos');
                $this->db->where('status', $_POST['empresas']);
                $this->db->where('valido >', date('m/d/Y'));
                $this->db->where('empresas', $_POST['empresas']);
                $get = $this->db->get();

                $conta_ofertas = $get->num_rows();

endif;



            $subpasta =  PASTA;





            if(isset($_SESSION['pasta'])):
                $subpasta = $_SESSION['pasta'];
            endif;

            //Upload imagens


            if($_POST['tabela'] == 'produtos'):
                $_POST['promobanner'] = '';

            endif;
            if (isset($_FILES['promobanner']) && $_FILES['promobanner']['size'] > 0):

                $extensoes_aceitas = array('bmp', 'png', 'svg', 'jpeg', 'jpg', 'gif', 'webp');
                $array_extensoes = explode('.', $_FILES['promobanner']['name']);
                $extensao = strtolower(end($array_extensoes));

                // Validamos se a extensão do arquivo é aceita
                if (array_search($extensao, $extensoes_aceitas) === false):
                    unset($_FILES['promobanner']);

                endif;

                // Verifica se o upload foi enviado via POST
                if (is_uploaded_file($_FILES['promobanner']['tmp_name'])):


                    // Monta o caminho de destino com o nome do arquivo
                    $nome_escudo = date('dmY') . '_' . rand() . $_FILES['promobanner']['name'];




                    // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
                    if (!move_uploaded_file($_FILES['promobanner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$subpasta.'/web/imagens/' . $nome_escudo)):
                        unset($_FILES['promobanner']);

                    else:



                            $_POST['promobanner'] = $nome_escudo;


                    endif;


                else:


                endif;
            else:

                // echo $_FILES['image'.$i]['name'];

                //var_dump($_FILES);
                //echo $i;
            endif;


            if (isset($_FILES['image'])):
                $_FILES['image1'] = $_FILES['image'];

            endif;
            for ($i = 1; $i < 10; $i++):
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




                        // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
                        if (!move_uploaded_file($_FILES['image' . $i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$subpasta.'/web/imagens/' . $nome_escudo)):
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


            if ($_POST['tabela'] == 'produtos' and isset($_POST['empresas'])):

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

            //Processar
            $tabela = $_POST['tabela'];
            unset($_POST['tabela']);
            $urlValue = str_replace(array('adicionar', 'edit'), array('', ''), $_POST['urlValue']);
            unset($_POST['urlValue']);

            if (isset($_POST['edit'])):
                $edit = $_POST['edit'];
                unset($_POST['edit']);
                $this->db->where('id', $edit);
                if ($this->db->update($tabela, $_POST)):
                    header('Location:' . $urlValue);
                else:
                    $_SESSION['erro'] = 'Erro ao atualiza a tabela!';
                    header('Location:' . $urlValue);
                endif;
            else:
                if ($this->db->insert($tabela, $_POST)):
                    header('Location:' . $urlValue);
                else:
                    $_SESSION['erro'] = 'Erro ao adicionar a tabela!';
                    header('Location:' . $urlValue);

                endif;




        //aqui mano

             endif;
        endif;

    }

    public function delete()
    {
        if ($this->SessionsVerify_Model->logVerAdmin() == true):


                    
            $this->db->from('menu_admin');
            $this->db->where('id', $_POST['page']);
            $get = $this->db->get();
            $result = $get->result_array();
            $dados = $result[0];

            if (count($dados) > 0):

                $this->db->where('id', $_POST['item']);
                if ($this->db->delete($dados['tabela'])):
                    echo 11;
                else:
                    echo 0;
                endif;
            endif;
                        endif;

    }

    public function logout()
    {
        if ($this->SessionsVerify_Model->logVerAdmin() == true):
            unset($_SESSION['Auth02']);
            unset($_SESSION['NAME_ADMIN']);
            unset($_SESSION['PASS_ADMIN']);
            unset($_SESSION['ID_ADMIN']);
            echo 11;
        else:
            echo 'Erro ao realizar logoff';

        endif;
    }

    public function ValidarCompras()
    {
        $validado =  0;

        if (isset($_POST['vouchers']) and !empty($_POST['vouchers']) or isset($_POST['vouchers']) and count($_POST['vouchers']) > 0):
            foreach ($_POST['vouchers'] as $key => $value) {

                $this->db->from('pedidos');
                $this->db->where('id', $value);
                $get = $this->db->get();
                $count = $get->num_rows();
                $resp = $get->result_array();
                if ($count > 0 and $resp[0]['pago'] == 0):
                    $validado = 'Esse voucher ainda não foi pago!';

                else:

                    $dd['data_validado'] = date('d/m/Y');
                    $dd['utilizado'] = 1;
                    $this->db->where('id', $value);
                    $this->db->where('pago', 1);
                    if ($this->db->update('pedidos', $dd)):

                        $dv['empresas'] = $resp[0]['id'];
                        $dv['data'] = date('d/m/Y');
                        $dv['ip'] = $_SERVER["REMOTE_ADDR"];
                        $dv['status'] = 1;
                        $this->db->insert('validados', $dv);

                        if($resp[0]['pago'] == 1):
                            $validado =  11;

                        else:
                            $validado = 'Erro ao validar o voucher, verifique se ele foi pago!';
                         endif;
                    else:
                        $validado = 'Erro ao validar o voucher, verifique se ele foi pago!';
                        echo 'Erro ao validar o voucher, verifique se ele foi pago!';

                    endif;

                endif;

            }

        else:
            $validado = 'Selecione os Vouchers para validação.';
        endif;

        echo $validado;
    }




    public function ValidarDesconto()
    {
        $validado =  0;

        if (isset($_POST['vouchers']) and !empty($_POST['vouchers']) or isset($_POST['vouchers']) and count($_POST['vouchers']) > 0):
            foreach ($_POST['vouchers'] as $key => $value) {



                    $dd['data_validado'] = date('d/m/Y');
                    $dd['utilizado'] = 1;
                    $this->db->where('id', $value);
                    if ($this->db->update('pedidos', $dd)):

                        $dv['data'] = date('d/m/Y');
                        $dv['ip'] = $_SERVER["REMOTE_ADDR"];
                        $dv['status'] = 1;
                        $this->db->insert('validados', $dv);
                        $validado =  11;

                    else:
                        $validado = 'Erro ao validar o voucher, tente novamente!';

                    endif;

            }

        else:
            $validado = 'Selecione os Vouchers para validação.';
        endif;

        echo $validado;
    }
}
