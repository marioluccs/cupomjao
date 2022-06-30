<?php $this->load->view('site/fixed_files/header'); ?>
<?php
$this->db->from('banners');
$this->db->where('status', 1);
$this->db->where('posicao', 1);
$this->db->order_by('rand()');
$get = $this->db->get();
if ($get->num_rows() > 0):
    ?>
    <!-- Swiper slider-->
    <div class="swiper-container swiper-coverflow">
        <div class="swiper-wrapper">

            <?php
            $result = $get->result_array();

            foreach ($result as $value) {

                ?>
                <div class="swiper-slide" data-swiper-autoplay="5000"
                     style="background-image: url(<?php echo base_url('web/imagens/') ?><?php echo $value['image']; ?>)" >
                    <div>
                        <a <?php if(empty($value['textButton']) and empty($value['linkButton'])): echo 'style="display:none;"'; endif;?> href="<?php echo $value['linkButton']; ?>" target="_blank"
                                                                                                                                         class="btn btn-default btn-md semi-circle"><?php echo empty($value['textButton']) ? 'Ver Mais' : $value['textButton']; ?></a>
                    </div>
                </div><!-- end swiper-slider -->

            <?php } ?>
        </div><!-- end swiper wrapper -->
        <!-- Pagination -->
        <div class="swiper-pagination swiper-pagination-h"></div>
        <!-- Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div><!-- end swiper-container -->

<?php endif; ?>

