<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">


            <?php
            $this->db->from('menu_admin');
            $this->db->where('id',$_GET['page']);
            $get = $this->db->get();
            $result = $get->result_array();
            $dados = $result[0];

            ?>

<h4 class="header-title m-t-0 m-b-30"><?php echo $dados['nome'];?></h4>

            <a href="<?php echo base_url('admin?page='.$_GET['page'].'&&type=1&&adicionar='.$_GET['page'].'');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Novo</a>
            <div class="clearfix"></div>
            <br>
<table id="datatable-buttons" class="table table-striped">
    <thead>
    <tr>

        <?php
        $rows = explode(',',$dados['rows']);
        foreach ($rows as $val){
        echo '<th>'.$this->Funcoes_Model->filtrosTab($val).'</th>';
        }
        ?>

    </tr>
    </thead>

    <tbody>
    <?php

    $this->db->select($dados['rows']);
    $this->db->from($dados['tabela']);
    if(!empty($dados['where'])):
    $explodewhere = explode(',',$dados['where']);
    $this->db->where($explodewhere[0],$explodewhere[1]);
    endif;
    $gets = $this->db->get();
    $results = $gets->result_array();

    foreach ($results as $value){
    ?>
    <tr onclick="window.location.href='<?php echo base_url('admin?page='.$_GET['page'].'&&type=1&&edit='.$value['id']); ?>';" style="cursor: pointer;">

      <?php
      foreach ($value as $keys=>$vals){
      ?>
        <td><?php echo $this->Funcoes_Model->filtrosRes($keys,$vals);?></td>
        <?php }?>
    </tr>
<?php  }?>
    </tbody>
</table>
</div>
</div><!-- end col -->
</div>
<!-- end row -->
