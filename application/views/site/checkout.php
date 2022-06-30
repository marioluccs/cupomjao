<?php $this->load->view('site/fixed_files/header');

if(!isset($_SESSION['produto']) and !isset($_SESSION['tipo']) and !isset($_SESSION['valor'])):
header('Location:/'.CAMINHO_LOGADO);
endif;

$this->db->from('usuarios');
$this->db->where('id',$_SESSION['ID']);
$this->db->order_by('id','desc');
$this->db->limit(4,0);
$get = $this->db->get();
$count = $get->num_rows();
if($count > 0):
    $usuarios = $get->result_array();

if(empty($usuarios[0]['cidade']) or empty($usuarios[0]['estado']) or empty($usuarios[0]['endereco']) or empty($usuarios[0]['cep']) or empty($usuarios[0]['cpf']) or empty($usuarios[0]['telefone'])):
    header('Location:/'.CAMINHO_LOGADO);
endif;
endif;


?>
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <h6 class="subtitle"><?php echo $this->Funcoes_Model->mensagens($_SESSION,'minha-conta');?></h6>

                    <ul class="list list-unstyled">
                        <li>
                            <a href="<?php echo base_url('minha-conta/meus-dados');?>">Meus dados</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('minha-conta/minhas-compras');?>">Minhas Compras <span class="text-primary" style="display: none;">(3)</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('minha-conta/meus-descontos');?>">Meus Descontos</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('minha-conta/configuracoes');?>">Configurações</a>
                        </li>
                    </ul>
                </div><!-- end widget -->

                <?php
                $this->db->from('produtos');
                $this->db->where('id',$_SESSION['produto']);

                $this->db->order_by('id','desc');
                $this->db->limit(4,0);
                $get = $this->db->get();
                $count = $get->num_rows();
                if($count > 0):

                    $result = $get->result_array();
                $empresaid = $result[0]['empresas'];
                    ?>
                    <div class="widget">
                        <h6 class="subtitle">Novas Ofertas</h6>

                        <ul class="items">


                            <?php
                            foreach ($result as $key=>$value){
                                $valor =  $value['desconto'];
                                ?>
                                <li>
                                    <a href="<?php echo base_url('oferta/'.$value['id'])?>" class="product-image">
                                        <img onerror="this.src='<?php echo base_url('web/imagens/default.png'); ?>';" src="<?php echo empty($value['image']) ? base_url('web/imagens/default.png') : base_url('web/imagens/' . $value['image']); ?>" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name">
                                            <a href="<?php echo base_url('oferta/'.$value['id'])?>"><?php echo $value['nome'];?></a>
                                        </p>
                                        <span class="price text-primary">R$ <?php echo empty($value['desconto']) ? number_format($value['valor'],2,'.','') : number_format($valor,2,'.','');?></span>
                                        <div class="rate text-warning" style="display: none;">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>

                        </ul>

                        <hr class="spacer-10 no-border">
                        <a href="<?php echo base_url('?tags=novidades');?>" class="btn btn-default btn-block semi-circle btn-md">Ver Mais</a>
                    </div>

                <?php endif;?>
            </div><!-- end col -->
            <!-- end sidebar -->
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Checkout</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5"><hr class="spacer-20 no-border">

                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-pills style2 nav-justified">

                            <li class="active">
                                <a href="#billing-info" data-toggle="tab">
                                    1. Informações Pessoais
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#payment" data-toggle="tab" aria-expanded="false">
                                    2. Pagamento
                                    <div class="icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <form id="finalizarPagamento" method="post">
                        <?php



                        $this->db->from('empresas');
                        $this->db->where('id',$empresaid);

                        $get = $this->db->get();
                        $count = $get->num_rows();
                        $empresaresult = $get->result_array();
                        if($count > 0 and !empty($empresaresult[0]['email_pagseguro']) and !empty($empresaresult[0]['token_pagseguro'])):
                        ?>
                            <input type="hidden" name="empresaPagseguroEmail" value="<?php echo $empresaresult[0]['email_pagseguro'];?>">
                            <input type="hidden" name="empresaPagseguroToken" value="<?php echo $empresaresult[0]['token_pagseguro'];?>">

                        <?php  endif;

                        $this->db->from('usuarios');
                        $this->db->where('id', $_SESSION['ID']);
                        $get = $this->db->get();
                        $result = $get->result_array()[0];
                        ?>

                            <input type="hidden" name="id_produto" value="<?php echo $_SESSION['produto'];?>">
                            <input type="hidden" name="valor_compra" value="<?php echo $_SESSION['valor'];?>">
                            <input type="hidden" id="senderHash" name="senderHash" value="">


                        <div class="tab-content pills">
                            <div class="tab-pane active" id="billing-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="thin subtitle">Informações de Endereço</h5>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input id="name" type="text" placeholder="CEP" name="cep" class="form-control input-md required" value="<?php echo $result['cep'];?>" required>
                                                </div><!-- end form-group -->

                                            </div><!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="surname" type="text" placeholder="Estado" name="estado" class="form-control input-md required" value="<?php echo $result['estado'];?>" required>
                                                </div><!-- end form-group -->

                                            </div>  <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="surname" type="text" placeholder="Cidade" name="cidade" class="form-control input-md required" value="<?php echo $result['cidade'];?>" required>
                                                </div><!-- end form-group -->

                                            </div>
                                        </div><!-- end row -->
                                        <div class="form-group">
                                            <input id="billingAddress" type="text" placeholder="Endereço" name="endereco" class="form-control input-md required" value="<?php echo $result['endereco'];?>" required>
                                        </div><!-- end form-group -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="city" type="text" placeholder="CEP" name="cep" class="form-control input-md required" value="<?php echo $result['cep'];?>" required>
                                                </div><!-- end form-group -->
                                            </div><!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="zip" type="text" placeholder="CPF" name="cpf" class="form-control input-md required" value="<?php echo $result['cpf'];?>" required>
                                                </div><!-- end form-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end col -->

                                    <div class="col-md-6">
                                        <h5 class="thin subtitle">Adicionar informação</h5>

                                        <div class="form-group">
                                            <textarea rows="8" class="form-control" name="descricaoadicional" placeholder="Adicione notas e informações adicionais aqui"></textarea>
                                        </div><!-- end form-group -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane" id="payment">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="thin subtitle">Metodo de pagamento</h5>
                                        <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default" >
                                                <div class="panel-heading" role="tab" id="headingPayment1">
                                                    <h4 class="panel-title">
                                                        <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                                                            <i class="fa fa-credit-card mr-10"></i>Cartão de crédito
                                                        </a>
                                                    </h4><!-- end panel-title -->
                                                </div><!-- end panel-heading -->
                                                <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">

                                                    <input type="hidden" name="creditCardBrand" id="creditCardBrand" >
                                                    <input type="hidden" name="creditCardToken" id="creditCardToken" >
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-4">Nome do Titular <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control required" name="cardholder" placeholder="">
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-4">Data de Nascimento <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control required date" name="holdCardNasc" placeholder="dd/mm/YYYY">
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-4">Numero do Cartão <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" id="cardNumber" onkeyup="brandCard();" class="form-control required" name="cardnumber" placeholder="">
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-4">Bandeiras <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <ul class="list list-inline">
                                                                        <li><i class="fa fa-cc-visa fa-2x"></i></li>
                                                                        <li><i class="fa fa-cc-paypal fa-2x"></i></li>
                                                                        <li><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                                                        <li><i class="fa fa-cc-discover fa-2x"></i></li>
                                                                    </ul>
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-4">Expiração <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <input type="text" id="cardExpirationMonth" name="mm" placeholder="MM" class="form-control required">
                                                                        </div><!-- end col -->
                                                                        <div class="col-sm-6">
                                                                            <input type="text" id="cardExpirationYear" name="yy" placeholder="YYYY" class="form-control required">
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-4">CSC <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" id="cardCvv" name="cardCvv" placeholder="" class="form-control mb-10 required">
                                                                    <a href="javascript:void(0);">O que e isso?</a>
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-offset-4 col-sm-8 text-right">
                                                                    <a href="javascript:cardhash(PagSeguroDirectPayment.getSenderHash());" class="btn btn-default btn-md round">Finalizar <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end form-group -->
                                                    </div><!-- end panel-body -->
                                                </div><!-- end collapse -->
                                            </div><!-- end panel -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingPayment2" >

                                                    <h4 class="panel-title">
                                                        <a class="collapsed " data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment2" aria-expanded="false" aria-controls="collapsePayment2">
                                                            <i class="fa fa-barcode mr-10"></i>Pagar com Boleto
                                                        </a>
                                                    </h4>
                                                </div><!-- end panel-heading -->
                                                <div id="collapsePayment2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                                                    <div class="panel-body">
                                                        E inclusa uma taxa de 1 real na emissão de boletos:<br><br>

                                                        <div class="form-group">
                                                            <a href="javascript:pagarBoleto(1,PagSeguroDirectPayment.getSenderHash());" class="btn btn-default btn-md round">Finalizar <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                        </div><!-- end form-group -->
                                                    </div><!-- end panel-body -->
                                                </div><!-- end collapse -->
                                            </div><!-- end panel -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingPayment3">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment3" aria-expanded="false" aria-controls="collapsePayment3">
                                                            <i class="fa fa-university mr-10"></i>Pagar com Debito
                                                        </a>
                                                    </h4>
                                                </div><!-- end panel-heading -->
                                                <div id="collapsePayment3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment3">
                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            Selecione seu Banco:<br>
                                                            <select name="banco">
                                                                <option name="itau" selected>Itau</option>
                                                                <option name="bradesco">Bradesco</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <a href="javascript:pagarDebito(3,PagSeguroDirectPayment.getSenderHash());" class="btn btn-default btn-md round">Finalizar <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                        </div><!-- end form-group -->
                                                    </div><!-- end panel-body -->
                                                </div><!-- end collapse -->
                                            </div><!-- end panel -->
                                        </div><!-- end panel-group -->
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <h5 class="thin subtitle">Perguntas Frequentes</h5>
                                        <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="questionOne">
                                                    <h4 class="panel-title">
                                                        <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Como utilizo meus vouchers?
                                                        </a>
                                                    </h4>
                                                </div><!-- end panel-heading -->
                                                <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                                    <div class="panel-body">
                                                        <p>Para utilizar seu voucher para compra você deve apresentar o numero gerado do seu voucher para o logista, ele ira validar seu voucher para a utilização.</p>
                                                    </div><!-- end panel-body -->
                                                </div><!-- end collapse -->
                                            </div><!-- end panel -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="questionTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Posso utilizar o voucher sem realizar o pagamento online?
                                                        </a>
                                                    </h4>
                                                </div><!-- end panel-heading -->
                                                <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                                    <div class="panel-body">
                                                        <p>Para utilizar o voucher de compra você deve realizar o pagamento online, e esperar a confirmação
                                                        do pagamento, que será exibido no painel do cliente.
                                                        </p>
                                                    </div><!-- end panel-body -->
                                                </div><!-- end collapse -->
                                            </div><!-- end panel -->


                                        </div><!-- end panel-group -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                        </div><!-- end pills content -->

                        <hr class="spacer-30">

                        <div class="row">
                            <div class="col-sm-7">

                            </div><!-- end col -->
                            <div class="col-sm-5">
                                <div class="table-responsive">
                                    <table class="table no-border">
                                        <tbody>
                                        <tr>
                                            <th>Valor Total</th>
                                            <td>R$ <?php echo $_SESSION['valor'];?></td>
                                        </tr>
                                        </tbody></table><!-- end table -->
                                    <a  href="#payment" data-toggle="tab" aria-expanded="false" class="btn btn-primary" style="display:none;width: 100%;text-transform: uppercase;"><i class="fa fa-shopping-cart"></i> Prosseguir para Pagamento</a>
                                </div><!-- end table-responsive -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        </form>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php $this->load->view('site/fixed_files/footer'); ?>

<script src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            <?php  if($count > 0 and !empty($empresaresult[0]['email_pagseguro']) and !empty($empresaresult[0]['token_pagseguro'])): ?>
                        data:{
                            empresaPagseguroEmail:'<?php echo $empresaresult[0]['email_pagseguro'];?>',
                            empresaPagseguroToken:'<?php echo $empresaresult[0]['token_pagseguro'];?>'},
                    
                        <?php  endif; ?>
            type: 'GET',
            url: '<?php echo base_url('Ajax/getSession')?>',
            cache: false,
            success: function(data) {
                PagSeguroDirectPayment.setSessionId(data);
            }
        });


    });

