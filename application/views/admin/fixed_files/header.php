
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Painel de Gerenciamento">
    <meta name="author" content="Aĝencia CodeLabs">

    <link rel="shortcut icon" href="https://agenciacodelabs.com.br/wp-content/uploads/2020/11/cropped-Design-sem-nome-11-180x180.png">

    <title><?php echo SITE_NAME;?> - Painel de Administracao</title>
    <?php $this->load->view('admin/fixed_files/css');?>


</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="<?php echo base_url('admin')?>" class="logo">
                    <i class="zmdi zmdi-toys icon-c-logo"></i><span>Administração</span>
                    <!--<span><img src="assets/images/logo.png" alt="logo" style="height: 20px;"></span>-->
                </a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>




                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li>
                            <!-- Notification -->
                            <div class="notification-box"  style="display: none;">
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
                                <img src="<?php echo base_url('web/imagens/user-default.png')?>" alt="user-img" class="img-circle user-img">
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('')?>" target="_blank"><i class="fa fa-globe"></i> Visitar Site</a></li>
                                <li><a href="javascript:logout()"><i class="ti-power-off m-r-5"></i> Sair</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <?php
                    $this->db->from('menu_admin_categorias');
                    $this->db->where('status','1');
                    $this->db->order_by('ordem','asc');
                    $get = $this->db->get();
                    if($get->num_rows() > 0):
                        $result = $get->result_array();
                        foreach ($result as $value){
                            $this->db->from('menu_admin');
                            $this->db->where('categoria',$value['id']);
                            $this->db->where('status','1');
                            $this->db->order_by('ordem','asc');
                            $gets = $this->db->get();
                            if($gets->num_rows() > 0):
                            $results = $gets->result_array();
                    ?>
                    <li class="text-muted menu-title"><?php echo $value['nome'];?></li>

                            <?php foreach ($results as $val){?>
                    <li class="has_sub">
                        <a href="<?php echo base_url('admin?page='.$val['id'].'&&type='.$val['tipo']);?> " class="waves-effect"><i class="<?php echo $val['icon'];?>"></i> <span> <?php echo $val['nome'];?> </span> </a>
                    </li>
<?php } endif; } endif;?>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <!-- Left Sidebar End -->

    <div class="content-page">