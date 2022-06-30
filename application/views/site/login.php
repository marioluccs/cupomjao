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
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Entrar em Minha Conta</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5"><hr class="spacer-20 no-border">

                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-8">

                      <?php
                      if(isset($_GET['redefinirToken']) and !empty($_GET['redefinirToken'])):

                          $this->db->from('recupera_senha');
                          $this->db->where('token',$_GET['redefinirToken']);
                          $this->db->where('validade >',date('d/m/Y H:i:s'));
                          $get = $this->db->get();
                          $count = $get->num_rows();
                          if($count > 0):
                          $result = $get->result_array();
                              ?>

                          <script>
                              function redefinirAgora() {
                                  var form = $("#emailRedefinirNow").serialize();
                                  $.ajax({
                                      url: '<?php echo base_url('Ajax/redefinirPassNow')?>',
                                      data: form,
                                      type: 'POST',
                                      beforeSend: function () {
                                          $('body').css('opacity','0.5');
                                      },
                                      error: function (res) {


                                          $('body').css('opacity','1');

                                      },
                                      success: function (data) {


                                          if(data == 11){

                                             window.location.reload();
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

                              <form id="emailRedefinirNow" class="form-horizontal" method="post" action="javascript:redefinirAgora();">

                                  <input type="hidden" name="email" value="<?php echo $result[0]['email']?>">

                                  <div class="form-group">
                                      <label for="password" class="col-sm-2 control-label">Nova Senha</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control input-md" name="npass" id="npass" placeholder="Nova Senha">
                                      </div>
                                  </div><!-- end form-group -->

                                  <div class="form-group">
                                      <label for="password" class="col-sm-2 control-label">Repita a Nova Senha</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control input-md" name="npassagain" id="npassagain" placeholder="Repita a Nova Senha">
                                      </div>
                                  </div><!-- end form-group -->

                                  <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                          <a href="javascript:redefinirAgora();" class="btn btn-default round btn-md"><i class="fa fa-lock mr-5"></i> Redefinir Senha</a>
                                      </div>
                                  </div><!-- end form-group -->
                              </form>

                          <?php else:?>
                              <h1 style="text-align: center;">Link EXPIRADO</h1>
                              <?php endif;  else:?>

                              <form class="form-horizontal" method="post" action="javascript:login();">

                                  <a href="javascript:logInWithFacebook('1');" class="btn btn-default" style="width: 100%;background: #29487d;border-color: #29487d;"> Entrar com o Facebook</a>
                                  <br>
                                  <div class="clearfix"></div>
                                  <hr>
                                  <div class="form-group">
                                      <label for="email" class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="email" class="form-control input-md" name="email" id="email" placeholder="Email">
                                      </div>
                                  </div><!-- end form-group -->
                                  <div class="form-group">
                                      <label for="password" class="col-sm-2 control-label">Senha</label>
                                      <div class="col-sm-7">
                                          <input type="password" class="form-control input-md" name="pass" id="pass" placeholder="Senha">
                                      </div>
                                      <div class="col-sm-3">
                                          <a href="javascript:login();" class="btn btn-default round btn-md"><i class="fa fa-lock mr-5"></i> Entrar</a>
                                      </div>
                                  </div><!-- end form-group -->
                                  <div class="form-group">

                                      <div class="col-sm-offset-2 col-sm-10">
                                          <label><a style="cursor: pointer;" data-toggle="modal" data-target=".myModalMedium">Esqueceu sua senha?</a></label>
                                      </div>
                                  </div><!-- end form-group -->

                                  <div class="modal fade in myModalMedium" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  <div class="row">
                                                      <div class="col-sm-10 col-sm-offset-1">
                                                          <div class="icon-boxes style1">
                                                              <div class="icon">
                                                                  <i class="fa fa-envelope text-dark"></i>
                                                              </div><!-- end icon -->
                                                              <div class="box-content">
                                                                  <h6 class="alt-font text-dark text-uppercase">Resetar minha senha</h6>
                                                                  <p class="text-gray">Esqueceu sua senha? Não tem problema, informe seu e-mail e enviaremos um link para redefini-la</p>
                                                              </div>
                                                          </div><!-- icon-box -->
                                                      </div><!-- end col -->
                                                  </div><!-- end row -->
                                              </div><!-- end modal-header -->
                                              <div class="modal-body">
                                                  <div class="row">

                                                      <div class="col-sm-8">
                                                          <input type="text" id="emailRedefinir" name="emailRedefinir" class="form-control input-md" placeholder="E-mail">
                                                      </div>
                                                      <div class="col-sm-4">
                                                          <a  class="btn btn-default btn-block round btn-md" onclick="redefinir_senha();">Redefinir</a>
                                                      </div>



                                                  </div><!-- end row -->
                                              </div><!-- end modal-body -->
                                          </div><!-- end modal-content -->
                                      </div><!-- end modal-dialog -->
                                  </div><!-- end Modal Medium -->

                                  <div class="form-group col-sm-12" style="text-align:center;"><a href="<?php echo base_url('cadastro')?>">Não é cadastrado? Cadastre-se AQUI.</a></div><!-- end form-group -->
                              </form>


                          <?php endif; ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php $this->load->view('site/fixed_files/footer'); ?>


<script>

    function login() {

        var form = $('form').serialize();
        $.ajax({
            url: '<?php echo base_url('Ajax/login')?>',
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