</script>

<script>
    function finalizarPagamento(tipo) {
        var form = $('#finalizarPagamento').serialize();
        $.ajax({
            url: '<?php echo base_url('Ajax/finalizarPagamento?tipo=')?>'+tipo,
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["danger"]('Essa e uma Plataforma de Teste e não esta Disponivel para pagamentos online!');

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

                    window.location.href="<?php echo base_url('minha-conta/minhas-compras')?>";

                }else{

                    alert(data);
                    $('body').css('opacity','1');

                }



            }
        });
    }

    function pagarDebito(tps,sender) {


        $("#senderHash").val(sender);

        var form = $('#finalizarPagamento').serialize();


        $.ajax({
            url: '<?php echo base_url('Ajax/pagamentodebito')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');

            },
            error: function (res) {

                $('body').css('opacity','1');

                Command: toastr["danger"]('Essa e uma Plataforma de Teste e não esta Disponivel para pagamentos online!');

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


            },
            success: function (data) {
                $('body').css('opacity','1');

                if (!(data.paymentLink)) {

                    console.log(data.error);

                    Command: toastr["danger"]('Erro ao finalizar o Pagamento!');

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

                }else{
                    window.location.href=data.paymentLink;
                }


            }
        });


    }



    function parcelasDisponiveis() {
        PagSeguroDirectPayment.getInstallments({
            amount: (($("#totalValue").html()).replace(",", ".")),
            brand: $("#creditCardBrand").val(),
            maxInstallmentNoInterest: 2,

            success: function(response) {
                console.log(response.installments);
                $("#installmentsWrapper").css('display', "block");


                var installments = response.installments[$("#creditCardBrand").val()];

                var options = '';
                for (var i in installments) {

                    var optionItem     = installments[i];
                    var optionQuantity = optionItem.quantity;
                    var optionAmount   = optionItem.installmentAmount;
                    var optionLabel    = (optionQuantity + " x R$ " + (optionAmount.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace(".", ',')));

                    options += ('<option value="' + optionItem.quantity + '" valorparcela="' + optionAmount +'">'+ optionLabel +'</option>');

                };

                $("#installmentQuantity").html(options);

            },

            error: function(response) {
                //console.log(response);
            },

            complete: function(response) {
            }
        });
    }

    $("#installmentQuantity").change(function() {
        var option = $(this).find("option:selected");
        if (option.length) {
            $("#installmentValue").val( option.attr("valorparcela") );
        }
    });





    function brandCard() {


        PagSeguroDirectPayment.getBrand({
            cardBin: $("#cardNumber").val(),
            success: function(response) {
                $("#creditCardBrand").val(response.brand.name);
                $("#cardNumber").css('border', '1px solid #999');

                if (response.brand.expirable) {
                    $("#expiraCartao").css('display', 'block');
                } else {
                    $("#expiraCartao").css('display', 'none');
                }
                if (response.brand.cvvSize > 0) {
                    $("#cvvCartao").css('display', 'block');
                } else {
                    $("#cvvCartao").css('display', 'none');
                }

                $("#bandeiraCartao").attr('src', 'https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/' + response.brand.name + '.png');


                parcelasDisponiveis();

            },

            error: function(response) {
                $("#cardNumber").css('border', '2px solid red');
                $("#cardNumber").focus();
                console.log(response);
            },

            complete: function(response) {

            }

        });

    }

    function cardhash(senderHash){
        PagSeguroDirectPayment.createCardToken({

            cardNumber: $("#cardNumber").val(),
            brand: $("#creditCardBrand").val(),
            cvv: $("#cardCvv").val(),
            expirationMonth: $("#cardExpirationMonth").val(),
            expirationYear: $("#cardExpirationYear").val(),

            success: function (response) {
                $("#creditCardToken").val(response.card.token);

                pagarCartao(1,senderHash);

            },
            error: function (response) {
                if (response.error) {

                    Command: toastr["danger"]('Erro ao processar!');

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
            },
            complete: function (response) {

            }

        });

    }

    function pagarCartao(tps,senderHash) {

        $("#senderHash").val(senderHash);
        $("#tipo").val(senderHash);
        var form = $('#finalizarPagamento').serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('Ajax/pagamentocartao')?>',
            cache: false,
            data: form,
            success: function(data) {
                console.log(data);
                if (data.error) {

                Command: toastr["danger"]('Essa e uma Plataforma de Teste e não esta Disponivel para pagamentos online!');

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

                        console.log(data);

                } else {


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('Ajax/getStatus')?>',
                        cache: false,
                        data: {
                            id: data.code,
                        },
                        success: function(status) {

                            if (status == "7") {
                                //alert(data);
                Command: toastr["danger"]('Essa e uma Plataforma de Teste e não esta Disponivel para pagamentos online!');

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

                            } else {

                                Command: toastr["success"]('Pedido realizado com sucesso, aguarde a confirmação do pagamento!');

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

                                setTimeout(function () {
                                    window.location.href="/minha-conta/minhas-compras";
                                }, 3500);

                            }

                        }
                    });


                    //console.log("1 " + data);
                }

            }

        });

    }

    function pagarBoleto(tps,sender) {

        $("#senderHash").val(sender);
        $("#tipo").val(sender);

        var form = $('#finalizarPagamento').serialize();


        $.ajax({
            url: '<?php echo base_url('Ajax/pagamentoboleto')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');

            },
            error: function (data) {

                var links = data.responseText;
                var retorno = links.split(",");


                var arr = retorno[8];

                var lnc = arr.split(":");

                if(lnc[2]){
                    var fimns = lnc[2].replace('"', '');
                    window.location.href=fimns;
                }else{

            alert('Essa e uma Plataforma de Teste e não esta Disponivel para pagamentos online!');
            
                    console.log(data);
                }


                $('body').css('opacity','1');


                // window.location.href='<?php echo base_url('minha-conta')?>';


            },
            success: function (data) {
                $('body').css('opacity','1');

                if (!(data.paymentLink)) {
                    alert('Essa e uma Plataforma de Teste e não esta Disponivel para pagamentos online!');

                    console.log(data);

                }else{
                    console.log(data);

                    window.location.href=data.paymentLink;
                }


            }
        });

    }

</script>