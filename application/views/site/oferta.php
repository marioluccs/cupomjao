
<?php


$this->db->from('banners');
$this->db->where('status', 1);
$this->db->where('posicao', 2);
$this->db->order_by('id', 'rand');
$get = $this->db->get();
$banner1 = @$get->result_array();
$banner1_count = $get->num_rows();



$this->db->from('banners');
$this->db->where('status', 1);
$this->db->where('posicao', 3);
$this->db->order_by('id', 'rand');
$get = $this->db->get();
$banner2 = @$get->result_array();
$banner2_count = $get->num_rows();


$this->db->from('produtos');
$this->db->where('id', $this->uri->segment(2));
$this->db->where('status', 1);
$this->db->order_by('id', 'desc');
$get = $this->db->get();


if($get->num_rows() <=0):
header("Location:/".CAMINHO);
    else:
$valor = $get->result_array()[0];


        $this->db->from('empresas');
        $this->db->where('id', $valor['empresas']);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $gets = $this->db->get();
        if($gets->num_rows() <=0):
            header("Location:/".CAMINHO);
        else:
            $empresa = $gets->result_array()[0];

endif;
endif;
 ?>






    <section class="section white-backgorund">
    <div class="container">
        <div class="row">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('?keyword=')?>">Ofertas</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $valor['breve_descricao'];?></li>
                </ol>
            </nav>
            <div class="col-lg-12"><h5><?php echo $valor['breve_descricao'];?></h5><br></div>
            <div class="col-lg-12">
                <div class="row">

                    <div class="<?php if($banner1_count > 0 or $banner2_count > 0): echo 'col-sm-5'; else: echo 'col-sm-7'; endif;?>  col-xs-12 imagemcem">
                        <div id="carousel-offer" class="carousel slide carrosselresponsivo" data-ride="carousel">
                            <div id="sync1" class="owl-carousel owl-theme thumbs">


                                <?php if(!empty($valor['image'])):?>

                                 <div class="item">
                                    <img src="<?php echo base_url('web/imagens/'.$valor['image']);?>" onerror="this.src='https://www.portalurbano.com.br/assets/site/img/default-img.gif';">
                                </div>

                                <?php endif;?>

                                <?php   for($i=2;$i<6;$i++):

                                 if(!empty($valor['image'.$i])):

                                 ?>


                                <div class="item<?php echo $i;?>">
                                    <img src="<?php echo base_url('web/imagens/'.$valor['image'.$i]);?>" onerror="this.src='https://www.portalurbano.com.br/assets/site/img/default-img.gif';">
                                </div>

                                <?php endif; endfor;?>



                            </div>

                            <div id="sync2" class="owl-carousel owl-theme" sync=".thumbs" style="margin-top: 4px; ">
                                <?php if(!empty($valor['image'])):?>

                                <div onclick="carrosels('0');" class="item" style="cursor:pointer;">
                                    <img
                                            src="<?php echo base_url('web/imagens/'.$valor['image']);?>" onerror="this.src='http://www.tourniagara.com/wp-content/uploads/2014/10/default-img.gif';"
                                            style="width: 100px;height:70px;">
                                </div>
                                <?php endif;?>

                                    <?php

                                    for($i=2;$i<6;$i++):

                                    if(!empty($valor['image'.$i])):

                                    ?>

                                <div onclick="carrosels('<?php echo $i;?>');" class="item" style="cursor:pointer;">
                                    <img
                                            src="<?php echo base_url('web/imagens/'.$valor['image'.$i]);?>" onerror="this.src='http://www.tourniagara.com/wp-content/uploads/2014/10/default-img.gif';"
                                            style="width: 100px;height:70px;">
                                </div>
                                <?php endif; endfor;?>



                            </div>
                        </div>
                    </div>

                    <div class="<?php if($banner1_count > 0 or $banner2_count > 0): echo 'col-lg-3'; else: echo 'col-lg-5'; endif;?> col-xs-12">

                        <div class="thumbnail store style1 textresponsivo">
                            <div class="caption caixavendas ">
                                <div style="margin-left: 15px;">
                                    <p class="regular" style="font-weight: 400;"><?php echo $valor['opcao'];?></p>
                                    <h6 class="regular"><?php echo $valor['opcao'];?></h6>
                                </div>
                                <div style="" class="row">
                                    <div class="col-sm-4">
                                        <i class='fas fa-star' style="color: orange; font-size: 18px; "></i>
                                        <i class='fas fa-star' style="color: orange; font-size: 18px; "></i>
                                        <i class='fas fa-star' style="color: orange; font-size: 18px; "></i>
                                        <i class='fas fa-star' style="color: orange; font-size: 18px; "></i>
                                        <i class='fas fa-star' style="color: orange; font-size: 18px; "></i>
                                    </div>
                                    <div class="col-sm-2 avaliacao" style="color:orange;">4,6</div>
                                    <div class="col-sm-4 avaliacao" style="margin-left: -51px!important;">(4460 Avaliações)</div>
                                </div>
                                <div class="row d-flex">
                                    <i class='fas fa-fire col-sm-1' style="color: orange; font-size: 23px; "></i>
                                    <p class="col-sm-11" style="margin-left: -15px;">Mais de 1 Mil vendas</p>
                                </div>
                                <div class="cashback row" style="margin-left: 11px;">
                                    <span class="col-sm-6" style="background-color: #d3ace9; border-radius: 20px; color: black; padding: 5px; text-align: center; font-weight: bolder;"><i class="fas fa-comment-dollar" style="font-size: 18px; margin: 5px;"></i>3% de Desconto pelo App!</span>
                                    <a href="" class="col-sm-6" style="font-size: 15px; margin-top: 7px;">Saiba mais</a>
                                </div>
                                <?php if(!empty($valor['valor']) and $valor['valor'] > 0):?>
                                <div class="price">
                                    <?php
