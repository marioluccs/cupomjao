<!DOCTYPE html>
<html lang="pt">
<head>
    <?php
    $this->db->select('EMAIL_SITE,META_TITLE,META_DESCRIPTION,META_AUTOR,META_KEYWORDS,ICON');
    $this->db->from('config');
    $this->db->where('id', 1);
    $get = $this->db->get();
    $result = $get->result_array();
    ?>
    <title><?php echo $result[0]['META_TITLE']?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $result[0]['META_DESCRIPTION']?>">
    <meta name="author" content="<?php echo $result[0]['META_AUTOR']?>" />
    <meta name="keywords" content="<?php echo $result[0]['META_KEYWORDS']?>" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo $result[0]['ICON']?>" type="image/x-icon">
    <link rel="icon" href="<?php echo $result[0]['ICON']?>" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/swiper.css" />
    <link href="<?php echo base_url('assets/admin/')?>plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="<?php echo base_url('assets/site/')?>css/skin-orange.css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <style>
        #sync1 img{
            height: 450px!important;
        }
        .text-primary{
            color:<?php echo COR1;?>!important;
        }
        .btn.btn-warning-outline:hover{
            color: white!important;
            background-color:  <?php echo COR1;?>!important;
            border: 1px solid <?php echo COR1;?>!important;
        }

        .topBar ul.topBarNav li ul{
            background: <?php echo COR1;?>!important;
        }
        .btn.btn-warning-outline{
            color: <?php echo COR1;?>!important;
            background-color: transparent;
            border: 1px solid <?php echo COR1;?>!important;
        }
        .owl-carousel.owl-theme .owl-dots .owl-dot.active span{
            background-color:  <?php echo COR1;?>!important;
        }
        
        .btn-default{
            background: <?php echo COR2;?>!important;
            border-color: <?php echo COR2;?>!important;

        }

        /*modificacoes*/
        .thumbnail.store .caption {
    height: 230px;}
    .linha {
    border-style: dotted;
}

.thumbnail a>img, .thumbnail>img {
    height: 200px!important;
    border-radius: 20px 20px 0px 0px!important;
    border: 1px solid black!important;
}

.thumbnail.store.style1 .header {
  border: none!important;
}

.layer img{
  border: 1px solid black!important;
    border-radius: 0px 0px 20px 20px;
}

/*.swiper-container .swiper-slide {
  max-width: 1100px!important;
}*/
.thumbnail.store .caption {
    padding: 5px 0;
    color: #878c94;
    border: 1px solid black;
    border-radius: 0px 0px 20px 20px;}

.regular {
    margin-left: 10px;
    font-weight: bold;
}

.caption div {
    margin-left: 10px;
}

.title-wrap .title.lines {
    display: inline-block!important;
    position: relative!important;
    text-align: left!important;
    padding: 0px;
    justify-items: start!important;
}

.title-wrap {
    margin-bottom: 40px;
    text-align: left;
    overflow: hidden;
}

.title-wrap h3 {
    font-size: 20px;
}

.title-wrap .title.lines:before, .title-wrap .title.lines:after {
    background-color: transparent;
}

.thumbnail.store .caption .price {
    text-align: center;
}

.thumbnail.store .caption .price .amount {
    font-weight: bolder;
}

.form-control.input-lg {
    border-radius: 5px 0px 0px 5px!important;
}

.input-group-addon:last-child {
    border-radius: 0px 5px 5px 0px;
}

.form-control.input-lg {
    height: 40px;
}

.yamm .navbar-brand {
    float: right;
}

.navbar-brand>img {
    margin-top: -5px;
}

.col-xs-12 {
    justify-content: center;
    padding-top: 5px;
    align-items: center;
}

.title-wrap {
    margin-bottom: 20px;
}

.yamm .navbar-nav > li > a {
    color: white;
}

.w-150 a {
    color: white;
}
.topBar {
    background-color: black!important;
}
.swiper-container {
    width: 60%;
    border-radius: 20px;
    margin-top: 20px;
}

.alt-list li {
padding-left: 0px!important;
color: white;
margin-bottom: 0px!important;
}
.list {
    padding-left: 0px!important;
}
.footer .title {
    font-size: 20px!important;
    font-weight: 400;
}

