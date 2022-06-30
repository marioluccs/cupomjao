<?php
$this->load->view('empresa/fixed_files/header');
?>
    <div class="clearfix"></div>
<br>
<br>
    <div class="col-sm-12">
        <div class="card-box">



            <div class="row">
                <div class="col-md-12">
                    <div class="p-20">
                        <h5><b>Configurações do Pagseguro</b></h5>
                        <div class="alert alert-info" <?php if(empty($arrEmpresa[0]['email_pagseguro']) or  empty($arrEmpresa[0]['token_pagseguro']))?>>
                            A URL de Retorno do PagSeguro:
                            <strong><?php echo base_url('NotificationUrlPS/'.$_SESSION['ID_EMPRESA'])?></strong>
                        </div>
                       <form method="post" action="javascript:pagseguro();">
                           <input type="text" class="form-control" maxlength="255" name="email_pagseguro" id="email_pagseguro" placeholder="Email do Pagseguro"
                                  value="<?php echo $arrEmpresa[0]['email_pagseguro'];?>">

                        <div class="m-t-20">
                            <input type="text"  class="form-control" maxlength="255" name="token_pagseguro" id="token_pagseguro" placeholder="Token do Pagseguro"
                                   value="<?php echo $arrEmpresa[0]['token_pagseguro'];?>"
                            >
                        </div>
<br>
                           <button type="submit" class="btn btn-primary">Salvar</button>

                       </form>
                    </div>
                </div><!-- end col -->

            </div><!-- end row -->
        </div>
    </div>

<?php $this->load->view('empresa/fixed_files/footer');

?>
<script>
    function pagseguro() {

        var form = $('form').serialize();

        $.ajax({
            url: '<?php echo base_url('AjaxEmpresa/pagseguro')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["error"]('Erro ao alterar dados do pagseguro!');

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

                if(data == 11){

                    window.location.reload();

                }else{

                    Command: toastr["error"]('Erro ao alterar dados do pagseguro!');

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