if (!empty($valor['desconto'])):

$valores = $valor['desconto'];

    $vlr = number_format($valores,2,'.','');

                                    ?>
                                    <div class="row">
                                        <h5 class="amount off text-gray col-sm-4" style="float: left; font-size: 20px; font-weight: 400; float: left; margin-top: 21px; margin-left: -15px;">de R$<?php echo number_format($valor['valor'],2,'.','');?></h5>
                                        <h5 class="amount text-primary col-sm-7" style="font-size: 34px; margin-left: -73px;">por R$<?php echo number_format($valores,2,'.','');?></h5>
                                    </div>
<?php else:
    $vlr = number_format($valor['valor'],2,'.','');

    ?>
    <span class="amount text-primary"> R$<?php echo number_format($valor['valor'],2,'.','');?></span>



<?php endif;?>
                                </div>
                                <?php endif;?>

                                <?php if($valor['tipoProd'] == 1 or $valor['tipoProd'] == 2):?>
                                    <div style="text-align: center; border-radius: 0px!important; margin-bottom: 10px;">
                                        <a href="javascript:comprar(1,'<?php echo $vlr;?>');" class="btn btn-warning-outline semi-circle btn-md">COMPRAR ONLINE</a>
                                    </div>
                                    
                                <?php endif;?>

                                <?php if($valor['tipoProd'] == 0  or $valor['tipoProd'] == 2):?>
                                    <div style="text-align: center; border-radius: 0px!important; margin-bottom: 10px;">
                                    <a href="javascript:pegar(1);" class="btn btn-warning-outline semi-circle btn-md">PEGAR DESCONTO</a>
                                    </div>
                                <?php endif;?>



                                <?php if($valor['tipoProd'] == 3  or $valor['tipoProd'] == 2):?>
                                    <div style="text-align: center; border-radius: 0px!important; margin-bottom: 10px;">
                                    <a href="javascript:estouinteressado('<?php echo $this->uri->segment(2);?>');" class="btn btn-warning-outline semi-circle btn-md">ESTOU INTERESSADO</a>
                                </div>
                                <?php endif;?>
                                    <div class="row">
                                        <div class="row d-flex align-items-center col-sm-12" style="justify-content: center; display: flex;">
                                            <i class='fas fa-lock col-sm-1 justify-content-end' style="font-size: 18px;"></i>
                                            <a href="" class="col-sm-5 comprasegura" style="margin-left: -15px;">Transação Segura</a>
                                        </div>
                                    </div>
                            </div><!-- end caption -->

                            <?php
