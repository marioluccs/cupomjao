<?php
$this->load->view('empresa/fixed_files/header');
$where = '';
if ($_GET['action'] == 'all'):
    $where = '';
elseif ($_GET['action'] == 'disponiveis'):
    $where = 'status,1';

elseif ($_GET['action'] == 'vencidos'):
    $where = 'status,0';
endif;



if (isset($_GET['edit']) or isset($_GET['adicionar'])):
    $array['array'] = array(
        "nome" => "Produtos",
        "cols" => "id,nome,breve_descricao,descricao,regras_de_uso,opcao,valor,desconto,opcao2,valor2,desconto2,quantidade,valido,tipoProd,cronometro,categorias,image,image2,image3,image4,image5,image6",
        "tabela" => "produtos",
        "where" => $where
    );
    $this->load->view('empresa/pages/edit', $array);

else:
    $array['array'] = array(
        "nome" => "Produtos",
        "rows" => "id,image,nome,categorias,status",
        "tabela" => "produtos",
        "where" => $where,
         "where2" => "empresas,".$_SESSION['ID_EMPRESA']

    );
    $this->load->view('empresa/pages/tabela', $array);
endif;
$this->load->view('empresa/fixed_files/footer');

?>