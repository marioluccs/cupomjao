<?php
$this->load->view('empresa/fixed_files/header');
$where = '';

$array['array'] = array(
    "nome" => "Empresa",
    "cols" => "id,nome,email,pass,image,cnpj,localidade,estado,cidade,endereco,telefone,descricao",
    "tabela" => "empresas",
    "where" => $where
);
$_GET['edit'] = $_SESSION['ID_EMPRESA'];
$_GET['tabela'] = 'empresas';
$this->load->view('empresa/pages/edit', $array);
$this->load->view('empresa/fixed_files/footer');

?>