.footer .formas-de-pagamento {
    font-size: 15px!important;
    padding-bottom: 20px;
    padding-top: 20px;
}

.whats {
    width: 150%!important;
}
.rodape {
    width: 100%;
}

.baixarapp img{
    width: 35%!important;
}

.redessociais i {
    color: white;
    font-size: 30px;
    border-radius: 50px;
    padding: 10px;
}
.text-sm {
    float: right;
    text-align: justify;
    font-size: 10px;
    width: 102%;
}
.p {
    margin: 0 0 0px!important;
}
.fa-facebook-square:before {
    padding: 10px;
    background-color: black;
    border-radius: 50px;
    font-size: 21px;
}
.regular {
    margin-left: 0px;
}
.caption div {
    margin-left: 0px;
    margin-top: 5px;
}

.avaliacao {
    margin-left: -35px!important;
}
.thumbnail.store .caption {
    border-radius: 5px;
    border: 1px solid #6c56a726!important;
}
.btn.btn-warning-outline {
    border-radius: 5px;
    width: 92%;
}

div .caption {
    height: 150%!important;
    margin-bottom: 10px;
}

.comprasegura:hover {
    text-decoration: underline;
    cursor: pointer;
}

.tempo {
    font-size: 30px;
}

.tempo span {
    color: #35404f;
}

.tempo {
    color: #35404f;
}

.sobreprojeto {
    font-weight: 400;
}
.caixa {
  height: 200px!important;
  
}

.espaco {
    padding: 10px!important;
}

.alinhamento {
    float: left;
    width: 100%;
    text-align: center;
    margin-left: 0px;
}

.alinhamentoesquerda {
    text-align: left;
}
.navbar-brand>img {
    object-fit: cover;
    width: 85px;
    margin-top: -25px!important;
}
.primary-background {
    background-color: #237CA0!important;
}

.yamm .dropdown-menu {
    left: 5%;
    border-radius: 10px;
    padding: 10px;
    
}

.sobreposto:hover {
    border: .5px solid white;
    background-color: #237CA0;
    border-radius: 10px;
    cursor: pointer;
}
.sobreposto {
    padding-bottom: 10px!important;
}

.categoriasitem {
    margin-left: 20%;
    padding-top: 30px;
    height: 52%;
    width: 100%;
    display: block;
}

.categoriasitem li{
    margin-top: -20px;
}
.dropdown-toggle:hover > .dropdown-menu {
    display: flex;
}

.categoriasitem li a:hover {
  color: #0072b1!important;
}
li::marker {
    display: none;
}

.divesconder{
    display: none;
}

