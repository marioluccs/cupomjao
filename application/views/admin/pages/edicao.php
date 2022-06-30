<?php

    $this->db->from('menu_admin');
    $this->db->where('id',$_GET['page']);
    $get = $this->db->get();
    $resultss = $get->result_array();
    $dados = $resultss[0];
    $edit = array();

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">


            <h4 class="header-title m-t-0 m-b-30"><?php if(isset($_GET['edit'])): echo 'Editar <b>#'.$_GET['edit'].'</b>'; else: echo 'Adicionar novo'; endif;?></h4>

        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('SaveFormAdmin');?>">

            <?php  if(isset($_GET['page']) and $_GET['page'] == 8):  ?>
            <input type="hidden" name="tipo_pedido" value="1">
            <?php endif;?>

          <?php

          $add = 0;

        

            if($add == 0):
            ?>
            <button class="btn btn-primary"><i class="fa fa-check"></i> Salvar Alterações</button>
            <?php if(isset($_GET['edit']) and !empty($_GET['edit'])): ?>
            <?php
            if(!isset($_GET['editMod'])):
                ?>
                <a class="btn btn-danger" id="danger-alert" style="cursor: pointer;"><i class="fa fa-times"></i> Excluir</a>
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

            $this->db->from('menu_admin');
            $this->db->where('id',$_GET['page']);
            $get = $this->db->get();
            $resultss = $get->result_array();
            $dados = $resultss[0];
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
