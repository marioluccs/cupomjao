
<!--Morris Chart CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/plugins/morris/morris.css">

<link href="<?php echo base_url('assets/admin')?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/css/menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/css/core.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/css/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/css/icons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/css/pages.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="<?php echo base_url('assets/admin')?>/js/modernizr.min.js"></script>

<?php if(isset($_GET['type']) and $_GET['type'] == 1 or isset($_GET['type']) and $_GET['type'] == 3):?>

    <link href="<?php echo base_url('assets/admin')?>/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />


<link href="<?php echo base_url('assets/admin')?>/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin')?>/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <?php if(isset($_GET['edit']) or isset($_GET['adicionar']) or isset($_GET['type']) and $_GET['type'] == 3):?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets/admin')?>/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin')?>/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/admin')?>/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin')?>/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin')?>/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin')?>/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin')?>/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin')?>/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin')?>/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <?php endif;?>

<?php endif;?>