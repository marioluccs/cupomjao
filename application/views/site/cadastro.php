<?php $this->load->view('site/fixed_files/header'); ?>
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <figure>
                        <a href="javascript:void(0);">
                        </a>
                    </figure>
                </div><!-- end widget -->
            </div><!-- end col -->
            <!-- end sidebar -->
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Criar uma conta</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5"><hr class="spacer-20 no-border">

                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-12">
                        <form class="form-horizontal" method="post" action="javascript:cadastro();">
                            <a href="javascript:logInWithFacebook('1');" class="btn btn-default" style="width: 100%;background: #29487d;border-color: #29487d;"> Cadastre-se com o Facebook</a>
                            <br>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-md" id="name" name="nome" placeholder="Nome">
                                </div>
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control input-md" id="email" name="email" placeholder="Email">
                                </div>
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Senha <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control input-md" id="pass" name="pass" placeholder="Senha">
                                </div>
                                <div class="col-sm-3">
                                    <a href="javascript:cadastro();" class="btn btn-default round btn-md"><i class="fa fa-user mr-5"></i> Cadastrar</a>
                                </div>                                
                            </div><!-- end form-group -->
                            
                        </form>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php $this->load->view('site/fixed_files/footer'); ?>
<script>

    function cadastro() {

        var form = $('form').serialize();
        $.ajax({
            url: '<?php echo base_url('Ajax/cadastro')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');

            },
            error: function (res) {

                Command: toastr["error"]("Ocorreu um erro, tente novamente!");

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

            },
            success: function (data) {

                $('body').css('opacity','1');

                if(data == 11){

                    window.location.reload();

                }

                else{
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
                }



            }
        });
    }

</script>