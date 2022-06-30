<?php $this->load->view('site/fixed_files/header'); ?>
<!-- start section -->
<section class="section white-backgorund" style="margin-top:-50px;">
    <div class="container">
<form method="post" action="javascript:formcontato();">
    <div class="col-md-12" style="margin-top: 20px;">
        <h1 style="text-align: center; font-size: 30px;">CANAIS DE ATENDIMENTO</h1>
        <hr style="width: 30%;"></hr>
        <p style="text-align: center;">Qualquer dúvida pode falar com a gente através de um de<br> nossos canais e em breve responderemos!</p>
    </div>
    <div class="col-md-12 row d-flex justify-content-center align-items-center" style="margin-top: 10%; margin-bottom: 10%;">
        <div class="col-md-6">
            <img src="<?php echo base_url('assets/site/')?>img/atendimento.png" alt="">
        </div>
        <div class="col-md-6 row d-flex align-items-center">
            <div>
                <div class="col-sm-12 d-flex align-items-center justify-content-center" style="text-align: center;">
                    <i class="fa fa-envelope" style="font-size: 60px;"></i>
                    <p style="margin-bottom: -5px;">Email</p>
                    <p><b>atendimento@newcommerce.com.br</b></p>
                </div>
            </div>
            <div class="col-sm-12" style="text-align:center; margin-top: 40px;">
                <div class="col-sm-6">
                    <i class="fab fa-whatsapp" style="font-size: 60px;"></i>
                    <p style="margin-bottom: -5px;">Whatsapp</p>
                    <p><b>(33) 9 9876-0905</b></p>
                </div>
                <div class="col-sm-6">
                    <i class="fas fa-phone-volume" style="font-size: 60px;"></i>
                    <p style="margin-bottom: -5px;">Contato</p>
                    <p><b>(33) 9 9876-0905</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h1 style="text-align: center; font-size: 30px;">FORMULÁRIO DE CONTATO</h1>
        <hr style="width: 30%;"></hr>
        <p style="text-align: center;">Se preferir preencha o formulário abaixo para falar conosco.<br>Retornaremos o seu contato o mais breve possível!</p>
    </div>
    <div class="col-md-12" style="border: 1px solid black; border-radius: 10px; padding: 20px; margin-top: 30px;">
        <div class="form-group col-sm-6">
            <input id="firstname" value="" type="text" placeholder="Nome Completo" name="nome" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="email" value="" type="email" placeholder="Telefone" name="email" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="email" value="" type="email" placeholder="E-mail" name="email" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="lastname" value="" type="text" placeholder="Assunto" name="assunto" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-12">
            <textarea  placeholder="Mensagem" name="texto" class="form-control input-sm required email" style="height: 200px; border-radius: 10px; font-size: 20px;"></textarea>
        </div><!-- end form-group -->

        <div class="form-group col-sm-12" style="width: 100%;">
            <a href="javascript:formcontato();" class="btn btn-default round btn-md" style="width:100%; border-radius: 10px; height: 40px; font-size: 20px;"><i class="fa fa-envelope mr-5" ></i> Enviar</a>
        </div><!-- end form-group -->
    </div><!-- end col -->

</form>
    </div></section>
<?php $this->load->view('site/fixed_files/footer'); ?>