if (!empty($valor['valor2']) and !empty($valor['opcao2'])):
?>
                            <div class="caption ">
                                <h6 class="regular"><?php echo $valor['opcao2'];?></h6>
                                <?php if(!empty($valor['valor2']) and $valor['valor2'] > 0):?>

                                <div class="price">
                                    <?php
                                    if (!empty($valor['desconto2'])):

                                        $valores = $valor['desconto2'];

                                        $vlr = @$valores;
                                        ?>
                                        <h5 class="amount off text-gray">de R$<?php echo number_format($valor['valor2'],2,'.','');?></h5>
                                        <h5 class="amount text-primary">por R$<?php echo @number_format($valores,2,'.','');?></h5>
                                    <?php else:
                                        $vlr = number_format($valor['valor2'],2,'.','');
                                        ?>
                                        <span class="amount text-primary"> R$<?php echo number_format($valor['valor2'],2,'.','');?></span>


                                    <?php endif;?>
                                </div>
                                <?php endif;?>

                                <?php if($valor['tipoProd'] == 1 or $valor['tipoProd'] == 2):?>
                                    <a href="javascript:comprar(2,'<?php echo $vlr;?>');" class="btn btn-warning-outline semi-circle btn-md">COMPRAR ONLINE</a>
                                <?php endif;?>

                                <?php if($valor['tipoProd'] == 0  or $valor['tipoProd'] == 2):?>
                                    <a href="javascript:pegar(2);" class="btn btn-warning-outline semi-circle btn-md">PEGAR DESCONTO</a>
                                <?php endif;?>

                                <?php if($valor['tipoProd'] == 3  or $valor['tipoProd'] == 2):?>
                                    <a href="maito:<?php echo $empresa['email'];?>" class="btn btn-warning-outline semi-circle btn-md">ESTOU INTERESSADO</a>
                                <?php endif;?>
                                </div><!-- end caption -->
<?php endif;?>
                        </div>

                        <div class="col-xs-12 tempo" style="text-align: center;"><span style="font-size:35px; color: #9337ba;;">EXPIRA EM:</span><br><b><span id="days" style="font-size:35px;">00</span> DIAS E <span id="hours" style="font-size:35px;">00</span>:<span id="minutes" style="font-size:35px;">00</span>:<span id="seconds" style="font-size:35px;">00</span></b></div>

                    </div>
                    <div class="col-xs-7 compartilheresp" style="padding-top:20px; padding-bottom:10px;">  
                        
                            <div style="border-bottom: 1px solid black; border-top: 1px solid black; padding: 10px;"><a target="_blank" href="http://facebook.com/share.php?u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
                                <span class="button" style="font-weight: bolder;">Compartilhe esta oferta:</span>
                                <i class="fab fa-facebook-f" style="color: black!important; font-size: 20px; margin-left: 5px;"></i></a>
                                <i class="fab fa-whatsapp" style="color: black!important; font-size: 20px; margin-left: 5px;"></i></a>
                        </div>
                        </div>

                    <?php if($banner1_count > 0 or $banner2_count > 0):?>
                    <div class="col-lg-4 col-xs-12">
                        <?php if($banner1_count > 0):?>
                        <div id="carousel-offer" class="carousel slide" data-ride="carousel">
                            <div id="sync4" class="owl-carousel owl-theme thumbs">

                                <?php
                                foreach ($banner1 as $value){
                                    ?>
                                    <div class="item" <?php if(!empty($value['linkButton'])): echo 'onclick="window.location.href=\''.$value['linkButton'].'\'"; style="cursor:pointer;"'; endif;?>>
                                        <img style="height: 200px!important;" src="<?php echo base_url('web/imagens/'.$value['image']);?>" onerror="this.src='http://www.tourniagara.com/wp-content/uploads/2014/10/default-img.gif';">
                                    </div>
                                <?php }?>
                            </div>
                        </div>

