<?php $this->load->view('site/fixed_files/header');
$pagess = @$this->uri->segment(2);
?>


<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <h6 class="subtitle"><?php echo $this->Funcoes_Model->mensagens($_SESSION,'minha-conta');?></h6>

                    <ul class="list list-unstyled">
                        <li>
                            <a href="<?php echo base_url('minha-conta/meus-dados');?>">Meus dados</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('minha-conta/minhas-compras');?>">Minhas Compras <span class="text-primary" style="display: none;">(3)</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('minha-conta/meus-descontos');?>">Meus Descontos</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('minha-conta/configuracoes');?>">Alterar Senha</a>
                        </li>
                    </ul>
                </div><!-- end widget -->

                <?php
                $this->db->from('produtos');
                $this->db->order_by('id','desc');
                $this->db->limit(4,0);
                $get = $this->db->get();
                $count = $get->num_rows();
                if($count > 0):

                    $result = $get->result_array();
                ?>
                <div class="widget">
                    <h6 class="subtitle">Novas Ofertas</h6>

                    <ul class="items">


                        <?php
                        foreach ($result as $key=>$value){
                            $valor =  $value['desconto']
                        ?>
                        <li>
                            <a href="<?php echo base_url('oferta/'.$value['id'])?>" class="product-image">
                                <img onerror="this.src='<?php echo base_url('web/imagens/default.png'); ?>';" src="<?php echo empty($value['image']) ? base_url('web/imagens/default.png') : base_url('web/imagens/' . $value['image']); ?>" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <p class="product-name">
                                    <a href="<?php echo base_url('oferta/'.$value['id'])?>"><?php echo $value['nome'];?></a>
                                </p>
                                <span class="price text-primary">R$ <?php echo empty($value['desconto']) ? number_format($value['valor'],2,'.','') : number_format($valor,2,'.','');?></span>
                                <div class="rate text-warning" style="display: none;">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                    </ul>

                    <hr class="spacer-10 no-border">
                    <a href="<?php echo base_url('?tags=novidades');?>" class="btn btn-default btn-block semi-circle btn-md">Ver Mais</a>
                </div>

                <?php endif;?>
            </div><!-- end col -->
            <!-- end sidebar -->
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title"><?php echo str_replace('-',' ',ucwords($pagess))?></h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5"><hr class="spacer-20 no-border">

                <div class="row">
                    <div class="col-sm-12">

                        <hr class="spacer-10 no-border">


                        <?php
                        if(($pagess) == 'meus-dados'):
                        $this->load->view('site/perfil/meus-dados');
                        elseif(($pagess) == 'minhas-compras'):
                       $this->load->view('site/perfil/minhas-compras');
                        elseif(($pagess) == 'meus-descontos'):
                       $this->load->view('site/perfil/meus-descontos');

                        elseif(($pagess) == 'configuracoes'):
                       $this->load->view('site/perfil/configuracoes');
                        else:
                       $this->load->view('site/perfil/meus-dados');

                        endif;

                        ?>

                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php $this->load->view('site/fixed_files/footer'); ?>
