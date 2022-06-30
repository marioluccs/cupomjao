<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Funcoes_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->reconnect();
        @session_start();
    }

    public function mensagens($arr, $mensagem)
    {
        $return = '';
        if ($mensagem == 'minha-conta'):
            $firstname = explode(' ', $arr['NAME']);
            if (date('H') >= '06' and date('H') < '12'):
                $return = 'Bom dia, ' . $firstname[0];
            elseif (date('H') >= '12' and date('H') < '16'):
                $return = 'Boa tarde, ' . $firstname[0];
            else:
                $return = 'Boa noite, ' . $firstname[0];
            endif;
        endif;

        return $return;
    }

    public function filtrosTab($arr)
    {

        if ($arr == 'id'):
            $arr = 'ID';
        endif;

        if ($arr == 'email'):
            $arr = 'E-mail';
        endif;

        if ($arr == 'status'):
            $arr = 'Ativo';
        endif;

        if ($arr == 'user'):
            $arr = 'Usuario';
        endif;

        if ($arr == 'pass'):
            $arr = 'Senha';
        endif;

        if ($arr == 'image'):
            $arr = 'Foto principal';
        endif;

        if ($arr == 'tipoProd'):
            $arr = 'Tipo do Voucher';
        endif;

        if ($arr == 'image2'):
            $arr = '02 | Imagem em Produto';
        endif;

        if ($arr == 'image3'):
            $arr = '03 | Imagem em Produto';
        endif;

        if ($arr == 'image4'):
            $arr = '04 | Imagem em Produto';
        endif;

        if ($arr == 'image5'):
            $arr = '05 | Imagem em Produto';
        endif;

        if ($arr == 'image6'):
            $arr = '06 | Imagem em Produto';
        endif;


        if ($arr == 'image7'):
            $arr = 'Banner Produto 1 ';
        endif;


        if ($arr == 'image8'):
            $arr = 'Banner Produto 2';
        endif;

        if ($arr == 'cpf'):
            $arr = 'CPF';
        endif;
        if ($arr == 'cep'):
            $arr = 'CEP';
        endif;

        if ($arr == 'descricao'):
            $arr = 'Descrição';
        endif;

        if ($arr == 'cnpj'):
            $arr = 'CNPJ';
        endif;

        if ($arr == 'CONTAINER'):
            $arr = 'Containers';
        endif;

        if ($arr == 'textButton'):
            $arr = 'Texto do Botão';
        endif;

        if ($arr == 'linkButton'):
            $arr = 'Link do Botão';
        endif;

        if ($arr == 'id_produto'):
            $arr = 'Produto';
        endif;

        if ($arr == 'id_usuario'):
            $arr = 'Comprador';
        endif;

        if ($arr == 'valor_pago'):
            $arr = 'Valor do Pedido';
        endif;

        if ($arr == 'data_pedido'):
            $arr = 'Pedido Realizado em';
        endif;


        if ($arr == 'code_gerado'):
            $arr = 'Ticket';
        endif;

        if ($arr == 'desconto'):
            $arr = 'Preço por (1)';
        endif;

        if ($arr == 'desconto2'):
            $arr = 'Preço por (2)';
        endif;


        if ($arr == 'opcao'):
            $arr = 'Primeira Opção *';
        endif;

        if ($arr == 'cronometro'):
            $arr = 'Contador Regressico';
        endif;


        if ($arr == 'valor'):
            $arr = 'Preço de * (1)';
        endif;


        if ($arr == 'opcao2'):
            $arr = 'Segunda Opção';
        endif;


        if ($arr == 'valor2'):
            $arr = 'Preço de (2)';
        endif;

        if ($arr == 'url'):
            $arr = 'URL';
        endif;

        if ($arr == 'pode_adicionar'):
            $arr = 'A Empresa pode Adicionar Ofertas';
        endif;
        if ($arr == 'pode_editar'):
            $arr = 'A Empresa pode Editar Ofertas';
        endif;
        if ($arr == 'maximo_ofertas'):
            $arr = 'Maximo de Ofertas Disponiveis';
        endif;

        if ($arr == 'valido'):
            $arr = 'Oferta válida até';
        endif;

        if ($arr == 'quantidade'):
            $arr = 'Quantidade em Estoque';
        endif;


        return str_replace('_', ' ', ucwords($arr));
    }

    public function filtrosRes($key, $val)
    {

        if ($key == 'status'):
            $val = ($val == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>';
            $val .= ($val == 1) ? '&nbsp;&nbsp;&nbsp;<i class="fa fa-star text-warning" style="font-size: 19px!important;text-align: center;"></i>' : '&nbsp;&nbsp;&nbsp;<i style="font-size: 19px!important;text-align: center;" class="fa fa-star-o text-warning"></i>';

        endif;



        if ($key == 'utilizado'):
            $val = ($val == 1) ? '<i class="fa fa-check text-success"></i> Sim' : '<i class="fa fa-times text-danger"></i> Não';
        endif;

        if ($key == 'pago'):
            $val = ($val == 1) ? '<i class="fa fa-check text-success"></i> Pago' : '<i class="fa fa-check text-info"></i> Aguardando pagamento';
        endif;

        if ($key == 'produtos'):
            $this->db->from('produtos');
            $this->db->where('id', $val);
            $get = $this->db->get();

            $val = (($get->num_rows() > 0)) ? $get->result_array()[0]['nome'] : '<i class="fa fa-times"></i> Indefinido';
        endif;

        if ($key == 'usuarios'):
            $this->db->from('usuarios');
            $this->db->where('id', $val);
            $get = $this->db->get();

            $val = (($get->num_rows() > 0)) ? $get->result_array()[0]['nome'] : '<i class="fa fa-times"></i> Indefinido';
        endif;

        if ($key == 'image'):
            $val = (empty($val)) ? '<img src="' . base_url('web/imagens/default.png') . '" style="width: 50px;height: 50px;">' : '<img src="' . base_url("web/imagens/" . $val) . '" onerror="this.src=' . base_url("'web/imagens/default.png'") . '" style="width: 50px;height: 50px;">';
        endif;


        if ($key == 'categorias'):
            $this->db->from('categorias');
            $this->db->where('id', $val);
            $get = $this->db->get();
            $val = (($get->num_rows() > 0)) ? $get->result_array()[0]['nome'] : '<i class="fa fa-times"></i> Indefinido';
        endif;


        return $val;
    }

    function campo($campo, $val, $qnt)
    {

        if (in_array($campo, $val)):
            $value = $val[$campo];
        else:
            $value = @$val[$campo];
        endif;

        if ($campo == 'id' or $campo == 'nome' or $campo == 'email' or $campo == 'user' or $campo == 'opcao' or $campo == 'empresas'):
            $required = 'required';
        elseif ($campo == 'pass' and empty($value)):
            $required = 'required';
        else:
            $required = '';

        endif;

        if ($campo == 'id'):

            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="text" name="' . $campo . '" value="' . $value . '" disabled ' . $required . '/>
</div>';


        elseif ($campo == 'maximo_ofertas' or $campo == 'quantidade'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="number" name="' . $campo . '" value="' . $value . '"  ' . $required . '/>
</div>';


        elseif ($campo == 'valor' or $campo == 'valor2' or $campo == 'desconto' or $campo == 'desconto2'):

            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control valor_mask" type="text" name="' . $campo . '" value="' . $value . '"  ' . $required . '/>
</div>';

        elseif ($campo == 'nome' or $campo == 'user'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="text" name="' . $campo . '" value="' . $value . '"  ' . $required . '/>
</div>';

        elseif ($campo == 'descricao' or $campo == 'conteudo' or $campo == 'regras_de_uso'):

            //Com Sumernote
             $campo = '<div style="margin-bottom: 10px;">
 <label>' . $this->filtrosTab($campo) . '</label>
 <textarea name="' . $campo . '" ' . $required . ' class="summernote">' . $value . '</textarea>
 </div>';



            //Sem Sumernote

        /*     $campo = '<div style="margin-bottom: 10px;">
 <label>' . $this->filtrosTab($campo) . '</label>
 <textarea style="width: 100%;" rows="10" name="' . $campo . '" ' . $required . ' >' . $value . '</textarea>
 </div>';
 */
        elseif ($campo == 'GOOGLE_ADSENSE' or $campo == 'GOOGLE_ANALITYCS' or $campo == 'EMAIL_SENHA' or $campo == 'EMAIL_CADASTRO' or $campo == 'EMAIL_PEDIDO' or $campo == 'EMAIL_PAGO'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label><br>
<textarea style="width: 100%;height: 250px;" name="' . $campo . '" ' . $required . ' >' . $value . '</textarea>
</div>';

        elseif ($campo == 'email'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="email" name="' . $campo . '" value="' . $value . '"  ' . $required . '/>
</div>';

        elseif ($campo == 'data_pedido' or $campo == 'valido'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<div class="input-group"><input name="' . $campo . '" value="' . $value . '"  ' . $required . ' type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
<span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
</div><!-- input-group -->
</div>';


        elseif ($campo == 'pass'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="password" name="' . $campo . '" autocomplete="off"  ' . $required . '/>
</div>';


        elseif ($campo == 'image' or $campo == 'promobanner' or $campo == 'LOGOMARCA' or $campo == 'image2' or $campo == 'image3' or $campo == 'image4' or $campo == 'image5' or $campo == 'image6' or $campo == 'image7' or $campo == 'image8'):
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="file" name="' . $campo . '"  ' . $required . '/>
</div>';


        elseif ($campo == 'status'):

            if (!empty($value)):

                if ($value == '1'):
                    $c1 = 'selected';
                    $c2 = '';
                else:
                    $c1 = '';
                    $c2 = 'selected';
                endif;

            else:
                $c1 = '';
                $c2 = '';
            endif;
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option  value="1" ' . $c1 . '>Ativo</option>
                                            <option  value="0" ' . $c2 . '>Desativado</option>
                                    
                                    </select>

</div>';


        elseif ($campo == 'posicao'):


            if ($value == '1'):
                $c1 = 'selected';
                $c2 = '';
                $c4 = '';
                $c3 = '';
            elseif($value == '2'):
                $c1 = '';
                $c2 = 'selected';
                $c4 = '';
                $c3 = '';
                elseif($value == '4'):
                $c1 = '';
                $c2 = '';
                $c4 = 'selected';
                $c3 = '';
            else:
                $c1 = '';
                $c2 = '';
                $c4 = '';
                $c3 = 'selected';
            endif;


            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option  value="1" ' . $c1 . '>Topo</option>
                                             <option  value="4" ' . $c4 . '>Meio Oferta</option>
                                         <!--   <option  value="2" ' . $c2 . '>Oferta 1</option>
                                            <option  value="3" ' . $c3 . '>Oferta 2</option>-->
                                    
                                    </select>

</div>';

        elseif ($campo == 'pode_adicionar' or $campo == 'pode_editar' or $campo == 'cronometro'):



            if ($value == '1'):
                $c1 = 'selected';
                $c2 = '';
            else:
                $c1 = '';
                $c2 = 'selected';
            endif;


            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option  value="0" ' . $c2 . '>Não</option>
                                            <option  value="1" ' . $c1 . '>Sim</option>

                                    
                                    </select>

</div>';


        elseif ($campo == 'selo'):


            if ($value == '1'):
                $c1 = 'selected';
                $c2 = '';
                $c3 = '';
            elseif ($value == '2'):
                $c1 = '';
                $c2 = 'selected';
                $c3 = '';
            else:
                $c1 = '';
                $c2 = '';
                $c3 = 'selected';

            endif;


            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option  value="2" ' . $c2 . '>Bronze</option>
                                            <option  value="1" ' . $c1 . '>Prata</option>
                                            <option  value="0" ' . $c3 . '>Ouro</option>
                                    
                                    </select>

</div>';

        elseif ($campo == 'utilizado'):


            if ($value == '1'):
                $c1 = 'selected';
                $c2 = '';
            else:
                $c1 = '';
                $c2 = 'selected';
            endif;

            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option  value="0" ' . $c2 . '>Não Utilizado</option>
                                             <option  value="1" ' . $c1 . '>Utilizado</option>

                                    
                                    </select>

</div>';


        elseif ($campo == 'pago' or $campo == 'status_do_pedido'):


            if ($value == '1'):
                $c1 = 'selected';
                $c2 = '';
            else:
                $c1 = '';
                $c2 = 'selected';
            endif;


            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option  value="0" ' . $c2 . '>Aguardando Pagamento</option>
                                             <option  value="1" ' . $c1 . '>Pago</option>

                                    
                                    </select>

</div>';

        elseif ($campo == 'tipoProd'):

            if ($value == 1):
                $c1 = 'selected';
                $c2 = '';
                $c3 = '';
                $c4 = '';


            elseif ($value == 2):
                $c1 = '';
                $c2 = '';
                $c3 = 'selected';
                $c4 = '';


            elseif ($value == 3):
                $c1 = '';
                $c2 = '';
                $c3 = '';
                $c4 = 'selected';
            else:
                $c1 = '';
                $c2 = 'selected';
                $c3 = '';
                $c4 = '';

            endif;

            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">
                                            <option ' . $c1 . ' value="1">Voucher de Compra</option>
                                            <option ' . $c2 . ' value="0">Voucher de Desconto</option>
                                            <option ' . $c4 . ' value="3">Tenho Interesse</option>
                                          

                                    
                                    </select>

</div>';
        // <option ' . $c3 . ' value="2">Voucher de Compra/Desconto/Tenho Interesse</option>

        elseif ($campo == 'categorias' or $campo == 'localidade' or $campo == 'CONTAINER' or $campo == 'empresas' or $campo == 'id_usuario' or $campo == 'id_produto' or $campo == 'usuarios' or $campo == 'id_produto'):
            if ($campo == 'id_usuario'):
                $campo = 'usuarios';
            endif;

            if ($campo == 'CONTAINER'):
                $campo = 'colunasofertas';
            endif;
            if ($campo == 'id_produto'):
                $campo = 'produtos';
            endif;
            $option = '';
            $this->db->from($campo);
            $get = $this->db->get();
            if ($get->num_rows() > 0):
                foreach ($get->result_array() as $values) {
                    if ($campo == 'usuarios'):
                        $values['nome'] = $values['email'];
                    endif;

                    if ($campo == 'produtos'):
                        $values['nome'] = '<b>#' . $values['id'] . '</b> - ' . $values['nome'];
                    endif;
                    if ($value == $values['id']):
                        $option .= '<option value="' . $values['id'] . '" selected>' . $values['nome'] . '</option>';
                    else:
                        $option .= '<option value="' . $values['id'] . '">' . $values['nome'] . '</option>';
                    endif;
                }
            endif;
            if ($campo == 'colunasofertas'):
                $campo = 'CONTAINER';
            endif;
            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
 <select class="form-control select2" name="' . $campo . '">' . $option . '</select>
</div>';
        else:

            $campo = '<div style="margin-bottom: 10px;">
<label>' . $this->filtrosTab($campo) . '</label>
<input class="form-control" type="text" name="' . $campo . '" value="' . $value . '"  ' . $required . '/>
</div>';


        endif;
        return $campo;
    }


    public function filtro_email($tipo, $body, $arr)
    {

        if ($tipo == 1):


            $body = str_replace(array(
                '[Product Name]',
                '[Company Name, LLC]',
                '[Y]',
                '{{support_url}}',
                '{{name}}',
                '{{action_url}}'

            ), array(
                'Fisgar Ofertas',
                'Fisgar Ofertas',
                date('Y'),
                base_url('contato'),
                $arr['nome'],
                base_url('login?redefinirToken=' . $arr['tokenRedefina'])

            ), $body);


        endif;
        if ($tipo == 2):
            $body = str_replace(array(
                '[Product Name]',
                '{{name}}',
                '{{invite_sender_name}}',
                '{{invite_sender_organization_name}}',
                '{{site_name}}',
                '{{action_url}}'
            ), array(
                'PortalUrbano',
                $_SESSION['NAME'],
                $arr['empresa'],
                'PortalUrbano',
                'PortalUrbano',
                base_url('comprovante/' . $arr['pedidos'])
            ), $body);
        endif;
        if ($tipo == 3):

            $body = str_replace(array(
                '[Product Name]',
                '{{name}}',
                '{{total}}',
                '{{due_date}}',
                '{{invoice_id}}',
                '{{#each invoice_details}}',
                '{{/each}}',
                '{{description}}',
                '{{amount}}',
                '{{action_url}}'
            ), array(
                'PortalUrbano',
                $arr['usuarioNome'],
                $arr['valor'],
                date('d/m/Y H:i:s'),
                $arr['idpedido'],
                $arr['nomepedido'],
                $arr['idpedido'],
                '',
                $arr['valor'],
                base_url('comprovante/' . $arr['idpedido'])
            ), $body);
        endif;
        return $body;


    }

    public function sendMail($arr)
    {


        @include 'application/models/PHPMailer/class.phpmailer.php';
        @include 'application/models/PHPMailer/class.smtp.php';

        if (isset($arr['para']) and isset($arr['npara']) and isset($arr['assunto']) and isset($arr['corpo'])):


            $mail = new PHPMailer;
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP();

            $template = 0;

            $this->db->from('config');
            $this->db->order_by('id', 'desc');
            $this->db->limit(1, 0);
            $get = $this->db->get();

            $count = $get->num_rows();

            if ($count > 0):
                $result = $get->result_array();



                try {
                    $mail->Host = $result[0]['SMTP'];
                    $mail->SMTPAuth = true;
                    $mail->Port = 587;
                    $mail->Username = $result[0]['SMTP_USER'];
                    $mail->Password = $result[0]['SMTP_PASS'];

                    $mail->SetFrom($result[0]['EMAIL_SITE']);
                    $mail->AddReplyTo($result[0]['EMAIL_SITE']);
                    $mail->Subject = $arr['para'];
                    $mail->AddAddress($arr['para'],$arr['assunto']);
                    $mail->MsgHTML($arr['corpo']);

                    if ($mail->Send()):
                        return 11;
                    else:
                        return 'Erro ao enviar o e-mail!';

                    endif;

                } catch (phpmailerException $e) {
                    return 'Erro ao enviar o e-mail!';
                }


            endif;
        else:
            return 0;
        endif;

    }
}