<!-- start section -->
<section class="section white-backgorund" style="margin-top:-50px;">
    <div class="container">
                    <div class="title-wrap">
                        <h3 class="title lines">Categorias</h3>
                        <ul class=" list-inline pull-left hidden-sm hidden-xs " aria-labelledby="dropdownMenu1" style="background-color: transparent!important; ">
                    <ul class="w-150" style="list-style: none; display: flex; padding: 0px;">
                        <?php
                        $this->db->from('categorias');
                        $this->db->where('status',1);
                        $this->db->where('id!=',17);
                        $get = $this->db->get();
                        $count = $get->num_rows();

                        if($count > 0):

                            $result = $get->result_array();

                        foreach ($result as $value){
                        ?>
                        <div class="area" style="text-align: center; width: 15%;">
                        <li class="sobreposto" style="font-size:11pt; float:left; padding: 10%;">
                            <a href="<?php echo base_url('categoria/'.$value['id'])?>"> <img src="<?php echo base_url('web/imagens/'.$value['image'])?>" class="rounded-circle" style="width: 80%; border-radius: 50%; height: 80px;" alt="";><br></a>
                            <h2 style="font-size: 18px; color: black; margin-top: 10%;"><?php echo $value['nome'];?></h2>
                        </li>
                        </div>
                        <?php } endif;?>
                    </ul>
                    <ul class="list-inline pull-left hidden-sm hidden-xs">
                <ul class="topBarNav pull-right col-6">
                </ul>
                        
                    </div>
        <?php if(!isset($_GET['keyword'])):?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-wrap">
                        <h3 class="title lines"><?php echo $pageAtual;?></h3>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        <?php else:?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-wrap">
                        <h5 class="title lines">Resultados de: <small><?php echo $_GET['keyword'];?></small></h5>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

        <?php endif;?>

            <div class="row" style="padding-bottom:50px;display: none;">
                <div class="col-sm-12">
                    <div class="col-sm-3 center"><figure><a href="http://hipercomercialmonlevade.com.br/nossas-ofertas/" target="_blank"><img src="../web/imagens/bandeira_hiper.png" width="100%" border="0" /></a></figure></div>
                    <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_bretas.png" width="100%" border="0" /></a></figure></div>
                    <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_fraga.png" width="100%" border="0" /></a></figure></div>
                    <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_epa.png" width="100%" border="0" /></a></figure></div>
                </div><!-- end col -->
            </div><!-- end row -->

        
        <?php
        $this->db->from('produtos');
        if(!isset($categoria) and !isset($_GET['keyword'])):
            $this->db->where('destaque',1);
        endif;
        $this->db->where('valido >', date('m/d/Y'));
        $this->db->where('quantidade >', 0);
        if(isset($categoria) and !empty($categoria)):
            $this->db->where('categorias', $categoria);
        endif;

        if(isset($_SESSION['localidade']) and !empty($_SESSION['localidade'])):
            $this->db->where('localidade', $_SESSION['localidade']);
        endif;
        $this->db->where('status', 1);
        if(isset($_GET['keyword']) and !empty($_GET['keyword'])):
            $this->db->like('nome', $_GET['keyword']);
            $this->db->or_like('breve_descricao', $_GET['keyword']);
        endif;
        if(!isset($_GET['keyword']) and !isset($categoria)):
            $this->db->order_by('selo asc, rand()');

        else:
            $this->db->order_by('selo asc, rand()');

        endif;
        $get = $this->db->get();

        if ($get->num_rows() > 0):

            $result = $get->result_array();

            echo '<div class="row column-4">';

            foreach ($result as $value) {

                $desconts = @ceil(100 - (100/($value['valor']/ $value['desconto'])));

            ?>


                <div class="col-sm-6 col-md-3" style="margin-bottom: 30px!important;">
                    <div class="thumbnail store caixa style1">
                        <div class="header">
                            <div class="badges">
                                <h6 class="product-badge top right primary-background text-white semi-circle"
                                    style="padding:8px 12px 7px 12px; margin:-5px;"><?php echo empty($value['desconto']) ? 'Super Oferta' : $desconts . '%'; ?></h6>
                            </div>
                            <figure class="layer">
                                <a href="<?php echo base_url('oferta/'.$value['id'])?>">
                                    <img style="width: 300px;height: 200px;"
                                         src="<?php echo empty($value['image']) ? base_url('web/imagens/default.png') : base_url('web/imagens/' . $value['image']); ?>"
                                         onerror="this.src='<?php echo base_url('web/imagens/default.png'); ?>'"
                                         alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" style="width:200px;" href="<?php echo base_url('oferta/'.$value['id'])?>"><i
                                            class="glyphicon glyphicon-tags mr-5"></i> Ver Oferta</a>
                            </div>
                        </div>
                        <div class="caption espaco">
                            <h6 class="regular"><a href="<?php echo base_url('oferta/'.$value['id'])?>"><?php echo $value['nome'];?></a></h6>
                            <div style="height:60px;"><span><a href="<?php echo base_url('oferta/'.$value['id'])?>"><?php echo $value['breve_descricao'];?></a></span></div>

                            <?php if(!empty($value['valor']) and $value['valor'] > 0):?>
                                <div class="price">
                                    <?php
                                    if (!empty($value['desconto'])):
                                        $valor = $value['desconto'];
                                        ?>
                                        <small class="amount off">de R$<?php echo number_format($value['valor'],2,'.','');?></small>
                                        <span class="amount text-primary">por R$<?php echo number_format($valor,2,'.','');?></span>
                                    <?php else: ?>
                                        <span class="amount text-primary"> R$<?php echo number_format($value['valor'],2,'.','');?></span>
                                    <?php endif; ?>
                                </div>
                                <div  style="margin-left: 0px;"><hr class="linha"></div>
                            <?php endif; ?><div style="float: left; width: 100%; text-align: center; margin-left: 0px;">
                            <a href="<?php echo base_url('oferta/'.$value['id'])?>" class="btn btn-warning-outline semi-circle btn-md justify-content-center d-flex align-items-center"><i class="glyphicon glyphicon-tags mr-5"></i> Detalhes</a>
                            </div>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

            <?php }

            echo ' </div>';
        else:
            ?>
            <div ng-show="searchCtrl.offers.length == 0" class="text-center ops-message" style="">
                <h1>:(</h1>
                <h4 class="ng-binding">Ops! Não encontramos nenhuma oferta.</h4>

                <h5>Refine sua pesquisa e tente novamente.</h5> </div>
        <?php

        endif; ?>

    </div><!-- end container -->

    <div class="clearfix"></div><br>
    <?php
    $this->db->from('banners');
    $this->db->where('status', 1);
    $this->db->where('posicao', 4);
    $this->db->order_by('rand()');
    $get = $this->db->get();
    if ($get->num_rows() > 0):
        ?>
        <!-- Swiper slider-->
        <div class="swiper-container swiper-coverflow">
            <div class="swiper-wrapper">

                <?php
                $result = $get->result_array();

                foreach ($result as $value) {

                    ?>
                    <div class="swiper-slide" data-swiper-autoplay="5000"
                         style="background-image: url(<?php echo base_url('web/imagens/') ?><?php echo $value['image']; ?>)" >
                        <div>
                            <a <?php if(empty($value['textButton']) and empty($value['linkButton'])): echo 'style="display:none;"'; endif;?> href="<?php echo $value['linkButton']; ?>" target="_blank"
                                                                                                                                             class="btn btn-default btn-md semi-circle"><?php echo empty($value['textButton']) ? 'Ver Mais' : $value['textButton']; ?></a>
                        </div>
                    </div><!-- end swiper-slider -->

                <?php } ?>
            </div><!-- end swiper wrapper -->
            <!-- Pagination -->
            <div class="swiper-pagination swiper-pagination-h"></div>
            <!-- Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div><!-- end swiper-container -->

    <?php endif; ?>
    
    <?php

    if(!isset($_GET['keyword']) and !isset($categoria)):
        $this->db->from('colunasofertas');
        $this->db->where('status',1);
        $get = $this->db->get();
        $result = $get->result_array();
        foreach ($result as $item){
            ?>
            <div class="container">
                <?php if(!isset($_GET['keyword'])):?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-wrap">
                                <h3 class="title lines"><?php echo $item['nome'];?></h3>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                <?php else:?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-wrap">
                                <h5 class="title lines">Resultados de: <small><?php echo $_GET['keyword'];?></small></h5>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                <?php endif;?>

                <?php if( $pageAtual == "Supermercados"):?>
                    <div class="row" style="padding-bottom:50px;">
                        <div class="col-sm-12">
                            <div class="col-sm-3 center"><figure><a href="http://hipercomercialmonlevade.com.br/nossas-ofertas/" target="_blank"><img src="../web/imagens/bandeira_hiper.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_bretas.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_fraga.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_epa.png" width="100%" border="0" /></a></figure></div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                <?php endif;?>

                <?php if( $pageAtual == "Drugstore e Perfumarias"):?>
                    <div class="row" style="padding-bottom:50px;">
                        <div class="col-sm-12">
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_f_ns.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_f_central.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_f_barros.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_f_americana.png" width="100%" border="0" /></a></figure></div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                <?php endif;?>

                <?php if( $pageAtual == "Casa & Construção"):?>
                    <div class="row" style="padding-bottom:50px;">
                        <div class="col-sm-12">
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_dular.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_katuny.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_ideal.png" width="100%" border="0" /></a></figure></div>
                            <div class="col-sm-3 center"><figure><a href="#" target="_blank"><img src="../web/imagens/bandeira_ulete.png" width="100%" border="0" /></a></figure></div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                <?php endif;?>

                <?php
                $this->db->from('produtos');
              
                $this->db->where('valido >', date('m/d/Y'));
                $this->db->where('quantidade >', 0);
                $this->db->where('CONTAINER', $item['id']);
                $this->db->where('status', 1);
                        if(isset($_SESSION['localidade']) and !empty($_SESSION['localidade'])):
            $this->db->where('localidade', $_SESSION['localidade']);
        endif;
                $this->db->order_by('selo asc, rand()');
                $get = $this->db->get();
                if ($get->num_rows() > 0):
                    $result = $get->result_array();
                    echo '<div class="row column-4">';
                    foreach ($result as $value) {


                        $desconts = @ceil(100 - (100/($value['valor']/ $value['desconto'])));

                        ?>


                        <div class="col-sm-6 col-md-3" >
                            <div class="thumbnail store style1">
                                <div class="header">
                                    <div class="badges">
                                        <h6 class="product-badge top right primary-background text-white semi-circle"
                                            style="padding:8px 12px 7px 12px; margin:-5px;"><?php echo empty($value['desconto']) ? 'Super Oferta' : $desconts . '%'; ?></h6>
                                    </div>
                                    <figure class="layer">
                                        <a href="<?php echo base_url('oferta/'.$value['id'])?>">
                                            <img style="width: 300px;height: 200px;"
                                                 src="<?php echo empty($value['image']) ? base_url('web/imagens/default.png') : base_url('web/imagens/' . $value['image']); ?>"
                                                 onerror="this.src='<?php echo base_url('web/imagens/default.png'); ?>'"
                                                 alt="">
                                        </a>
                                    </figure>
                                    <div class="icons">
                                        <a class="icon semi-circle" style="width:200px;" href="<?php echo base_url('oferta/'.$value['id'])?>"><i
                                                    class="glyphicon glyphicon-tags mr-5"></i> Ver Oferta</a>
                                    </div>
                                </div>
                                <div class="caption espaco alinhamento">
                                    <div class="alinhamentoesquerda">
                                    <h6 class="regular"><a href="<?php echo base_url('oferta/'.$value['id'])?>"><?php echo $value['nome'];?></a></h6>
                                    <div style="height:60px;"><span><a href="<?php echo base_url('oferta/'.$value['id'])?>"><?php echo $value['breve_descricao'];?></a></span></div>

                                    <?php if(!empty($value['valor']) and $value['valor'] > 0):?>
                                        <div class="price">
                                            <?php
                                            if (!empty($value['desconto'])):
                                                $valor = $value['desconto'];
                                                ?>
                                                <small class="amount off">de R$<?php echo number_format($value['valor'],2,'.','');?></small>
                                                <span class="amount text-primary">por R$<?php echo number_format($valor,2,'.','');?></span>
                                            <?php else: ?>
                                                <span class="amount text-primary"> R$<?php echo number_format($value['valor'],2,'.','');?></span>
                                            <?php endif; ?>
                                        </div>
                                        </div>
                                        <div  style="margin-left: 0px;"><hr class="linha"></div>
                                    <?php endif; ?>
                                    <a href="<?php echo base_url('oferta/'.$value['id'])?>" class="btn btn-warning-outline semi-circle btn-md"><i class="glyphicon glyphicon-tags mr-5"></i> Detalhes</a>
                                </div><!-- end caption -->
                            </div><!-- end thumbnail -->
                        </div><!-- end col -->
                    <?php }
                    echo ' </div>';
                else:
                    ?>
                    <div ng-show="searchCtrl.offers.length == 0" class="text-center ops-message" style="">
                        <h1>:(</h1>
                        <h4 class="ng-binding">Ops! Não encontramos nenhuma oferta.</h4>

                        <h5>Refine sua pesquisa e tente novamente.</h5> </div>
                <?php

                endif; ?>

            </div><!-- end container -->

        <?php } endif; ?>
</section>
<!-- end section -->




<?php $this->load->view('site/fixed_files/footer'); ?>