<br>
                <?php endif;?>

                        <?php if($banner2_count > 0):?>
                            <div id="carousel-offer" class="carousel slide" data-ride="carousel">
                                <div id="sync3" class="owl-carousel owl-theme thumbs">


                                    <?php
                                    foreach ($banner2 as $value){
                                    ?>
                                        <div class="item" <?php if(!empty($value['linkButton'])): echo 'onclick="window.location.href=\''.$value['linkButton'].'\'"; style="cursor:pointer;"'; endif;?>>
                                            <img style="height: 200px!important;" src="<?php echo base_url('web/imagens/'.$value['image']);?>" onerror="this.src='https://www.portalurbano.com.br/assets/site/img/default-img.gif';">
                                        </div>
                                    <?php }?>



                                </div>



                                </div>
                            </div>
                        <?php endif;?>

                    </div>
                    <?php endif;?>

                </div>
            </div>

            <div class="col-lg-12"></div>

            <div class="col-sm-12">

                <!-- Nav tabs -->                
                <div class="row container">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li role="presentation">
                        <h6 class="text-uppercase">Sobre a Oferta</h6>
                    </li>
                </ul><!-- nav-tabs -->
                <div class="tab-content4" style="padding-top:10px;">
                    <div role="tabpanel" class="tab-pane fade in active" id="DIV001">
                        <div class="col-lg-12"><?php echo $valor['descricao'];?></div>
                    </div>
                </div>
                </div>

                <!-- Nav tabs -->
                <div class="row container" style="padding-top:10px;">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li role="presentation">
                        <h6 class="text-uppercase">Regras de Uso</h6>
                    </li>
                </ul><!-- nav-tabs -->
                <div class="tab-content4" style="padding-top:10px;">
                    <div role="tabpanel" class="tab-pane fade in active" id="DIV001">
                        <div class="col-lg-12"><?php echo $valor['regras_de_uso'];?></div>
                    </div>
                </div>
                </div>

                <!-- Nav tabs -->
                <div class="row container" style="padding-top:10px;">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li role="presentation">
                        <h6 class="text-uppercase">Regras de Uso Geral</h6>
                    </li>
                </ul><!-- nav-tabs -->
                <div class="tab-content4" style="padding-top:10px;">
                    <div role="tabpanel" class="tab-pane fade in active" id="DIV001">
                        <div class="col-lg-12">
                        	Cada oferta tem suas regras de uso e validade. Fique atento!
                            <br><br>
                            Salvo em casos específicos em que o regulamento da seção estabelece o contrário, algumas restrições se aplicam a todas as ofertas:
                            <br><br>
                            - As ofertas não são cumulativas com outras promoções do estabelecimento.<br>
							- Observe a data de validade do seu cupom. A não utilização do cupom no prazo estabelecido implicará na perda do mesmo.<br>
							- Não é válido para taxas de serviços<br>
							- O valor total do cupom deverá ser gasto em uma única visita (não haverá troco ou crédito).<br>
							- Cupons não utilizados no prazo não tem direito a reembolso.<br>
                        </div>
                    </div>
                </div>
                </div>

                <!-- Nav tabs -->
                <div class="row container" style="padding-top:20px;">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li role="presentation">
                        <h6 class="text-uppercase">Sobre a Empresa</h6>
                    </li>
                </ul><!-- nav-tabs -->
                <div class="tab-content4" style="padding-top:5px;">
                <h6 class="regular"><?php echo $empresa['nome'];?></div>
                <div class="row">    
                    <div role="tabpanel" class="tab-pane fade in active col-sm-2" id="DIV001">
                        <div class="col-lg-12"><?php echo $empresa['descricao'];?></div>
						<div class="col-lg-12" style="top:10px;"><img src="../web/imagens/<?php echo $empresa['image'];?>" height="100" style="border-radius: 10px; margin-bottom: 20px;" /><br><b></div>
                    </div>
                    <div class="sobre col-sm-10">
                        <div class="row" style="border-bottom: 1px solid black; width: 90%;">
                            <div class="col-sm-1 d-flex justify-content-center align-items-center">
                                <i class='fas fa-map-marker-alt' style="font-size: 30px; padding-top: 30%; color: #893289;"></i>
                            </div>
                            <div class="col-sm-6">
                                <p>Endereço</p>
                                <p class="sobreprojeto">Av. Higienópolis, 2625 - Pq. Guanabara - Londrina, PR</p>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid black; margin-top: 10px; width: 90%;">
                            <div class="col-sm-1 d-flex justify-content-center align-items-center">
                                <i class='fab fa-whatsapp' style="font-size: 30px; padding-top: 30%; color: #893289;"></i>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px!important;">
                                <p>Whatsapp</p>
                                <a href="" class="sobreprojeto">(43) 3026.9471</a>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid black; margin-top: 10px; width: 90%;">
                            <div class="col-sm-1 d-flex justify-content-center align-items-center">
                                <i class='fas fa-phone-alt' style="font-size: 30px; padding-top: 30%; color: #893289;"></i>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px!important;">
                                <p>Telefone</p>
                                <a href="" class="sobreprojeto">(43) 3026.9471</a>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid black; margin-top: 10px; width: 90%;">
                            <div class="col-sm-1 d-flex justify-content-center align-items-center">
                                <i class='fab fa-instagram' style="font-size: 30px; padding-top: 30%; color: #893289;"></i>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px!important;">
                                <p>Instagram</p>
                                <a href="" class="sobreprojeto">@rossopomodorolondrina</a>
                            </div>
                        </div>
                        </div>
                </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Display the countdown timer in an element -->
