<?php
$this->load->view('empresa/fixed_files/header');

if(isset($_GET['validar'])):

    $validado =  0;

    if (isset($_GET['validar']) and !empty($_GET['validar'])):

            $this->db->from('pedidos');
            $this->db->where('code_gerado', $_GET['validar']);
            $get = $this->db->get();
            $count = $get->num_rows();
            $resp = $get->result_array();

            if ($count > 0 and $resp[0]['pago'] == 0 and $_GET['tipo'] = 0 or $count > 0 and $resp[0]['pago'] == 0 and $_GET['tipo'] = 2):
                $validado = 'Esse voucher ainda não foi pago!';

            else:
                $prods = $resp[0]['produtos'];

                $dd['data_validado'] = date('d/m/Y');
                $dd['utilizado'] = 1;
                $this->db->where('code_gerado', $_GET['validar']);
                if ($this->db->update('pedidos', $dd)):

                    $dv['empresas'] = $_SESSION['ID_EMPRESA'];
                    $dv['data'] = date('d/m/Y');
                    $dv['ip'] = $_SERVER["REMOTE_ADDR"];
                    $dv['status'] = 1;
                    $this->db->insert('validados', $dv);

                        $validado =  'Voucher Validado com sucesso';

                        $this->db->from('produtos');
                        $this->db->where('id', $resp[0]['produtos']);
                        $get = $this->db->get();
                        $valor = $get->result_array();

                        $descontar = $valor[0]['quantidade'] - 1;

                        $dps['quantidade'] = $descontar;
                        $this->db->where('id', $resp[0]['produtos']);
                        $this->db->update('produtos',$dps);

                else:
                    $validado = 'Erro ao validar o voucher, verifique se ele foi pago!';
                    echo 'Erro ao validar o voucher, verifique se ele foi pago!';

                endif;

            endif;


    else:
        $validado = 'Selecione os Vouchers para validação.';
    endif;

    echo '<br><br><br>'.$validado;


    echo '<h3><a href="'.base_url('empresa').'">Voltar para inicio</a></h3>';

 else:

     $this->load->view('empresa/pages/home');



endif;


$this->load->view('empresa/fixed_files/footer');

?>