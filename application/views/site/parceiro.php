<?php $this->load->view('site/fixed_files/header'); ?>
<!-- start section -->
<section class="section white-backgorund" style="margin-top:-50px;">
    <div class="container">
<form method="post" action="javascript:formcontato();">
    <div class="col-md-6" style="margin-top: 10%;">
        <h1 style="text-align: left; font-size: 30px;">SEJA NOSSO PARCEIRO</h1>
        <p style="text-align: left; font-size: 30px;">para <b>aumentar suas vendas</b> e <b>divulgar sua marca.</b></p>
        <button style="border-radius: 10px; width: 60%; margin-top: 6%;">
            <label for="" style="padding: 5px; font-size: 20px;">Ok, quero ser um parceiro</label>
        </button>
    </div>
    <div class="col-md-6">
        <img src="<?php echo base_url('assets/site/')?>img/negocios.png" alt="">
    </div>
    
    <div class="col-md-12">
        <h1 style="text-align: center; font-size: 30px;">PARCERIAS DE SUCESSO</h1>
        <hr style="width: 30%;"></hr>
        <p style="text-align: center;">Preencha o formulário e entraremos em contato!</p>
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
            <input id="nomempresa" value="" type="text" placeholder="Nome da Empresa" name="nomempresa" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="ramodeatividade" value="" type="text" placeholder="Ramo de Atividade" name="ramodeatividade" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="facebook" value="" type="text" placeholder="Facebook" name="facebook" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="instagram" value="" type="text" placeholder="Instagram" name="instagram" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="endereco" value="" type="text" placeholder="Endereço" name="endereco" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-6">
            <input id="bairro" value="" type="text" placeholder="Bairro" name="bairro" class="form-control input-sm required" style="height:60px; font-size: 20px; border-radius: 10px;">
        </div><!-- end form-group -->
        <div class="form-group col-sm-12">
            <textarea  placeholder="O que gostaria de oferecer ?" name="texto" class="form-control input-sm required email" style="height: 200px; border-radius: 10px; font-size: 20px;"></textarea>
        </div><!-- end form-group -->

        <div class="form-group col-sm-12" style="width: 100%;">
            <a href="javascript:formcontato();" class="btn btn-default round btn-md" style="width:100%; border-radius: 10px; height: 40px; font-size: 20px;"><i class="fa fa-envelope mr-5" ></i> Enviar</a>
        </div><!-- end form-group -->
    </div><!-- end col -->

</form>
    </div></section>
<?php $this->load->view('site/fixed_files/footer'); ?>