@media screen and (min-width: 1441px) {
    .swiper-container {
    margin-top: 40px;
}

}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .logoimagelink {
        justify-content: center!important;
        align-items: center!important;
        display: flex!important;
        padding-top: 20%!important;
        
    }
    .logoimagelink img {
        margin-left: 18%!important;
    }
    .logoimage {
        width: 25%!important;
    }
    .section {
    padding: 10px 0!important;
}
.categorias {
    display: none;
}
.caixa {
    width: 50%;
    height: 178px!important;
}
.secaoresp{
    display: flex;
    justify-content: center;
    width: 100%;
    margin-bottom: 250px!important;
}
.baixarapp img {
    width: 20%!important;
}
.resplogosite {
    display: flex;
    justify-content: end;
    align-items: end;
}
.text-sm {
    margin-top: 6%!important;
    padding: 0px 20px!important;
}
.pagseguro {
    width: 40%!important;
}
.conexaosegura {
    width: 30%!important;
}
.sobreposto h2{
    font-size: 10px!important;
}
.sobreposto img {
    height: 40px!important;
    width: 40px!important;
}
.bannermargin {
    margin-bottom: 37px;
}
.logoimage{
    object-fit: cover;
    width: 20%!important;
    text-align: center;
    justify-content: center;
    align-items: center;
    display: flex;
    margin-left: 76%;
    position: fixed;
    /* float: left; */
    height: 100px;
    margin-left: 27px;
    margin-right: 100px;
    padding-left: -100px;
}
.logoimagelink{
    margin-left: 32%;
}
.yamm .navbar-brand {
    float: left;
}
.divletras {
    display: none!important;
}
.whats {
    width: 100%!important;
}
.breadcrumb{
    margin-top: 30px;
}
.caixavendas{
    margin-top: -36px;
} 
.compartilheresp{
    display: flex;
    justify-content: center;
    width: 100%;
}
.thumbnail.store .caption .price .amount.off {
    margin-top: 21px!important;
    margin-bottom: 51px!important;
}
.sobre i {
padding-top: 0%!important;
margin-bottom: 0%!important;
}
.sobre .col-sm-1 {
margin-bottom: 0%!important;
}
.espaco {
    height: 260px!important;
    margin-bottom: 250px;
}
.price small {
    margin-left: 0px!important;
}
.secaoresp{
    margin-bottom: 149px!important;
    height: 327px!important;
}
.textoh5 {
    margin-left: 19px!important;
}
.fa-shopping-cart:before {
    content: "\f07a";
    position: fixed;
    height: 200%;
    width: 200px;
    font-size: 30px;
    float: right;
    margin-left: 60%;
    margin-top: 640px;
    color: #68CFFA;
}
.entrecadastrar{
    padding-left: 8px;
}
.explorarcategorias{
    width: 100%;
    justify-content: center;
    display: flex;
    margin-left: 210px;
    margin-right: -70px;
}
.parceirosbutton {
    margin-left: -65px;
}
}
@media only screen and (min-width: 300px) and (max-width: 423px) {
    .secaoresp {
    width: 150%;
    margin-left: -22%;
}
.sobreposto h2{
    font-size: 7px!important;
}
.sobreposto img {
    height: 30px!important;
    width: 30px!important;
}
.navbar-brand>img {
    margin-top: -13px!important;
}
.whats {
    width: 100%!important;
}
.fa-shopping-cart:before {
    content: "\f07a";
    position: fixed;
    height: 200%;
    width: 200px;
    font-size: 30px;
    float: right;
    margin-left: 40%;
    margin-top: 663px;
    color: #68CFFA;
}
.entrecadastrar{
    padding-left: 8px;
}
.explorarcategorias{
    width: 100%;
    justify-content: center;
    display: grid!important;
    margin-left: 177px!important;
    margin-top: -9px!important;
}

.categoriasesconder {
    margin-bottom: -10px!important;
}

.categoriasesconder {
    margin-left: -65px!important;
}

}
@media only screen and (min-width: 424px) and (max-width: 500px) {
    .secaoresp {
    width: 127%;
    margin-left: -15%;
}
.sobreposto h2{
    font-size: 8px!important;
}
.sobreposto img {
    height: 30px!important;
    width: 30px!important;
}

.navbar-brand>img {
    margin-top: -23px!important;
}
.divletras {
    display: none!important;
}
.whats {
    width: 100%!important;
}
.fa-shopping-cart:before {
    content: "\f07a";
    position: fixed;
    height: 200%;
    width: 200px;
    font-size: 30px;
    float: right;
    margin-left: 50%!important;
    margin-top: 663px;
    color: #68CFFA;
}
.entrecadastrar{
    padding-left: 8px;
}
.explorarcategorias{
    width: 100%;
    justify-content: center;
    display: flex;
    margin-left: 170px;
}
.linkdown  {
    margin-left: -27px;
}

.categoriasesconder {
    margin-left: -62px;
}
}
/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) and (max-width: 767px) {
    .logoimage {
       position: absolute;
    }
    .imageresp {
        float: left;
        margin-left: 75px;
        margin-top: 29px;
    }
    .imageresp img{
        object-fit: cover;
        width: 85%!important;
        text-align: center;
        justify-content: center;
        align-items: center;
        display: flex;
        margin-left: 0px!important;
        float: left;
    }
    .divlogo {
        width: 104%!important;
    text-align: center;
    align-content: center;
    justify-content: center;
    display: flex;
    }
    .section {
    padding: 0px 0!important;
}
.categorias {
    display: none;
}
.yamm .navbar-toggle {
    position: fixed;
    margin-left: 35%;
    margin-top: 0%;
}
.baixarapp img {
    width: 20%!important;
}
.resplogosite {
    display: flex;
    justify-content: end;
    align-items: end;
}
.text-sm {
    margin-top: 6%!important;
    padding: 0px 20px!important;
}
.pagseguro {
    width: 40%!important;
}
.conexaosegura {
    width: 30%!important;
}
.secaoresp {
    width: 100%;
    margin-left: 0%;
    display: flex;
    margin-bottom: 1000px;
    justify-content: center;
}
.product-badge {
    right: 13px!important;
}
.thumbnail.store {
    margin-bottom: 233px;
}
.espaco {
    width: 301px;
}
.swiper-container{
    margin-bottom: 40px!important;
}
.sobreposto h2{
    font-size: 13px!important;
}
.sobreposto img {
    height: 50px!important;
    width: 50px!important;
}
.caixavendas {
    width: 80%;
}
.imagemcem {
    width: 100%!important;
    display: flex!important;
}
.carrosselresponsivo{
    width: 70%!important;
}
.textresponsivo {
    display: flex!important;
    justify-content: center!important;
}
.compartilheresp{
    display: flex;
    justify-content: center;
    width: 100%;
}
.avaliacao{
    margin-bottom: 0px!important;
}
.minhaconta i{
    color: white;
}
.divletras{
    width: 100%!important;
}
.divlogo{
    width: 100%!important;
}

.whats {
    width: 100%!important;
}
.divletras {
    display: none!important;
}
.imagemcem {
    margin-bottom: 0px!important;
}
.caixavendas{
    width: 70%!important;
} 

.price h5 {
    margin-left: 10px!important;
}
.textresponsivo {
    margin-bottom: 0px!important;
}
.sobre i {
padding-top: 0%!important;
margin-bottom: 0%!important;
}
.sobre .col-sm-1 {
margin-bottom: 0%!important;
}
.caixa {
    height: 163px!important;
}
.thumbnail.store {
    margin-bottom: 292px;
}
.secaoresp{
    margin-bottom: 139px!important;
    height: 327px!important;
}
.fa-shopping-cart:before {
    content: "\f07a";
    position: fixed;
    height: 200%;
    width: 200px;
    font-size: 30px;
    float: right;
    margin-left: 65%;
    margin-top: 663px;
    color: #68CFFA;
}
.entrecadastrar{
    padding-left: 8px;
}
.explorarcategorias{
    width: 100%;
    justify-content: center;
    display: flex;
    margin-left: 276px;
}
}
/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) and (max-width: 991px){
    .logoimage {
        display: flex!important;
        width: 10%!important;
        margin-left: 0px!important;
    }
    .logoimagelink {
        justify-content: start!important;
        padding-top: 12%!important;

    }
    .minhaconta {
    margin-left: -303px;
}

.divletras {
    margin-left: -270px;
}
.letra{
    font-size: 15px!important;
}
.faleconosco{
    width: 100px;
}
.divflex {
    display: flex;
    margin-left: 8%;
}
.busca {
    width: 60%;
    margin-left: 100px;
    margin-top: 13px;
}
.position {
    position: absolute;
}
.divletras {
    width: 150%!important;
}
.links {
    font-size: 26px;
    margin-left: -40px;
    width: 279px;
    display: grid;
}
.espacamento {
    margin-left: 0px!important;
}
.textolink {
    margin-left: 57px;
}
.textoresponsivo {
    width: 65%;
    margin-bottom: 50px;
}
.secaoresp {
    margin-bottom: 30%;
    display: flex;
    justify-content: center;
}
.sobreposto h2{
    font-size: 15px!important;
}
.sobreposto img {
    height: 70px!important;
    width: 70px!important;
}

.caixavendas {
    width: 55%;
}
.imagemcem {
    width: 100%!important;
    display: flex!important;
}
.carrosselresponsivo{
    width: 55%!important;
}

.compartilheresp{
    display: flex;
    justify-content: center;
    width: 100%;
}
.textresponsivo{
    display: flex;
    justify-content: center;
}
.divletras {
    width: 100%!important;
    justify-content: center;
    display: flex;
    margin-left: -5px;
}
.minhaconta {
    width: 32%!important;
    margin-left: 100px;
}
.parceirosbutton {
    margin-left: 71px;
}

div .caption {
    height: 128%!important;
    margin-bottom: 10px;
}
.contaesconde{
    display: none;
}
.divesconde {
    display: none;
}

}
@media only screen and (min-width: 768px) and (max-width: 820px){
    .buscamargin{
        margin-right: 10px;
    }
    div .caption {
    height: 128%!important;
    margin-bottom: 30px;
}
.secaoresp {
    margin-bottom: 33%;
}
.contaesconde{
    display: none;
}
.divesconde {
    display: none;
}
}
/* Large devices (laptops/desktops, 992px and up) */
@media screen and (min-width: 992px) and (max-width: 1200px) {
    .parceirosbutton {
        margin-left: 12%!important;
    }

    .textolink {
        font-size: 10px;
    }
    .textoa {
        width: 50%;
    }
    
    .element.style {
    height: 0px
}
.thumbnail.store .caption{
    height: 133%!important;
}
.caixavendas {
    width: 55%!important;
}
.imagemcem {
    width: 100%!important;
    display: flex!important;
}
.carrosselresponsivo{
    width: 55%!important;
}
.textresponsivo {
    display: flex!important;
    justify-content: center!important;
}
.compartilheresp{
    display: flex;
    justify-content: center;
    width: 100%;
}
.sobreposto h2{
    font-size: 18px!important;
}
.sobreposto img {
    height: 90px!important;
    width: 90px!important;
}
.minhaconta{
    width: 24%!important;
}
.contaesconde{
    display: none;
}
.divesconde {
    display: none;
}
}
@media only screen and (min-width: 990px) and (max-width: 1020px){
    .divletras{
        width: 104%!important;
    }
}
/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .parceirosbutton {
        margin-left: 6%!important;
    }
    .secaoresp {
        margin-bottom: 30px!important;
    }
    .minhaconta {
        width: 22%!important;
    }
    .caixa {
    height: 168px!important;
}
.contaesconde{
    display: none;
}
.divesconde {
    display: none;
}
}
@media only screen and (min-width: 1300px) {
    .parceirosbutton {
        margin-left: 0!important;
    }
    .minhaconta {
        width: 22%!important;
    }
    .contaesconde{
    display: none;
}
.divesconde {
    display: none;
}
}

    </style>
    <style>
        #sync1 img{
            height: 450px!important;
        }
      </style>

