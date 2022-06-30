<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcoes_Model');
        $this->load->model('SessionsVerify_Model');
        date_default_timezone_set("America/Sao_Paulo");
        setlocale(LC_ALL, 'pt_BR');
    }



    public function contato(){
        $this->db->from('config');
        $this->db->order_by('id','desc');
        $this->db->limit(1,0);
        $get = $this->db->get();
        if($get->num_rows() > 0):

            $result = $get->result_array();
           


        $array['corpo'] =  'Nome: '.$_POST['nome'].'<br>';
        $array['corpo'] .=  'Assunto: '.$_POST['assunto'].'<br>';
        $array['corpo'] .=  'Email: '.$_POST['email'].'<br>';
        $array['corpo'] .=  'Texto: '.$_POST['texto'].'<br>';
        $array['para'] =  $result[0]['EMAIL_ADMINISTRATIVO'];
        $array['npara'] =  'Adiministrador';
        $array['assunto'] =  'PortalUrbano  - Contato';

        if($this->Funcoes_Model->sendMail($array)):
            echo 11;
        else:
            echo 'Erro ao enviar email!';
        endif;



        endif;

    }



    public function login()
    {


        $this->db->from('usuarios');
        $this->db->where('email', $_POST['email']);
        $get = $this->db->get();
        if ($get->num_rows() > 0):


            $this->db->from('usuarios');
            $this->db->where('email', $_POST['email']);
            $this->db->where('pass', md5($_POST['pass']));
            $get = $this->db->get();
            if ($get->num_rows() > 0):

                $result = $get->result_array();
                if ($result[0]['status'] == 1):
                    $_SESSION['Auth01'] = 'true';
                    $_SESSION['NAME'] = $result[0]['nome'];
                    $_SESSION['EMAIL'] = $result[0]['email'];
                    $_SESSION['PASS'] = $result[0]['pass'];
                    $_SESSION['ID'] = $result[0]['id'];

                    echo 11;

                else:

                    echo 'Usuario bloqueado!!';

                endif;
            else:

                echo 'Senha incorreta!!';

            endif;
        else:

            echo 'Usuario não cadastrado!!';


        endif;
    }

    public function cadastro()
    {

        if (isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['pass']) and !empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['pass'])):
            $this->db->from('usuarios');
            $this->db->where('email', $_POST['email']);
            $get = $this->db->get();
            if ($get->num_rows() > 0):
                echo 'Usuario já cadastrado!!';
            else:
                $dd['nome'] = ($_POST['nome']);
                $dd['email'] = ($_POST['email']);
                $dd['pass'] = md5($_POST['pass']);
                $insert = $this->db->insert('usuarios', $dd);
                $_SESSION['Auth01'] = 'true';
                $_SESSION['NAME'] = $_POST['nome'];
                $_SESSION['EMAIL'] = $_POST['email'];
                $_SESSION['PASS'] = md5($_POST['pass']);
                $_SESSION['ID'] = $this->db->insert_id();

                if ($this->db->insert_id() > 0):
                    echo 11;
                else:
                    echo 'Erro ao cadastrar o usuario!!';
                endif;
            endif;

        else:

            echo 'Preencha corretamente todos os campos!!';
        endif;
    }

    public function logout()
    {
        if ($this->SessionsVerify_Model->logVer() == true):
            unset($_SESSION['Auth01']);
            unset($_SESSION['NAME']);
            unset($_SESSION['EMAIL']);
            unset($_SESSION['PASS']);
            unset($_SESSION['ID']);
            echo 11;
        else:
            echo 'Erro ao realizar logoff';

        endif;
    }


    public function alterarSenha()
    {

        if ($this->SessionsVerify_Model->logVer() == true):

            $this->db->from('usuarios');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            if ($get->num_rows() > 0):

                $results = $get->result_array();

                if ($_POST['newPassword'] <> $_POST['confirmPassword'] and !empty($results[0]['pass'])):
                    echo 'As senhas não coincidem!';
                else:


                    $this->db->from('usuarios');
                    $this->db->where('id', $_SESSION['ID']);
                    if (!empty($results[0]['pass'])):
                        $this->db->where('pass', md5($_POST['oldPassword']));
                    endif;
                    $get = $this->db->get();
                    if ($get->num_rows() > 0):

                        $dd['pass'] = md5($_POST['newPassword']);
                        $this->db->update('usuarios', $dd);

                        $_SESSION['PASS'] = md5($_POST['newPassword']);

                        echo 11;

                    else:

                        echo 'Senha incorreta!';
                    endif;
                endif;
            endif;
        else:
            echo 'E preciso estar logado para realizar essa ação!!';
        endif;
    }

    public function alteradados()
    {

        if ($this->SessionsVerify_Model->logVer() == true):


            $this->db->from('usuarios');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            if ($get->num_rows() > 0):

                $dd['nome'] = $_POST['nome'];
                $dd['cidade'] = $_POST['cidade'];
                $dd['estado'] = $_POST['estado'];
                $dd['endereco'] = $_POST['endereco'];
                $dd['cep'] = $_POST['cep'];
                $dd['telefone'] = str_replace(array(' ','(',')','-'),array('','','',''),$_POST['telefone']);
                if (!empty($_POST['cpf'])):
                    $dd['cpf'] = $_POST['cpf'];
                endif;
                $this->db->where('id', $_SESSION['ID']);
                $this->db->update('usuarios', $dd);

                echo 11;

            else:

                echo 'Usuario não encontrado!';
            endif;
        else:
            echo 'E preciso estar logado para realizar essa ação!!';
        endif;
    }

    public function localidadeDefine()
    {
        $_SESSION['localidade'] = $_POST['localidade'];


        $this->db->from('localidade');
        $this->db->where('id', $_POST['localidade']);
        $get = $this->db->get();
        if ($get->num_rows() > 0):
            $_SESSION['localidadeName'] = $get->result_array()[0]['nome'];
            else:
              $_SESSION['localidadeName'] = 'Todos Locais';  
        endif;
        echo 11;
    }


    //Login via Facebook


    public function dadosfacebookrecupera($token, $email)
    {
        $this->db->select('FACEBOOK_ID,FACEBOOK_KEY');
        $this->db->from('config');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $get = $this->db->get();
        $count = $get->num_rows();

        if ($count > 0):

            $fbdata = $get->result_array();

            require_once 'application/core/api/facebook/Facebook/autoload.php';

//$token = $_SESSION['fb_access_token'];
            $fb = new Facebook\Facebook([
                'app_id' => $fbdata[0]['FACEBOOK_ID'],
                'app_secret' => $fbdata[0]['FACEBOOK_KEY'],
                'default_graph_version' => 'v2.2',
            ]);

            try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->get('/me?fields=id,name,email', $token);
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            $user = $response->getGraphUser();


            if (!empty($email) and !isset($user['email'])):


                if (!preg_match('/^[0-9a-z\_\.\-]+\@[0-9a-z\_\.\-]*[0-9a-z\_\-]+\.[a-z]{2,3}$/i', $email)) {
                    $user['email'] = '';
                    echo 'Email Inválido';

                } else {
                    $user['email'] = $email;

                }


            endif;

            if (isset($user['email']) or isset($user['id'])):

                $this->db->select('*');
                $this->db->from('usuarios');
                $this->db->where('email', @$user['email']);
                $this->db->or_where('fb_id', $user['id']);
                $this->db->order_by('id', 'desc');
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $count = $get->num_rows();
                if ($count > 0):
//Aqui o Email vindo do facebook já Existe então realiza Login

                    $result = $get->result_array();
                    $_SESSION['Auth01'] = true;
                    $_SESSION['NAME'] = $result[0]['nome'];
                    $_SESSION['EMAIL'] = $result[0]['email'];
                    $_SESSION['PASS'] = $result[0]['pass'];
                    $_SESSION['ID'] = $result[0]['id'];

                    echo 11;

                else:
//Aqui o Email vindo do facebook não Existe então realiza Cadastro

                    $dd['nome'] = $user['name'];
                    $dd['email'] = isset($user['email']) ? $user['email'] : '';

                    $dd['fb_id'] = $user['id'];
                    $dd['status'] = 1;

                    if ($this->db->insert('usuarios', $dd)):


                        $_SESSION['Auth01'] = true;
                        $_SESSION['NAME'] = $user['name'];
                        $_SESSION['EMAIL'] = @$user['email'];
                        $_SESSION['PASS'] = '';
                        $_SESSION['ID'] = $this->db->insert_id();
                        echo 11;

                    /*
                     $dd['para'] = $user['email'];
                     $dd['npara'] = $user['name'];
                     $dd['assunto'] = 'Cadastro realizado com sucesso.';

                     $dd['mensagem'] = 'Olá '.$user['nome'].', Bem vindo ao CupomBR.';
                     if($this->Functions->sendemail($dd) == 11):
                         echo 11;
                     else:
                         echo 11;

                     endif;
                    */
                    else:

                        echo 'Erro ao cadastrar o usuario.';

                    endif;
                endif;

            else:

                echo '0727';

            endif;

//echo 'Name: ' . $user['name'];
// OR
// echo 'Name: ' . $user->getName();

        else:

            echo 'Erro ao realizar login.';


        endif;

    }

    public function facebookloginapi()
    {

        $this->db->select('FACEBOOK_ID,FACEBOOK_KEY');
        $this->db->from('config');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $get = $this->db->get();
        $count = $get->num_rows();
        if ($count > 0):

            $fbdata = $get->result_array();
            require_once 'application/core/api/facebook/Facebook/autoload.php';

            $fb = new Facebook\Facebook([
                'app_id' => $fbdata[0]['FACEBOOK_ID'],
                'app_secret' => $fbdata[0]['FACEBOOK_KEY'],
                'default_graph_version' => 'v2.2',
            ]);

            $helper = $fb->getJavaScriptHelper();

            try {
                $accessToken = $helper->getAccessToken();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if (!isset($accessToken)) {
                echo 'No cookie set or no OAuth data could be obtained from cookie.';
                exit;
            }

// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

//$_SESSION['fb_access_token'] = (string) $accessToken;


            if (isset($_POST['email'])):

                $email_acesso = $_POST['email'];

            else:

                $email_acesso = '';

            endif;
            $token = (string)$accessToken;
            $this->dadosfacebookrecupera($token, $email_acesso);
        else:
            echo 'Erro ao realizar login.';
        endif;

    }

    public function redefinirPass(){
        if ($this->SessionsVerify_Model->logVer() == false):

            if(isset($_POST['email']) and !empty($_POST['email'])):

                $this->db->from('usuarios');
                $this->db->where('email',$_POST['email']);
                $get = $this->db->get();

                if($get->num_rows() > 0):

                    $usuarios = $get->result_array()[0];
                    $this->db->from('config');
                    $this->db->order_by('id','desc');
                    $this->db->limit(1,0);
                    $get = $this->db->get();
                    $cog = $get->result_array();


                    $corpo_email = $cog[0]['EMAIL_SENHA'];
                    $usuarios['tokenRedefina'] =  date('dsm');
                    $corpo_email = $this->Funcoes_Model->filtro_email(1,$corpo_email,$usuarios);

                    $data = date('d-m-Y H:i:s');
                    $valido = date('d/m/Y H:i:s', strtotime("+1 day",strtotime($data)));
                    $dta['email'] = $_POST['email'];
                    $dta['token'] = $usuarios['tokenRedefina'];
                    $dta['data'] = date('d/m/Y H:i:s');
                    $dta['validade'] = $valido;
                    $dta['status'] = 1;
                    $this->db->insert('recupera_senha',$dta);

                    $array['corpo'] =  $corpo_email;
                    $array['para'] =  $_POST['email'];
                    $array['npara'] =  $usuarios['nome'];
                    $array['assunto'] =  'Fisgar Ofertas - Redefinir Senha';

                    if($this->Funcoes_Model->sendMail($array)):
                        echo 11;
                    else:
                        echo 'Erro ao enviar email!';
                    endif;

                else:

                    echo 'Usuario não encontrado!';
                endif;

            else:
                echo 'Preencha corretamente!';
            endif;

        else:
            echo 'Erro desconhecido!';

        endif;
    }

    public function pegarVoucher()
    {
        $this->db->from('produtos');
        $this->db->where('id', $_POST['id']);
        $this->db->limit(1, 0);
        $get = $this->db->get();
        $result = $get->result_array();
        $qnts = $result[0]['quantidade'];

        if($qnts > 0):

            if ($this->SessionsVerify_Model->logVer() == true):

                //Pegar dados do PAGSEGURO
                $this->db->from('pedidos');
                $this->db->where('produtos', $_POST['id']);
                $this->db->where('id_usuario', $_SESSION['ID']);
                $this->db->where('utilizado', 0);
                $get = $this->db->get();
                $count = $get->num_rows();
                if($count > 0):
                    echo 'Você já pegou esse voucher!';
                else:
                    $_SESSION['produto'] = $_POST['id'];
                    $_SESSION['tipo'] = $_POST['tipo'];

                    $this->db->from('produtos');
                    $this->db->where('id', $_POST['id']);
                    $get = $this->db->get();

                    $produto = $get->result_array();

                    $length = 10;
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $randomGenerator = $randomString;

                    $arr['produtos'] = $_POST['id'];
                    $arr['usuarios'] = $_SESSION['ID'];
                    $arr['id_compra'] =  $_POST['id'];
                    $arr['id_usuario'] = $_SESSION['ID'];
                    $arr['valor_pago'] = $produto[0]['valor'];
                    $arr['data_pedido'] = date('d/m/Y');
                    $arr['data_validade'] = $produto[0]['valido'];
                    $arr['tipo_pedido'] = 0;
                    $arr['tipo_compra'] = $_POST['tipo'];
                    $arr['empresas'] = $produto[0]['empresas'];
                    $arr['pago'] = 0;
                    $arr['utilizado'] = 0;
                    $arr['status_do_pedido'] = 0;
                    $arr['code_gerado'] = $randomGenerator;
                    $arr['status'] = 1;



                    $this->db->insert('pedidos',$arr);

                    $pediid = $this->db->insert_id();

                    $arr2['quantidade'] = $qnts - 1;
                    $this->db->where('id', $_POST['id']);
                    //$this->db->update('produtos',$arr2);


                    $this->db->from('config');
                    $this->db->order_by('id','desc');
                    $this->db->limit(1,0);
                    $get = $this->db->get();
                    $cog = $get->result_array();


                    $this->db->from('produtos');
                    $this->db->where('id',$_POST['id']);
                    $this->db->order_by('id','desc');
                    $this->db->limit(1,0);
                    $get = $this->db->get();
                    $produto = $get->result_array();


                    $this->db->from('empresas');
                    $this->db->where('id',$produto[0]['empresas']);
                    $this->db->order_by('id','desc');
                    $this->db->limit(1,0);
                    $get = $this->db->get();
                    $empresas = $get->result_array();


                    $arr['pedidos'] = $pediid;
                    $arr['empresa'] = $empresas[0]['nome'];
                    $corpo_email = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{invite_sender_name}} com [Product Name]</title>
    
    
  </head>
  <body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#F2F4F6"><style type="text/css">
body {
width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;
}
@media only screen and (max-width: 600px) {
  .email-body_inner {
    width: 100% !important;
  }
  .email-footer {
    width: 100% !important;
  }
}
@media only screen and (max-width: 500px) {
  .button {
    width: 100% !important;
  }
}
</style>
    <span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;">{{invite_sender_name}} - Você Pegou o voucher de desconto no site [Product Name] .</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
      <tr>
        <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
            <tr>
              <td class="email-masthead" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;" align="center">
                <a href="https://example.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
        [Product Name]
      </a>
              </td>
            </tr>
            
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;" bgcolor="#FFFFFF">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">
                  
                  <tr>
                    <td class="content-cell" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Olá, {{name}}!</h1>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">{{invite_sender_name}} com {{invite_sender_organization_name}} você pegou um novo Voucher, agora você pode apresenta-lo no estabelecimento para garantir o seu desconto.</p>
                      
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
                        <tr>
                          <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                              <tr>
                                <td align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                  <table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">
                                    <tr>
                                      <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                                        <a href="{{action_url}}" class="button button--" target="_blank" style="-webkit-text-size-adjust: none; background: #3869D4; border-color: #3869d4; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;">Ver Voucher</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Sinta-se à vontade para entrar em contato com nossa equipe a qualquer momento.</p>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left"> Agradecemos por usar o {{site_name}},
                        <br />Equipe [Product Name]</p>
                      <p style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left"><strong style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">P.S.</strong> Precisa de ajuda?  <a href="{{help_url}}" style="box-sizing: border-box; color: #3869D4; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;">Entre em contato conosco</a>.</p>
                      
                      <table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
                        <tr>
                          <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">
Se você estiver tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador.</p>
                            <p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">{{action_url}}</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;">
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                  <tr>
                    <td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
                      <p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">© [Y] [Product Name]. All rights reserved.</p>
                      <p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
                        [Company Name, LLC]
                       
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
';
                    $corpo_email = $this->Funcoes_Model->filtro_email(2,$corpo_email,$arr);


                    $array['corpo'] =  $corpo_email;
                    $array['para'] =  $_SESSION['EMAIL'];
                    $array['npara'] =  $_SESSION['NAME'];
                    $array['assunto'] =  'Voucher Pego com sucesso - Fisgar Ofertas';

                    $this->Funcoes_Model->sendMail($array);

                    echo $pediid;


                endif;





            else:
                echo 'E necessario estar logado para realizar essa ação!';
            endif;
        else:

            echo 'Sem produto em Estoque';
        endif;
    }


    public function redefinirPassNow(){
        if ($this->SessionsVerify_Model->logVer() == false):

            $this->db->from('usuarios');
            $this->db->where('email',$_POST['email']);
            $get = $this->db->get();
            $result = $get->result_array();

            if(isset($_POST['npass']) and isset($_POST['npassagain']) and $_POST['npass'] == $_POST['npassagain']):

                $dd['pass'] = md5($_POST['npass']);
                $this->db->update('usuarios',$dd);

                $this->db->where('email',$_POST['email']);
                $this->db->delete('recupera_senha');

                @session_start();
                $_SESSION['Auth01'] = 'true';
                $_SESSION['ID'] = $result[0]['id'];
                $_SESSION['NAME'] = $result[0]['nome'];
                $_SESSION['EMAIL'] = $result[0]['email'];
                $_SESSION['PASS'] = $result[0]['pass'];
                echo 11;
            else:

                echo 'Ocorreu um erro, tente novamente!';
            endif;

        else:
            echo 11;
        endif;
    }
    public function comprar()
    {
        if ($this->SessionsVerify_Model->logVer() == true):

            $this->db->from('produtos');
            $this->db->where('id', $_POST['id']);
            $this->db->limit(1, 0);
            $get = $this->db->get();
            $result = $get->result_array();


            if($result[0]['quantidade'] > 0):

                //Pegar dados do PAGSEGURO
                $this->db->from('pedidos');
                $this->db->where('produtos', $_POST['id']);
                $this->db->where('id_usuario', $_SESSION['ID']);
                $this->db->where('pago', 0);
                $this->db->where('tipo_pedido', 1);
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $count = $get->num_rows();


                $_SESSION['produto'] = $_POST['id'];
                $_SESSION['tipo'] = $_POST['tipo'];
                $_SESSION['valor'] = $_POST['valor'];
                echo 11;
            else:
                echo 'Sem estoque';
            endif;
        else:

            echo 'E necessario estar logado para realizar essa ação!';

        endif;
    }


    public function finalizarPagamento()
    {
        if ($this->SessionsVerify_Model->logVer() == true):

            echo $_GET['tipo'];
        else:
            echo 'E necessario estar logado para realizar essa ação!';
        endif;
    }

    public function envia_curl($url, $fields)
    {
        $fields_string = '';
        foreach ($fields as $key => $value) {
            @$fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $xml = @simplexml_load_string($result);
        $json = @json_encode($xml);
        $array = @json_decode($json, TRUE);
        if ($array) {
            return $array;
        } else {
            return $result;
        }
    }
    public function getSession()
    {

        if (isset($_POST['empresaPagseguroEmail']) and isset($_POST['empresaPagseguroToken'])):



            $email = $_POST['empresaPagseguroEmail'];
            $token = $_POST['empresaPagseguroToken'];


            $url = "https://ws.pagseguro.uol.com.br/v2/sessions";
            $fields = array(
                'email' => $email,
                'token' => $token
            );

            $array = $this->envia_curl($url, $fields);
            $session_id = $array['id'];

            echo $session_id;

        else:
            //Pegar dados do PAGSEGURO
            $this->db->select('PAGSEGURO_EMAIL,PAGSEGURO_TOKEN');
            $this->db->from('config');
            $this->db->order_by('id', 'desc');
            $this->db->limit(1, 0);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $cog = $get->result_array();

                $email = $cog[0]['PAGSEGURO_EMAIL'];
                $token = $cog[0]['PAGSEGURO_TOKEN'];
//GERA SESSION ID
                $url = "https://ws.pagseguro.uol.com.br/v2/sessions";
                $fields = array(
                    'email' => $email,
                    'token' => $token
                );

                $array = $this->envia_curl($url, $fields);
                $session_id = $array['id'];

                echo $session_id;

            endif;
        endif;


    }


    public function pagamentocartao(){
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomGenerator = $randomString;


        //Pegar dados do PAGSEGURO

        $this->db->select('SITE_NAME,PAGSEGURO_EMAIL,PAGSEGURO_TOKEN');
        $this->db->from('config');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $get = $this->db->get();
        $count = $get->num_rows();
        if ($count > 0):
            $cog = $get->result_array();

            if (isset($_POST['empresaPagseguroEmail']) and isset($_POST['empresaPagseguroToken'])):

                $this->db->from('empresas');
                $this->db->where('email_pagseguro', $_POST['empresaPagseguroEmail']);
                $this->db->where('token_pagseguro', $_POST['empresaPagseguroToken']);
                $this->db->order_by('id', 'desc');
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $result = $get->result_array();


                $email = $_POST['empresaPagseguroEmail'];
                $notificationURL = base_url('NotificationUrlPS/'.$result[0]['id']);
                $urlPagseguro = "https://ws.pagseguro.uol.com.br/v2/";
                $token = $_POST['empresaPagseguroToken'];

            else:

                $email = $cog[0]['PAGSEGURO_EMAIL'];
                $notificationURL = base_url('NotificationUrlPS');
                $urlPagseguro = "https://ws.pagseguro.uol.com.br/v2/";
                $token = $cog[0]['PAGSEGURO_TOKEN'];

            endif;
            //Pagamento via CARTAO

            if (isset($arr['cpf']) or isset($arr['cep']) or isset($arr['estado']) or isset($arr['cidade']) or isset($arr['endereco']) or isset($arr['telefone'])):

                $ars['cpf'] = $_POST['cpf'];
                $ars['cep'] = $_POST['cep'];
                $ars['estado'] = $_POST['estado'];
                $ars['cidade'] = $_POST['cidade'];
                $ars['endereco'] = $_POST['endereco'];
                $ars['telefone'] = str_replace(array(' ','(',')','-'),array('','','',''),$_POST['telefone']);
                //Verifica se existe alguma atualização do cadastro do usuario
                $this->db->where('id', $_SESSION['ID']);
                $this->db->update('usuarios', $ars);
            endif;


            //Aqui faz o select do usuario pra gerar o boleto para pagamento


            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();

            if ($count > 0):
                $result = $get->result_array();

                $result[0]['notificationURL'] = $notificationURL;
                $result[0]['emailPagseguro'] = $email;
                $result[0]['id_produto'] = $_POST['id_produto'];
                $result[0]['sitename'] = $cog[0]['SITE_NAME'];
                $result[0]['cardToken'] = $_POST['creditCardToken'];
                $result[0]['senderHash'] = $_POST['senderHash'];
                $result[0]['holdCardNome'] = $_POST['cardholder'];
                $result[0]['birthDate'] = $_POST['cardholder'];
                $result[0]['valor_compra'] = $_POST['valor_compra'];
                $result[0]['referencecode'] = 'compra-' . md5($_POST['id_produto'] . date('Ymds'));


                $result[0]['cpf'] = str_replace(array('.',',',' '),array('','',''),$result[0]['cpf']);
                $result[0]['cep'] = str_replace(array('.',',',' '),array('','',''),$result[0]['cep']);


                $referencecodeadss = $result[0]['referencecode'];

                $xml = $this->gerarXmlCartao($notificationURL,$email,$referencecodeadss,$_POST['id_produto'],$_POST['id_produto'],$_POST['valor_compra'],$_POST['cardholder'],$result[0]['cpf'] ,'33', '987578845',$result[0]['email'], $_POST['senderHash'],$result[0]['endereco'],'19','--','Centro',$result[0]['cep'],$result[0]['cidade'],$result[0]['estado'],$result[0]['endereco'],'19','--','Centro',$result[0]['cep'],$result[0]['cidade'],$result[0]['estado'],$_POST['creditCardToken'],$_POST['cardholder'],$result[0]['cpf'],$_POST['holdCardNasc'],'33','999213492','1',$_POST['valor_compra']);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $urlPagseguro . "transactions/?email=" . $email . "&token=" . $token);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml; charset=ISO-8859-1'));
                $data = curl_exec($ch);
                $dataXML = simplexml_load_string($data);
                curl_close($ch);


                $this->db->from('produtos');
                $this->db->where('id', $_POST['id_produto']);
                $get = $this->db->get();
                $produtos = $get->result_array();

                $dp['referencecode'] = $referencecodeadss;
                $dp['produtos'] = $_POST['id_produto'];
                $dp['id_usuario'] = $_SESSION['ID'];
                $dp['id_compra'] = $_POST['id_produto'];
                $dp['valor_pago'] = $_POST['valor_compra'];
                $dp['data_pedido'] = date('d/m/Y');
                $dp['tipo_pedido'] = 1;
                $dp['tipo_compra'] = $_SESSION['tipo'];
                $dp['pago'] = 0;
                $dp['empresas'] = $produtos[0]['empresas'];
                $dp['status_do_pedido'] = 1;
                $dp['code_gerado'] = $randomGenerator;
                $dp['usuarios'] = $_SESSION['ID'];
                $dp['status'] = 1;

                $this->db->insert('pedidos', $dp);

                unset($_SESSION['produto']);
                unset($_SESSION['tipo']);
                unset($_SESSION['valor']);

                $this->db->from('produtos');
                $this->db->where('id', $_POST['id_produto']);
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $result = $get->result_array();

                if(count($result) > 0 and $result[0]['quantidade'] > 0):
                    $qnts = $result[0]['quantidade'];
                    $arr2['quantidade'] = $result[0]['quantidade'] - 1;
                    $this->db->where('id', $_POST['id_produto']);
                    $this->db->update('produtos',$arr2);
                endif;

            else:

                return 'Erro ao recuperar os dados do usuario.';

            endif;

        endif;


    }
    public function pagamentoboleto()
    {


        //Pegar dados do PAGSEGURO

        $this->db->select('SITE_NAME,PAGSEGURO_EMAIL,PAGSEGURO_TOKEN');
        $this->db->from('config');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $get = $this->db->get();
        $count = $get->num_rows();
        if ($count > 0):
            $cog = $get->result_array();

            if (isset($_POST['empresaPagseguroEmail']) and isset($_POST['empresaPagseguroToken'])):

                $this->db->from('empresas');
                $this->db->where('email_pagseguro', $_POST['empresaPagseguroEmail']);
                $this->db->where('token_pagseguro', $_POST['empresaPagseguroToken']);
                $this->db->order_by('id', 'desc');
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $result = $get->result_array();


                $email = $_POST['empresaPagseguroEmail'];
                $notificationURL = base_url('NotificationUrlPS/'.$result[0]['id']);
                $urlPagseguro = "https://ws.pagseguro.uol.com.br/v2/";
                $token = $_POST['empresaPagseguroToken'];

            else:

                $email = $cog[0]['PAGSEGURO_EMAIL'];
                $notificationURL = base_url('NotificationUrlPS');
                $urlPagseguro = "https://ws.pagseguro.uol.com.br/v2/";
                $token = $cog[0]['PAGSEGURO_TOKEN'];

            endif;
            //Pagamento via boleto

            if (isset($arr['cpf']) or isset($arr['cep']) or isset($arr['estado']) or isset($arr['cidade']) or isset($arr['endereco']) or isset($arr['telefone'])):

                $ars['cpf'] = $_POST['cpf'];
                $ars['cep'] = $_POST['cep'];
                $ars['estado'] = $_POST['estado'];
                $ars['cidade'] = $_POST['cidade'];
                $ars['endereco'] = $_POST['endereco'];
                $ars['telefone'] = str_replace(array(' ','(',')','-'),array('','','',''),$_POST['telefone']);
                //Verifica se existe alguma atualização do cadastro do usuario
                $this->db->where('id', $_SESSION['ID']);
                $this->db->update('usuarios', $ars);
            endif;


            //Aqui faz o select do usuario pra gerar o boleto para pagamento


            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();

            if ($count > 0):
                $result = $get->result_array();

                $result[0]['notificationURL'] = $notificationURL;
                $result[0]['emailPagseguro'] = $email;
                $result[0]['id_produto'] = $_POST['id_produto'];
                $result[0]['sitename'] = $cog[0]['SITE_NAME'];
                $result[0]['senderHash'] = $_POST['senderHash'];
                $result[0]['valor_compra'] = $_POST['valor_compra'];
                $result[0]['referencecode'] = 'compra-' . md5($_POST['id_produto'] . date('Ymds'));

                $result[0]['cpf'] = str_replace(array('.',',',' '),array('','',''),$result[0]['cpf']);
                $result[0]['cep'] = str_replace(array('.',',',' '),array('','',''),$result[0]['cep']);
                $xml = $this->gerarXmlBoleto($result[0]);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $urlPagseguro . "transactions/?email=" . $email . "&token=" . $token);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml; charset=ISO-8859-1'));

                $data = curl_exec($ch);
                $dataXML = simplexml_load_string($data);
                curl_close($ch);

                if (empty($dataXML->paymentLink)) {
                    header('Content-Type: application/json; charset=UTF-8');
                    $errosOcorridos = array('erro' => '1');
                    echo json_encode($dataXML);
                } else {
                    header('Content-Type: application/json; charset=UTF-8');
                    echo json_encode($dataXML);

                    $length = 10;
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $randomGenerator = $randomString;


                    $this->db->from('produtos');
                    $this->db->where('id', $_POST['id_produto']);
                    $get = $this->db->get();
                    $produtos = $get->result_array();

                    $dp['referencecode'] = $result[0]['referencecode'];
                    $dp['produtos'] = $_POST['id_produto'];
                    $dp['id_usuario'] = $_SESSION['ID'];
                    $dp['id_compra'] = $_POST['id_produto'];
                    $dp['valor_pago'] = $_POST['valor_compra'];
                    $dp['data_pedido'] = date('d/m/Y');
                    $dp['tipo_pedido'] = 1;
                    $dp['tipo_compra'] = $_SESSION['tipo'];
                    $dp['pago'] = 0;
                    $dp['empresas'] = $produtos[0]['empresas'];
                    $dp['status_do_pedido'] = 1;
                    $dp['code_gerado'] = $randomGenerator;
                    $dp['usuarios'] = $_SESSION['ID'];
                    $dp['status'] = 1;

                    $this->db->insert('pedidos', $dp);

                    unset($_SESSION['produto']);
                    unset($_SESSION['tipo']);
                    unset($_SESSION['valor']);

                    $this->db->from('produtos');
                    $this->db->where('id', $_POST['id_produto']);
                    $this->db->limit(1, 0);
                    $get = $this->db->get();
                    $result = $get->result_array();

                    if(count($result) > 0 and $result[0]['quantidade'] > 0):
                        $qnts = $result[0]['quantidade'];
                        $arr2['quantidade'] = $result[0]['quantidade'] - 1;
                        $this->db->where('id', $_POST['id_produto']);
                        $this->db->update('produtos',$arr2);
                    endif;
                }
            else:

                return 'Erro ao recuperar os dados do usuario.';

            endif;

        endif;
    }
    public function pagamentodebito()
    {

        //Pegar dados do PAGSEGURO

        //Pegar dados do PAGSEGURO
        $this->db->select('SITE_NAME,PAGSEGURO_EMAIL,PAGSEGURO_TOKEN');
        $this->db->from('config');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $get = $this->db->get();
        $count = $get->num_rows();
        if ($count > 0):
            $cog = $get->result_array();

            if (isset($_POST['empresaPagseguroEmail']) and isset($_POST['empresaPagseguroToken'])):

                $this->db->from('empresas');
                $this->db->where('email_pagseguro', $_POST['empresaPagseguroEmail']);
                $this->db->where('token_pagseguro', $_POST['empresaPagseguroToken']);
                $this->db->order_by('id', 'desc');
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $result = $get->result_array();


                $email = $_POST['empresaPagseguroEmail'];
                $notificationURL = base_url('NotificationUrlPS/'.$result[0]['id']);
                $urlPagseguro = "https://ws.pagseguro.uol.com.br/v2/";
                $token = $_POST['empresaPagseguroToken'];

            else:

                $email = $cog[0]['PAGSEGURO_EMAIL'];
                $notificationURL = base_url('NotificationUrlPS');
                $urlPagseguro = "https://ws.pagseguro.uol.com.br/v2/";
                $token = $cog[0]['PAGSEGURO_TOKEN'];

            endif;
            if (isset($arr['cpf']) or isset($arr['cep']) or isset($arr['estado']) or isset($arr['cidade']) or isset($arr['endereco']) or isset($arr['telefone'])):

                $ars['cpf'] = $_POST['cpf'];
                $ars['cep'] = $_POST['cep'];
                $ars['estado'] = $_POST['estado'];
                $ars['cidade'] = $_POST['cidade'];
                $ars['endereco'] = $_POST['endereco'];
                $ars['telefone'] = str_replace(array(' ','(',')','-'),array('','','',''),$_POST['telefone']);
                //Verifica se existe alguma atualização do cadastro do usuario
                $this->db->where('id', $_SESSION['ID']);
                $this->db->update('usuarios', $ars);
            endif;


            //Aqui faz o select do usuario pra gerar o boleto para pagamento


            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();

            if ($count > 0):
                $result = $get->result_array();


                $result[0]['banco'] = $_POST['banco'];
                $result[0]['notificationURL'] = $notificationURL;
                $result[0]['emailPagseguro'] = $email;
                $result[0]['id_produto'] = $_POST['id_produto'];
                $result[0]['sitename'] = $cog[0]['SITE_NAME'];
                $result[0]['senderHash'] = $_POST['senderHash'];
                $result[0]['valor_compra'] = $_POST['valor_compra'];
                $result[0]['referencecode'] = 'compra-' . md5($_POST['id_produto'] . date('Ymds'));


                $result[0]['cpf'] = str_replace(array('.',',',' '),array('','',''),$result[0]['cpf']);
                $result[0]['cep'] = str_replace(array('.',',',' '),array('','',''),$result[0]['cep']);
                $xml = $this->gerarXmlDebito($result[0]);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $urlPagseguro . "transactions/?email=" . $email . "&token=" . $token);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml; charset=ISO-8859-1'));
                $data = curl_exec($ch);
                $dataXML = simplexml_load_string($data);
                curl_close($ch);
                if (empty($dataXML->paymentLink)) {
                    header('Content-Type: application/json; charset=UTF-8');
                    $errosOcorridos = array('erro' => '1');
                    echo json_encode($dataXML);
                } else {
                    header('Content-Type: application/json; charset=UTF-8');
                    echo json_encode($dataXML);

                    $length = 10;
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $randomGenerator = $randomString;

                    $this->db->from('produtos');
                    $this->db->where('id', $_POST['id_produto']);
                    $get = $this->db->get();
                    $produtos = $get->result_array();

                    $dp['referencecode'] = $result[0]['referencecode'];
                    $dp['produtos'] = $_POST['id_produto'];
                    $dp['id_usuario'] = $_SESSION['ID'];
                    $dp['id_compra'] = $_POST['id_produto'];
                    $dp['valor_pago'] = $_POST['valor_compra'];
                    $dp['data_pedido'] = date('d/m/Y');
                    $dp['tipo_pedido'] = 1;
                    $dp['empresas'] = $produtos[0]['empresas'];
                    $dp['pago'] = 0;
                    $dp['status_do_pedido'] = 1;
                    $dp['code_gerado'] = $randomGenerator;
                    $dp['tipo_compra'] = $_SESSION['tipo'];
                    $dp['usuarios'] = $_SESSION['ID'];
                    $dp['status'] = 1;

                    $this->db->insert('pedidos', $dp);

                    unset($_SESSION['produto']);
                    unset($_SESSION['tipo']);
                    unset($_SESSION['valor']);
                }
            else:

                return 'Erro ao recuperar os dados do usuario.';

            endif;

        endif;
    }


    //Funcoes XML


    public function gerarXmlCartao($notificationURL, $emailPagseguro,$reference, $id, $produto, $valor, $nome, $cpf, $ddd, $telefone, $email, $senderHash, $endereco, $numero, $complemento, $bairro, $cep, $cidade, $estado, $enderecoPagamento, $numeroPagamento, $complementoPagamento, $bairroPagamento, $cepPagamento, $cidadePagamento, $estadoPagamento, $cardToken, $holdCardNome, $holdCardCPF, $holdCardNasc, $holdCardArea, $holdCardFone, $parcelas, $valorParcelas)
    {
        return "<payment>
  <mode>default</mode>
  <currency>BRL</currency>
  <notificationURL>" . $notificationURL . "</notificationURL>
  <receiverEmail>" . $emailPagseguro . "</receiverEmail>
  <sender>
    <hash>" . $senderHash . "</hash>
    <ip>" . $_SERVER['REMOTE_ADDR'] . "</ip>
    <email>" . $email . "</email>
    <documents>
      <document>
        <type>CPF</type>
        <value>" . $cpf . "</value>
      </document>
    </documents>
    <phone>
      <areaCode>" . $ddd . "</areaCode>
      <number>" . $telefone . "</number>
    </phone>
    <name>" . $nome . "</name>
  </sender>
  <creditCard>
    <token>" . $cardToken . "</token>
    <holder>
      <name>" . $holdCardNome . "</name>
      <birthDate>" . $holdCardNasc . "</birthDate>
        <documents>
          <document>
            <type>CPF</type>
            <value>" . $holdCardCPF . "</value>
          </document>
        </documents>
      <phone>
        <areaCode>" . $holdCardArea . "</areaCode>
        <number>" . $holdCardFone . "</number>
      </phone>
    </holder>
    <billingAddress>
        <street>" . $enderecoPagamento . "</street>
        <number>" . $numeroPagamento . "</number>
        <complement>" . $complementoPagamento . "</complement>
        <district>" . $bairroPagamento . "</district>
        <city>" . $cidadePagamento . "</city>
        <state>" . $estadoPagamento . "</state>
        <postalCode>" . $cepPagamento . "</postalCode>
        <country>BRA</country>
    </billingAddress>
    <installment>
      <quantity>" . $parcelas . "</quantity>
      <value>" . $valorParcelas . "</value>
      <noInterestInstallmentQuantity>2</noInterestInstallmentQuantity>
    </installment>
  </creditCard>
  <items>
    <item>
      <id>" . $id . "</id>
      <description>" . $produto . "</description>
      <amount>" . $valor . "</amount>
      <quantity>1</quantity>
    </item>
  </items>
  <reference>" . $reference . "</reference>
  <shipping>
    <address>
      <street>" . $endereco . "</street>
      <number>" . $numero . "</number>
      <complement>" . $complemento . "</complement>
      <district>" . $bairro . "</district>
      <city>" . $cidade . "</city>
      <state>" . $estado . "</state>
      <country>BRA</country>
      <postalCode>" . $cep . "</postalCode>
    </address>
    <type>1</type>
    <cost>0.00</cost>
    <addressRequired>true</addressRequired>
  </shipping>
  <extraAmount>0.00</extraAmount>
  <method>creditCard</method>
  <dynamicPaymentMethodMessage>
    <creditCard>PortalUrbano</creditCard>
    <boleto>PortalUrbano</boleto>
  </dynamicPaymentMethodMessage>
</payment>";
    }

    function gerarXmlDebito($arr)
    {

        $ddd = explode(')', $arr['telefone']);
        $ddd = str_replace('(', '', $ddd[0]);
        $ddd = substr($ddd, 0, 2);
        $telefone = 999213492;

        return "<payment>
  <mode>default</mode>
    <method>eft</method>
    <bank>
        <name>" . $arr['banco'] . "</name>
    </bank>
  <currency>BRL</currency>
  <notificationURL>" . $arr['notificationURL'] . "</notificationURL>
  <receiverEmail>" . $arr['emailPagseguro'] . "</receiverEmail>
  <sender>
    <hash>" . $arr['senderHash'] . "</hash>
    <ip>" . $_SERVER['REMOTE_ADDR'] . "</ip>
    <email>" . $arr['email'] . "</email>
    <documents>
      <document>
        <type>CPF</type>
        <value>" . str_replace(array('.', '-'), array('', ''), $arr['cpf']) . "</value>
      </document>
    </documents>
    <phone>
      <areaCode>" . $ddd . "</areaCode>
      <number>" . $telefone . "</number>
    </phone>
    <name>" . $arr['nome'] . "</name>
  </sender>
  <items>
    <item>
      <id>" . $arr['id'] . "</id>
      <description>" . $arr['id_produto'] . "</description>
      <amount>" . number_format($arr['valor_compra'], 2, '.', '') . "</amount>
      <quantity>1</quantity>
    </item>
  </items>
  <reference>" . $arr['referencecode'] . "</reference>
  <shipping>
    <address>
      <street>" . $arr['endereco'] . "</street>
      <number>" . 19 . "</number>
      <complement></complement>
      <district> -</district>
      <city>" . $arr['cidade'] . "</city>
      <state>" . $arr['estado'] . "</state>
      <country>BRA</country>
      <postalCode>" . $arr['cep'] . "</postalCode>
    </address>
    <type>1</type>
    <cost>0.00</cost>
    <addressRequired>true</addressRequired>
  </shipping>
  <extraAmount>0.00</extraAmount>
  <dynamicPaymentMethodMessage>
    <creditCard>" . $arr['sitename'] . "</creditCard>
    <boleto>" . $arr['sitename'] . "</boleto>
  </dynamicPaymentMethodMessage>
</payment>";
    }




    public function gerarXmlBoleto($arr)
    {


        $ddd = substr($arr['telefone'], 0, 2);
        $telefone = substr($arr['telefone'], 2, 9);

        return "<payment>
  <mode>default</mode>
  <currency>BRL</currency>
  <notificationURL>" . $arr['notificationURL'] . "</notificationURL>
  <receiverEmail>" . $arr['emailPagseguro'] . "</receiverEmail>
  <sender>
    <hash>" . $arr['senderHash'] . "</hash>
    <ip>" . $_SERVER['REMOTE_ADDR'] . "</ip>
    <email>" . $arr['email'] . "</email>
    <documents>
      <document>
        <type>CPF</type>
        <value>" . str_replace(array('.', '-'), array('', ''), $arr['cpf']) . "</value>
      </document>
    </documents>
    <phone>
      <areaCode>" . $ddd . "</areaCode>
      <number>" . $telefone . "</number>
    </phone>
    <name>" . $arr['nome'] . "</name>
  </sender>
  <items>
    <item>
      <id>" . $arr['id'] . "</id>
      <description>" . $arr['id_produto'] . "</description>
      <amount>" . number_format($arr['valor_compra'], 2, '.', '') . "</amount>
      <quantity>1</quantity>
    </item>
  </items>
  <reference>" . $arr['referencecode'] . "</reference>
  <shipping>
    <address>
      <street>" . $arr['endereco'] . "</street>
      <number>" . 0 . "</number>
      <complement>-</complement>
      <district> -</district>
      <city>" . $arr['cidade'] . "</city>
      <state>" . $arr['estado'] . "</state>
      <country>BRA</country>
      <postalCode>" . $arr['cep'] . "</postalCode>
    </address>
    <type>1</type>
    <cost>0.00</cost>
    <addressRequired>true</addressRequired>
  </shipping>
  <extraAmount>0.00</extraAmount>
  <method>boleto</method>
  <dynamicPaymentMethodMessage>
    <creditCard>" . $arr['sitename'] . "</creditCard>
    <boleto>" . $arr['sitename'] . "</boleto>
  </dynamicPaymentMethodMessage>
</payment>";

    }


    public function retornoPagseguro()
    {



        if (isset($_GET['notificationCode'])):

            $_POST['notificationCode'] = $_GET['notificationCode'];

        endif;



        $this->db->select('SITE_NAME,PAGSEGURO_EMAIL,PAGSEGURO_TOKEN');
        $this->db->from('config');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $get = $this->db->get();

        $count = $get->num_rows();
        if ($count > 0):
            $result = $get->result_array();

            if (!empty($this->uri->segment(2))):

                $this->db->from('empresas');
                $this->db->where('id', $this->uri->segment(2));
                $this->db->order_by('id', 'desc');
                $this->db->limit(1, 0);
                $get = $this->db->get();
                $result = $get->result_array();


                $url = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/" . $_POST['notificationCode'] . "?email=" . $result[0]['email_pagseguro'] . "&token=" . $result[0]['token_pagseguro'];

            else:
                $url = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/" . $_POST['notificationCode'] . "?email=" . $result[0]['PAGSEGURO_EMAIL'] . "&token=" . $result[0]['PAGSEGURO_TOKEN'];
            endif;



            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $transaction = curl_exec($curl);
            curl_close($curl);
            if ($transaction and $transaction != 'Unauthorized') {
                $xml = simplexml_load_string($transaction);
                if (isset($xml->reference) and !empty($xml->reference) and isset($xml->status) and !empty($xml->status)):

                    if (isset($xml->paymentLink)):
                        $dp['link_payment'] = $xml->paymentLink;
                        $this->db->where('referencecode', $xml->reference);
                        $this->db->update('pedidos', $dp);
                    endif;


                    if ($xml->status == 3 or $xml->status == 7):
                        $da['pago'] = 1;
                        $this->db->where('referencecode', $xml->reference);
                        $this->db->update('pedidos', $da);


                        $this->db->from('pedidos');
                        $this->db->where('referencecode', $xml->reference);
                        $this->db->order_by('id','desc');
                        $this->db->limit(1,0);
                        $get = $this->db->get();
                        $pedidos = $get->result_array();






                        $this->db->from('usuarios');
                        $this->db->where('id', $pedidos[0]['usuarios']);
                        $this->db->order_by('id','desc');
                        $this->db->limit(1,0);
                        $get = $this->db->get();
                        $usuarios = $get->result_array();


                        $this->db->from('produtos');
                        $this->db->where('id', $pedidos[0]['produtos']);
                        $this->db->order_by('id','desc');
                        $this->db->limit(1,0);
                        $get = $this->db->get();
                        $produtos = $get->result_array();



                        $this->db->from('config');
                        $this->db->order_by('id','desc');
                        $this->db->limit(1,0);
                        $get = $this->db->get();
                        $cog = $get->result_array();


                        $arr['valor'] = $pedidos[0]['valor_pago'];
                        $arr['idpedido'] = $pedidos[0]['id'];
                        $arr['usuarioNome'] = $usuarios[0]['nome'];
                        $arr['produtoNome'] = $produtos[0]['nome'];
                        $arr['nomepedido'] = $produtos[0]['nome'];
                        $corpo_email = $cog[0]['EMAIL_PAGO'];
                        $corpo_email = $this->Funcoes_Model->filtro_email(3,$corpo_email,$arr);


                        $array['corpo'] =  $corpo_email;
                        $array['para'] =   $usuarios[0]['email'];
                        $array['npara'] =  $usuarios[0]['nome'];
                        $array['assunto'] =  'Pagamento Aprovado - PortalUrbano';





                        //Remover um ticket - INICIO


                        $this->db->from('produtos');
                        $this->db->where('id', $pedidos[0]['produtos']);
                        $get = $this->db->get();
                        $valor = $get->result_array();

                        $descontar = $valor[0]['quantidade'] - 1;

                        $dps['quantidade'] = $descontar;
                        $this->db->where('id', $pedidos[0]['produtos']);
                        $this->db->update('produtos',$dps);

                        //Remover um ticket - FIM




                        $this->db->from('config');
                        $this->db->order_by('id','desc');
                        $this->db->limit(1,0);
                        $get = $this->db->get();
                        $cog = $get->result_array();


                        $arr['valor'] = $pedidos[0]['valor_pago'];
                        $arr['idpedido'] = $pedidos[0]['id'];
                        $arr['usuarioNome'] = $usuarios[0]['nome'];
                        $arr['produtoNome'] = $produtos[0]['nome'];
                        $arr['nomepedido'] = $produtos[0]['nome'];
                        $corpo_email = $cog[0]['EMAIL_PAGO'];
                        $corpo_email = $this->Funcoes_Model->filtro_email(3,$corpo_email,$arr);


                        $array['corpo'] =  $corpo_email;
                        $array['para'] =   $usuarios[0]['email'];
                        $array['npara'] =  $usuarios[0]['nome'];
                        $array['assunto'] =  'Pagamento Aprovado - Portal Urbano';
/*
                        if($this->Funcoes_Model->sendMail($array)):
                            echo 11;
                        else:
                            echo 'Erro ao enviar email!';
                        endif;


  */                      echo 11;

                    else:

                        echo 'Usuario não encontrado!';
                    endif;

                else:
                    echo 'Preencha corretamente!';
                endif;



            } else {
                echo 'Erro ao Obter Dados';
            }


        else:

            redirect(base_url('minha-conta'));

        endif;
    }

    public function interesseEnviar(){

        if(!isset($_SESSION['ID'])):

            echo 'Você deve realizar login';
        else:


            $array['corpo'] =  '<h1>Interesse no seu Produto</h1>
<h3>Olá, vendedor </h3>
<p>Um cliente demosntrou interesse em sua oferta. Você pode entrar em contato com ele pelo seu e-mail: <br><b>'.$_SESSION['EMAIL'].'</b></p>

';
            $array['para'] =  $_POST['empresa'];
            $array['npara'] =  $_POST['empresa'];
            $array['assunto'] =  'Interesse em Produto - PortalUrbano';

            if($this->Funcoes_Model->sendMail($array)):
                echo 11;
            else:
                echo 'Erro ao enviar email!';
            endif;
        endif;

    }

}