<p id="demo"></p>

<?php
$dataExpired = explode('/',$valor['valido']);

$arr['01'] = 'jan';
$arr['02'] = 'feb';
$arr['03'] = 'mar';
$arr['04'] = 'apr';
$arr['05'] = 'may';
$arr['06'] = 'june';
$arr['07'] = 'july';
$arr['08'] = 'aug';
$arr['09'] = 'sept';
$arr['10'] = 'oct';
$arr['11'] = 'nov';
$arr['12'] = 'dec';
?>
<script>


   var YY = <?php echo $dataExpired[2];?>;
        var MM = <?php echo $dataExpired[1];?>;
        var DD = <?php echo $dataExpired[0];?>;
        var HH = 23;
        var MI = 59;
        var SS = 59;


    // Set the date we're counting down to


  var countDownDate = new Date(YY, MM - 1, DD, HH, MI, SS).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("seconds").innerHTML =  seconds;
        document.getElementById("days").innerHTML =  days;
        document.getElementById("hours").innerHTML =  hours;
        document.getElementById("minutes").innerHTML =  minutes;



        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("seconds").innerHTML =  '00';
            document.getElementById("days").innerHTML =  '00';
            document.getElementById("hours").innerHTML =  '00';
            document.getElementById("minutes").innerHTML =  '00';
        }
    }, 1000);
</script>

<?php $this->load->view('site/fixed_files/footer'); ?>

<script>
    function comprar(tipo,valor) {

        $.ajax({
            url: '<?php echo base_url('Ajax/comprar')?>',
            data: {id:'<?php echo $this->uri->segment(2);?>',tipo:tipo,valor:valor},
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {



                $('body').css('opacity','1');

            },
            success: function (data) {

                if(data == 11){

                    window.location.href="<?php echo base_url('checkout')?>";

                }else{


                    Command: toastr["warning"](data);

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('body').css('opacity','1');

                }



            }
        });


    }


    function pegar(tipo) {

        $.ajax({
            url: '<?php echo base_url('Ajax/pegarVoucher')?>',
            data: {id:'<?php echo $this->uri->segment(2);?>',tipo:tipo},
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {



                $('body').css('opacity','1');

            },
            success: function (data) {

                if(data > 0 ){

                    window.location.href="<?php echo base_url('comprovante/')?>"+data;

                }else{

                    Command: toastr["warning"](data);

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('body').css('opacity','1');

                }



            }
        });


    }

    function estouinteressado(id){



        $.ajax({
            url: '<?php echo base_url('Ajax/interesseEnviar')?>',
            data: {id:id,empresa:'<?php echo $empresa['email']?>'},
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {



                $('body').css('opacity','1');

            },
            success: function (data) {

                if(data == 11 ){


                    Command: toastr["success"]('Mensagem enviada com sucesso! Em breve entraremos em contato. Obrigado!');

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('body').css('opacity','1');

                }else{

                    Command: toastr["warning"](data);

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('body').css('opacity','1');

                }



            }
        });

    }

</script>


<style>
    #sync2{
        display: none;
    }
    @media (max-width: 500px) {
        #sync1{
            height: 200px!important;
        }

        #sync2{
            display: none;
        }


        #sync1 img{
            height: 200px!important;
        }
    }


</style>