</head>
<body>


<!-- start navbar -->

<div class="navbar yamm navbar-default" style="background: <?php echo COR2;?>!important;">
<div class="container row align-items-center divlogo" style="width: 100%;">
<div class="divflex">       
<div class="navbar-header col-md-3 imageresp" >
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" id="#navbar-collapse-1" class="navbar-toggle" style="background-color:#262d37; border:1px solid #262d37;display:none;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url('')?>" class="navbar-brand justify-content-end logoimagelink" style="justify-content: end; align-items: end; display: flex; padding-top: 20%;">
                <img src="<?php echo base_url('assets/site/')?>img/logo.png" width="100%" style="object-fit: cover; width: 20%; text-align: center; justify-content: center; align-items: center; display: flex; margin-left: 76%;" class="logoimage" alt="logo">
            </a>
</div>
<div class="col-md-6 position">
            <div class="nav navbar-nav hidden-xs col-md-12 justify-content-start " style="padding-top:10px; float: left;">
                <form action="<?php echo base_url('');?>">
                    <div class="row grid-space-2 espacamento">
                        <div class="col-xs-12 busca">
                        <div class="input-group buscamargin">  
                        <input type="text" name="keyword" class="form-control input-lg semi-circle" placeholder="Buscar oferta..." style="border:0px; border-radius:0px 0px 0px 0px; -webkit-border-radius:5px; -moz-border-radius:5px;" <?php if(isset($_GET['keyword']) and !empty($_GET['keyword'])): echo 'value="'.$_GET['keyword'].'"'; endif;?>>
                            <span class="input-group-addon">
                                <button class="fa fa-search" style="background:transparent;border:none" value="Buscar"></button>
                            </span>
                        </div>      
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form>
            </div>
