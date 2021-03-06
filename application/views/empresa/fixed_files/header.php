
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Agência CodeLabs">

    <link rel="shortcut icon" href="https://agenciacodelabs.com.br/wp-content/uploads/2020/11/cropped-Design-sem-nome-11-180x180.png">

    <title>Area da Empresa - <?php echo $nomeEmpresa?></title>

    <?php $this->load->view('empresa/fixed_files/css'); ?>



</head>


<body>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="<?php echo base_url('empresa');?>" class="logo">
                    <span>Empr<span>esa</span></span>
                    <!--<span><img src="assets/images/logo.png" alt="logo" style="height: 20px;"></span>-->
                </a>
            </div>
            <!-- End Logo container-->

            <div class="navbar-custom navbar-left">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li>
                            <a href="<?php echo base_url('empresa');?>">
                                <span><i class="zmdi zmdi-view-dashboard"></i></span>
                                <span> Resumo </span> </a>
                        </li>
                        <li class="has-submenu">
                            <a href="<?php echo base_url('empresa/produtos?action=all');?>">
                                <span><i class="zmdi zmdi-invert-colors"></i></span>
                                <span> Produtos </span> </a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="<?php echo base_url('empresa/produtos?action=all');?>">Todos Produtos</a></li>
                                        <li><a href="<?php echo base_url('empresa/produtos?action=disponiveis');?>">Produtos Disponiveis</a></li>
                                        <li><a href="<?php echo base_url('empresa/produtos?action=vencidos');?>">Produtos Vencidos</a></li>

                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="<?php echo base_url('empresa/pedidos?action=all');?>">
                                <span><i class="fa fa-shopping-cart"></i></span>
                                <span> Pedidos </span> </a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="<?php echo base_url('empresa/pedidos?action=all');?>">Todos Pedidos</a></li>
                                        <li><a href="<?php echo base_url('empresa/pedidos?action=utilizados');?>">Pedidos Utilizados</a></li>
                                        <li><a href="<?php echo base_url('empresa/pedidos?action=pagos');?>">Pedidos Pagos</a></li>
                                        <li><a href="<?php echo base_url('empresa/pedidos?action=pendentes');?>">Pedidos Pendentes</a></li>

                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="<?php echo base_url('empresa/financeiro/pagseguro');?>">
                                <span><i class="fa fa-credit-card"></i></span>
                                <span> Financeiro </span> </a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="<?php echo base_url('empresa/financeiro/pagseguro');?>">Pagseguro</a></li>
                                        <li style="display: none;"><a href="<?php echo base_url('empresa/financeiro/relatorios');?>">Relatorio de Ganhos</a></li>


                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('empresa/configuracoes');?>">
                                <span><i class="fa fa-cog"></i></span>
                                <span> Configurações </span> </a>
                        </li>
                    </ul>
                    <!-- End navigation menu  -->
                </div>
            </div>


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li style="display: none;">
                        <form role="search" class="navbar-left app-search pull-left hidden-xs">
                            <input type="text" placeholder="Buscar..." class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    <li>
                        <!-- Notification -->
                        <div class="notification-box" style="display:none;">
                            <ul class="list-inline m-b-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="zmdi zmdi-notifications-none"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                            <img onerror="this.src='<?php echo base_url('web/imagens/user-default.png');?>'" src="<?php echo empty($arrEmpresa[0]['image']) ? base_url('web/imagens/user-default.png')  : base_url('web/imagens/'.$arrEmpresa[0]['image']);?>" alt="user-img" class="img-circle user-img">
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('');?>" target="_blank"><i class="ti-user m-r-5"></i> Visitar Site</a></li>

                            <li><a href="javascript:logout()"><i class="ti-power-off m-r-5"></i> Sair</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>


</header>
<!-- End Navigation Bar-->
<div class="wrapper">
    <div class="container">
