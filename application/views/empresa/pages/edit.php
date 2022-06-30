<?php

$dados = $array;

?>
<br>
<br>

<div class="row">
    <div class="col-lg-12">

        <div class="card-box">


            <h4 class="header-title m-t-0 m-b-30"><?php if(isset($_GET['edit'])): echo 'Editar <b>#'.$_GET['edit'].'</b>'; else: echo 'Adicionar novo'; endif;?></h4>
<?php if($arrEmpresa[0]['pode_editar'] == 1): ?>
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('SaveFormEmpresa');?>">
<?php else:?>
                <form method="post" enctype="multipart/form-data" action="javascript:void(0);">


                <?php endif;?>
                    <?php

                    $add = 0;

                    if($dados['tabela'] == 'produtos'):
                        $this->db->from('empresas');
                        $this->db->where('id',$_SESSION['ID_EMPRESA']);
                        $get = $this->db->get();
                        $empresa = $get->result_array();

                        $this->db->from('produtos');
                        $this->db->where('empresas',$_SESSION['ID_EMPRESA']);
                        $get = $this->db->get();
                        $produtos = $get->num_rows();

if($produtos >= $empresa[0]['maximo_ofertas'] and !isset($_GET['edit'])):
    $add = 1;
header('Location:'.base_url().'empresa/produtos?action=all');
endif;
                    endif;


                    if($add == 0):

                    if($dados['tabela'] == 'produtos'):?>
                        <div class="alert alert-info">
                            Ao alterar um produto sua oferta ficará inativa até que o administrador aprove suas alterações
                        </div>
                    <?php endif;?>
                    <?php if($arrEmpresa[0]['pode_editar'] == 1): ?>

                    <button class="btn btn-primary"><i class="fa fa-check"></i> Salvar Alterações</button>
                <?php if(isset($_GET['edit']) and !empty($_GET['edit'])): ?>
                    <?php
                    if(!isset($_GET['editMod'])):
                        ?>
                        <a class="btn btn-danger" id="danger-alert" style="cursor: pointer;display: none;"><i class="fa fa-times"></i> Excluir</a>
                    <?php endif;?>
                    <?php endif;?>

                <?php endif;?>
                <?php
                if(!isset($_GET['editMod'])):
                    ?>
                    <a onclick="history.back(0);" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
                <?php endif;?>
                <div class="clearfix"></div>
                <br>
                <?php
                endif;
                if(isset($_GET['edit']) and !empty($_GET['edit'])):
                    echo '<input type="hidden" name="edit" value="'.$_GET['edit'].'">';
                endif;
                echo '<input type="hidden" name="urlValue" value="'.$_SERVER['REQUEST_URI'].'">';


                $edit = array();
                echo '<input type="hidden" name="tabela" value="'.$dados['tabela'].'">';

                if(isset($_GET['edit'])):

                    $this->db->from($dados['tabela']);
                    $this->db->where('id',$_GET['edit']);
                    $get = $this->db->get();
                    $result = $get->result_array();
                    $dado = @$result[0];

                    $edit = $dado;

                endif;

                $keys = explode(',',$dados['cols']);

                foreach ($keys as $values) {

                    echo  $this->Funcoes_Model->campo($values, $edit,count($keys));
                }
                ?>
            </form>

        </div>
    </div><!-- end col -->