</div>
<div class="" style="color: white; font-size: 16px">
            <div class="height: 50px d-flex align-items-center;">
            <ul class="nav navbar-nav navbar-right hidden-xs col-md-3 d-flex justify-content-center" style="background: <?php echo COR2;?>!important; margin-top: 25px;">
                <div class="col-sm-12 links">
                    <a href="<?php echo base_url('')?>contato" class="col-sm-4 textolink textoa" style="color: white;"><li href="" class="letra faleconosco" style="color: white;">Fale Conosco</li></a>
                    <a href="<?php echo base_url('')?>parceiro" class="col-sm-8 textolink" style="color: white;"><li style="color: white;" class="letra">Seja Nosso Parceiro</li></a>
                </div>
            </ul>
            </div>
            </div>
                    <ul class="dropdown-menu" style="background: <?php echo COR2;?>!important; border:1px solid <?php echo COR1;?>; border-bottom-right-radius:20px; -webkit-border-bottom-right-radius:20px; -moz-border-radius-bottomright:20px; border-bottom-left-radius:20px; -webkit-border-bottom-left-radius:20px; -moz-border-radius-bottomleft:20px;">
                        <li>
                            <!-- Content container to add padding -->
                            <div class="yamm-content">
                                <div class="row">
                                    <ul class="col-xs-12 col-sm-3">
                                        <?php
                                        $this->db->from('categorias');
                                        $this->db->where('status', 1);
                                        $this->db->order_by('id', 'asc');
                                        $this->db->limit('4', '0');
                                        $get = $this->db->get();
                                        $result = $get->result_array();
                                        foreach ($result as $value){
                                        ?>
                                        <li><a href="<?php echo base_url('categoria/'.$value['id']);?>" style="color:#FFFFFF;"><?php echo $value['nome'];?></a></li>
                                       <?php }?>
                                    </ul>
                                    <ul class="col-xs-12 col-sm-3">
                                        <?php
                                        $this->db->from('categorias');
                                        $this->db->where('status', 1);
                                        $this->db->order_by('id', 'asc');
                                        $this->db->limit('4', '4');
                                        $get = $this->db->get();
                                        $result = $get->result_array();
                                        foreach ($result as $value){
                                            ?>
                                            <li><a href="<?php echo base_url('categoria/'.$value['id']);?>" style="color:#FFFFFF;"><?php echo $value['nome'];?></a></li>
                                        <?php }?>
                                    </ul>
                                    <ul class="col-xs-12 col-sm-3">
                                        <?php
                                        $this->db->from('categorias');
                                        $this->db->where('status', 1);
                                        $this->db->order_by('id', 'asc');
                                        $this->db->limit('4', '8');
                                        $get = $this->db->get();
                                        $result = $get->result_array();
                                        foreach ($result as $value){
                                            ?>
                                            <li><a href="<?php echo base_url('categoria/'.$value['id']);?>" style="color:#FFFFFF;"><?php echo $value['nome'];?></a></li>
                                        <?php }?>
                                    </ul>
                                    <ul class="col-xs-12 col-sm-3">
                                        <?php
                                        $this->db->from('categorias');
                                        $this->db->where('status', 1);
                                        $this->db->order_by('id', 'asc');
                                        $this->db->limit('4', '16');
                                        $get = $this->db->get();
                                        $result = $get->result_array();
                                        foreach ($result as $value){
                                            ?>
                                            <li><a href="<?php echo base_url('categoria/'.$value['id']);?>" style="color:#FFFFFF;"><?php echo $value['nome'];?></a></li>
                                        <?php }?>
                                    </ul>
                                </div><!-- end row -->
                            </div><!-- end yamn-content -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- end navbar collapse -->
        
    </div><!-- end container -->
    
    <!-- start topBar -->
