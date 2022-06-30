<?php
$this->load->view('empresa/fixed_files/header');
$where = '';

if ($_GET['action'] == 'all'):
    $where = '';
elseif ($_GET['action'] == 'utilizados'):
    $where = 'utilizado,1';

elseif ($_GET['action'] == 'utilizados'):
    $where = 'utilizado,1';

elseif ($_GET['action'] == 'pagos'):
    $where = 'pago,1';

elseif ($_GET['action'] == 'pagos'):
    $where = 'pago,0';
endif;
if (isset($_GET['edit']) or isset($_GET['adicionar'])):

    $array['array'] = array(
        "nome" => "Pedidos",
        "cols" => "id,produtos,usuarios,valor_pago,code_gerado,tipo_pedido,pago,utilizado",
        "tabela" => "pedidos",
        "where" => $where
    );
    $this->load->view('empresa/pages/edit', $array);

else:

    $array['array'] = array(
        "nome" => "Pedidos",
        "rows" => "id,produtos,usuarios,valor_pago,code_gerado,tipo_pedido,pago,utilizado",
        "tabela" => "pedidos",
        "where" => $where,
        "where2" => "empresas,".$_SESSION['ID_EMPRESA']
    );
    $this->load->view('empresa/pages/tabela', $array);
endif;
$this->load->view('empresa/fixed_files/footer');

?>