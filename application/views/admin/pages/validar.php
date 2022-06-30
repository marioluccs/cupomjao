
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">


            <div class="row">


                <div class="col-lg-6">
                    <div class="card-box">




                        <h5 class="m-t-30"><b>Vouchers de Compras</b></h5>
<form method="post" action="javascript:validarCompras();" id="comprasValidate">
                        <select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Selecione os Vouchers" name="vouchers[]">
                         <?php
                         $this->db->from('pedidos');
                         $this->db->where('tipo_pedido','1');
                         $this->db->where('utilizado','0');
                         $get = $this->db->get();
                         $count = $get->num_rows();
                         $result = $get->result_array();

                         foreach ($result as $key=>$value){
                             $this->db->from('usuarios');
                             $this->db->where('id',$value['usuarios']);
                             $gets = $this->db->get();
                             $counts = $gets->num_rows();
                             $results = $gets->result_array();
                             echo '<option value="'.$value['id'].'"> '.$value['code_gerado'].' - '.$results[0]['email'].'</option>';
                         }
                         ?>

                        </select>
<br><br>
                        <button class="btn btn-primary">Validar Selecionados</button>
</form>
                    </div>



                </div><!-- end col -->



                <div class="col-lg-6">
                    <div class="card-box">




                        <h5 class="m-t-30"><b>Vouchers de Descontos</b></h5>
<form method="post" action="javascript:validarDesconto();" id="descontoValidate">
                        <select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Selecione os Vouchers" name="vouchers[]">
                            <?php
                            $this->db->from('pedidos');
                            $this->db->where('tipo_pedido','0');
                            $this->db->where('utilizado','0');
                            $get = $this->db->get();
                            $count = $get->num_rows();
                            $result = $get->result_array();

                            foreach ($result as $key=>$value){
                                $this->db->from('usuarios');
                                $this->db->where('id',$value['usuarios']);
                                $gets = $this->db->get();
                                $counts = $gets->num_rows();
                                $results = $gets->result_array();
                                echo '<option value="'.$value['id'].'"> '.$value['code_gerado'].' - '.$results[0]['email'].'</option>';
                            }
                            ?>

                        </select>
<br><br>
                        <button class="btn btn-primary">Validar Selecionados</button>
</form>
                    </div>



                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>
        </div>
        </div>

<script>
    function validarCompras() {
        var form = $("#comprasValidate").serialize();

        $.ajax({
            url: '<?php echo base_url('AjaxAdmin/ValidarCompras')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["danger"]('Erro ao Validar o Voucher!');

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

                    Command: toastr["danger"](data);

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