<div class="topBar" >
    <div class="row divletras" style="width: 100%; justify-content: center; display: flex;">
        <div class="dropdown dropdowncustomizado col-sm-1 d-flex justify-content-end" style="margin-right: 4%; ">
            <div class="" >
                <button class="btn btn-default dropdown-toggle categorias"  type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Explorar Categorias
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-inline pull-left hidden-sm hidden-xs " aria-labelledby="dropdownMenu1" style="background-color: black!important;">
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
                            <h2 style="font-size: 18px; color: white; margin-top: 10%;"><?php echo $value['nome'];?></h2>
                        </li>
                        </div>
                        <?php } endif;?>
                    </ul>
                    <ul class="list-inline pull-left hidden-sm hidden-xs">
                <ul class="topBarNav pull-right col-6">
                </ul>
                <div class="categoriasitem">
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
                            <li><a href="<?php echo base_url('categoria/'.$value['id'])?>"><?php echo $value['nome'];?></a></li>


                            <?php } endif;?></div>
                        <ul class="topBarNav pull-right col-6">
                    
                    </ul>
                </ul>
            </div>
        </div>

        <style>


        #dropdownMenu1:hover #dropdownMenu1 ul{

            display: block!important;
        }

         </style>                           
         <div class="dropdown dropdowncustomizado col-sm-4" style="margin-right: 4%; ">
            <div class="" >
                <button class="btn btn-default dropdown-toggle parceirosbutton categorias" style="" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Explorar Parceiros
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-inline pull-left hidden-sm hidden-xs " aria-labelledby="dropdownMenu1" style="background-color: black!important;">
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
                            <a href="<?php echo base_url('categoria/'.$value['id'])?>"> <img src="<?php echo base_url('web/imagens/'.$value['image'])?>" class="rounded-circle" style="width: 80%; border-radius: 50%; height: 80px; border: 2px solid white;" alt="";><br></a>
                            <h2 style="font-size: 18px; color: white; margin-top: 10%;"><?php echo $value['nome'];?></h2>
                        </li>
                        </div>
                        <?php } endif;?>
                    </ul>
                    <ul class="list-inline pull-left hidden-sm hidden-xs">
                <ul class="topBarNav pull-right col-6">
                </ul>
                <div class="categoriasitem">
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
                            <li><a href="<?php echo base_url('categoria/'.$value['id'])?>"><?php echo $value['nome'];?></a></li>


                            <?php } endif;?></div>
                        <ul class="topBarNav pull-right col-6">
                    
                    </ul>
                </ul>
            </div>
        </div>
        <div class="col-sm-2 minhaconta" style="display: flex;">
            <ul class="topBarNav pull-right col-6" style="list-style: none;">
                    <li class="linkdown" style="list-style: none;">
                        <a href="<?php echo base_url('minha-conta');?>">
                            <i class="fa fa-user mr-5"></i>

                        

                            <?php
                            if($this->SessionsVerify_Model->logVer() == true):
                                $nameExplode = explode(' ',$_SESSION['NAME']);

                                ?>
                                <span class="hidden-xs">
                                        Ol??, <?php echo $nameExplode[0];?>
                                    <i class="fa fa-angle-down ml-5"></i>
                                    </span>

                            <?php else:?>
                                <span class="hidden-xs">
                                        Minha Conta / Cadastro
                                    <i class="fa fa-angle-down ml-5"></i>
                                    </span>

                            <?php endif;?>
                        </a>
                        <ul class="w-150" style="list-style: none;">
                            <?php
                            if($this->SessionsVerify_Model->logVer() == false):
                            ?>
                            <li><a href="<?php echo base_url('login');?>">Entrar</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('cadastro');?>">Cadastrar</a></li>
                            <li class="divider"></li>
                            <?php else:?>
                                <li><a href="<?php echo base_url('minha-conta/meus-dados');?>">Meus Dados</a></li>

                                <li class="divider"></li>
                                <li><a href="javascript:logout();">Sair</a></li>
                                <li class="divider"></li>

                            <?php endif;?>
                        </ul>
                        
                    </li>
                    <a href="">
                    <i href="" class="fas fa-shopping-cart"></i>
                    </a>
                </ul>
        </div>
    </div><!-- end container -->
    <div class="row divesconde" id="divesconde" style="width:300px; height: 50px; background-color: black;">
    <div class="col-sm-6 minhaconta" style="display: flex; position: fixed;">
            <ul class="pull-right col-12" style="list-style: none;">
                    <li class="linkdown contaesconde" style="list-style: none;">
                        <a href="<?php echo base_url('minha-conta');?>">
                            <i class="fa fa-user mr-5" style="color:white;"></i>

                        

                            <?php
                            if($this->SessionsVerify_Model->logVer() == true):
                                $nameExplode = explode(' ',$_SESSION['NAME']);

                                ?>
                                <span class="hidden-xs">
                                        Ol??, <?php echo $nameExplode[0];?>
                                    <i class="fa fa-angle-down ml-5"></i>
                                    </span>

                            <?php else:?>
                                <span class="hidden-xs">
                                        Minha Conta / Cadastro
                                    <i class="fa fa-angle-down ml-5"></i>
                                    </span>

                            <?php endif;?>
                        </a>
                        <ul class="w-150 entrecadastrar" style="list-style: none; display: inline-block;">
                            <?php
                            if($this->SessionsVerify_Model->logVer() == false):
                            ?>
                            <li><a href="<?php echo base_url('login');?>">Entrar</a></li>
                            
                            <li><a href="<?php echo base_url('cadastro');?>">Cadastrar</a></li>
                            
                            <?php else:?>
                                <li><a href="<?php echo base_url('minha-conta/meus-dados');?>">Meus Dados</a></li>

                                <li class="divider"></li>
                                <li><a href="javascript:logout();">Sair</a></li>
                                <li class="divider"></li>

                            <?php endif;?>
                        </ul>
                        <a href="">
                        <i href="" class="fas fa-shopping-cart" style="color:white;"></i>
                    </a>
                    </li>
                    
                </ul>
        </div>
        <div class="row explorarcategorias" style="width: 100%; justify-content: center; display: flex;">
        <div class="dropdown dropdowncustomizado col-sm-4 d-flex" style="margin-right: 4%; ">
            <div class="" >
                <button class="btn btn-default dropdown-toggle categoriasesconder"  type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Explorar Categorias
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-inline pull-left " aria-labelledby="dropdownMenu1" style="background-color: black!important;">
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
                            <h2 style="font-size: 18px; color: white; margin-top: 10%;"><?php echo $value['nome'];?></h2>
                        </li>
                        </div>
                        <?php } endif;?>
                    </ul>
                    <ul class="list-inline pull-left ">
                <ul class="topBarNav pull-right col-6">
                </ul>
                <div class="categoriasitem">
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
                            <li><a href="<?php echo base_url('categoria/'.$value['id'])?>"><?php echo $value['nome'];?></a></li>


                            <?php } endif;?></div>
                        <ul class="topBarNav pull-right col-6">
                    
                    </ul>
                </ul>
            </div>
        </div>
        <div class="dropdown dropdowncustomizado col-sm-4" style="margin-right: 4%; ">
            <div class="" >
                <button class="btn btn-default dropdown-toggle parceirosbutton" style="" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Explorar Parceiros
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-inline pull-left " aria-labelledby="dropdownMenu1" style="background-color: black!important;">
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
                            <a href="<?php echo base_url('categoria/'.$value['id'])?>"> <img src="<?php echo base_url('web/imagens/'.$value['image'])?>" class="rounded-circle" style="width: 80%; border-radius: 50%; height: 80px; border: 2px solid white;" alt="";><br></a>
                            <h2 style="font-size: 18px; color: white; margin-top: 10%;"><?php echo $value['nome'];?></h2>
                        </li>
                        </div>
                        <?php } endif;?>
                    </ul>
                    <ul class="list-inline pull-left">
                <ul class="topBarNav pull-right col-6">
                </ul>
                <div class="categoriasitem">
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
                            <li><a href="<?php echo base_url('categoria/'.$value['id'])?>"><?php echo $value['nome'];?></a></li>


                            <?php } endif;?></div>
                        <ul class="topBarNav pull-right col-6">
                    
                    </ul>
                </ul>
            </div>
        </div>
</div>   
</div>
</div>
<!-- end topBar -->

</div><!-- end navbar -->


<style>

   img {
       object-fit: cover;
       object-position: center;
   }
    #sync1 .owl-nav{
        margin-top: 100px!important;
    }
</style>

<script>
$('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})</script>

<script>
$(document).ready(function () {
    $('.dropdown-toggle').mouseover(function() {
        $('.dropdown-menu').addClass.show();
    })

    $('.dropdown-toggle').mouseout(function() {
        t = setTimeout(function() {
            $('.dropdown-menu').hide();
        }, 100);

        $('.dropdown-menu').on('mouseenter', function() {
            $('.dropdown-menu').show();
            clearTimeout(t);
        }).on('mouseleave', function() {
            $('.dropdown-menu').hide();
        })
    })
})
</script>
<script >
    var $j = jQuery.noConflict();
      $j("#navbar-collapse-1").on('change', function(){
          $j(".divesconder").hide();
          $j('#divesconder' + this.value).show();
});
  </script>

