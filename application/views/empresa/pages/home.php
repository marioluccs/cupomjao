<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">


        <h4 class="page-title">Resumo</h4>
    </div>
</div>


<div class="row">

  <?php
  $this->db->from('pedidos');
  $this->db->where('empresas',$_SESSION['ID_EMPRESA']);
  $this->db->limit(4,0);
  $this->db->order_by('id','desc');
  $get = $this->db->get();
  foreach ($get->result_array() as $value){

      $this->db->from('produtos');
      $this->db->where('id',$value['produtos']);
      $get = $this->db->get();
      $produto = $get->result_array();

      $this->db->from('usuarios');
      $this->db->where('id',$value['usuarios']);
      $get = $this->db->get();
      $usuarios = $get->result_array();

      ?>
    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-user">
            <div>
                <img style="width: 70px; height: 70px;border-radius: 50%;" onerror="this.src='<?php echo base_url('web/imagens/default.png');?>';" src="<?php echo empty($produto[0]['image']) ? base_url('web/imagens/default.png') : base_url('web/imagens/'.$produto[0]['image']);?>" class="img-responsive img-circle"
                     alt="user">
                <div class="wid-u-info">
                    <h4 class="m-t-0 m-b-5"><?php echo $produto[0]['nome'];?></h4>
                    <p class="text-muted m-b-5 font-13"><?php echo empty($usuarios[0]['email']) ? $usuarios[0]['nome'] : $usuarios[0]['email'];?></p>
                    <small class="text-custom"><b><?php
                            if(empty($value['link_payment']) and $value['utilizado'] == 1):
                                echo '<span class="text-success">Utilizado</span>';

                                elseif(!empty($value['link_payment']) and $value['utilizado'] == 0 and $value['pago'] == 1):
                                    echo '<span class="text-success">Pago</span>';

                            elseif(!empty($value['link_payment']) and $value['utilizado'] == 1 and $value['pago'] == 1):
                                echo '<span class="text-success">Pago e Utilizado</span>';
                                else:
                                echo 'Aguardando P/U';
                                endif;
                            ?></b></small>
                </div>
            </div>
        </div>
    </div><!-- end col -->

  <?php } ?>

</div>
<!-- end row -->


<div class="row">

    <div class="col-lg-12">
        <div class="card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                   aria-expanded="false">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <h4 class="header-title m-t-0 m-b-30">Ultimas Compras</h4>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Oferta</th>
                        <th>Usuario</th>
                        <th>Data da Compra</th>
                        <th>Pago</th>
                        <th>Utilizado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->db->from('pedidos');
                    $this->db->where('empresas',$_SESSION['ID_EMPRESA']);
                    $this->db->where('tipo_pedido',1);
                    $this->db->limit(4,0);
                    $this->db->order_by('id','desc');
                    $get = $this->db->get();

                    if($get->num_rows() > 0):
                    foreach ($get->result_array() as $value){

                    $this->db->from('produtos');
                    $this->db->where('id',$value['produtos']);
                    $get = $this->db->get();
                    $produto = $get->result_array();

                    $this->db->from('usuarios');
                    $this->db->where('id',$value['usuarios']);
                    $get = $this->db->get();
                    $usuarios = $get->result_array();

                    ?>
                    <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $produto[0]['nome']?></td>
                        <td><?php echo empty($usuarios[0]['email']) ? $usuarios[0]['nome'] : $usuarios[0]['email'] ;?></td>
                        <td><?php echo $value['data_pedido'];?></td>
                        <td><?php echo ($value['pago'] == 1) ? '<span class="label label-success">Pago</span>' :  '<span class="label label-info">Aguardando Pagamento</span>';?></td>
                        <td><?php echo ($value['utilizado'] == 1) ? '<span class="label label-success">Sim</span>' :  '<span class="label label-danger">Não</span>';?></td>
                    </tr>
                   <?php } else: ?>
                    <tr>
                        <td>-- --</td>
                        <td>-- --</td>
                        <td>-- --</td>
                        <td>-- --</td>
                        <td>-- --</td>
                        <td>-- --</td>
                    </tr>

                    <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end col -->

</div>
<!-- end row -->