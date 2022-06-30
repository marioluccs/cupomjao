
<div class="clearfix"></div>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">


            <?php

            $dados = $array;

            ?>

            <h4 class="header-title m-t-0 m-b-30"><?php echo $dados['nome'];?></h4>

            <?php if($arrEmpresa[0]['pode_adicionar'] == 1 and $dados['tabela'] == 'produtos'):?>
            <a  href="<?php echo base_url('empresa/'.$dados['tabela'].'?action='.$_GET['action'].'&&adicionar=true');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Novo</a>
            <?php endif;?>
            <div class="clearfix"></div>
            <br>
            <table id="datatable-buttons" class="table table-striped">
                <thead>
                <tr>

                    <?php
                    $rows = explode(',',$dados['rows']);
                    foreach ($rows as $val){

                        if($dados['tabela'] == 'produtos' and $val == 'nome'):
                    echo '<th>Nome da Empresa:</th>';
                        else:
                        echo '<th>'.$this->Funcoes_Model->filtrosTab($val).'</th>';

                    endif;
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

                 if(!empty($dados['where2'])):
                    $explodewhere2 = explode(',',$dados['where2']);
                    $this->db->where($explodewhere2[0],$explodewhere2[1]);
                endif;
                $gets = $this->db->get();
                $results = $gets->result_array();

                foreach ($results as $value){
                    ?>
                    <tr onclick="window.location.href='<?php echo base_url('empresa/'.$dados['tabela'].'?action='.$_GET['action'].'&&edit='.$value['id']); ?>';" style="cursor: pointer;">

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
