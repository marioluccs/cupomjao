<?php
$this->db->from('usuarios');
$this->db->where('id', $_SESSION['ID']);
$get = $this->db->get();
$result = $get->result_array();
if(count($result) <=0):
    unset($_SESSION['Auth01']);
   unset($_SESSION['NAME']);
     unset($_SESSION['EMAIL']);
    unset($_SESSION['PASS']);
    unset($_SESSION['ID']);
    header('Location: '.base_url('login'));
endif;
?>
<div class="">
    <div class="row">
        <form method="post" action="javascript:alteradados();">

            <?php

            $this->db->from('usuarios');
            $this->db->where('id',$_SESSION['ID']);
            $this->db->order_by('id','desc');
            $this->db->limit(4,0);
            $get = $this->db->get();
            $count = $get->num_rows();
            if($count > 0):
                $usuarios = $get->result_array();

                if(empty($usuarios[0]['cidade']) or empty($usuarios[0]['estado']) or empty($usuarios[0]['endereco']) or empty($usuarios[0]['cep']) or empty($usuarios[0]['cpf']) or empty($usuarios[0]['telefone'])):
                    echo '<b class="text-danger">* Para realizar compras você deverá preencher todos os dados abaixo.</b><br><br>';
                endif;
            endif;

            ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstname">Nome Completo <span class="text-danger">*</span></label>
                <input id="firstname" value="<?php echo @$result[0]['nome']?>" type="text" placeholder="Nome Completo" name="nome" class="form-control input-sm required" >
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="firstname">CPF <span class="text-danger">*</span></label>
                <input id="firstname" value="" type="text" placeholder="<?php echo substr(@$result[0]['cpf'], 0, 5).'******';?>" name="cpf" class="form-control input-sm required" >
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="lastname">Email <span class="text-danger">*</span></label>
                <input id="lastname" value="<?php echo @$result[0]['email']?>" type="email" placeholder="E-mail" name="email" class="form-control input-sm required" <?php echo empty($result[0]['email']) ? 'disabled' : 'disabled';?> >
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="email">Celular (somente n&uacute;meros) <span class="text-danger">*</span></label>
                <input type="text" value="<?php echo @$result[0]['telefone']?>" placeholder="Telefone" name="telefone" class="form-control input-sm required email">
            </div><!-- end form-group -->

            <div class="form-group">
                <a href="javascript:alteradados();" class="btn btn-default round btn-md"><i class="fa fa-save mr-5"></i> Salvar</a>
            </div><!-- end form-group -->
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="oldPassword">CEP <span class="text-danger">*</span></label>
                <input id="oldPassword" value="<?php echo @$result[0]['cep']?>" type="text" placeholder="CEP" name="cep" class="form-control input-sm required">
            </div><!-- end form-group -->

            <div class="form-group">
                <label for="newPassword">Estado  <span class="text-danger">*</span></label>

                <select name="estado"  class="form-control input-sm required">
                    <option <?php if($result[0]['estado'] == 'AC'): echo 'selected'; endif;?> value="AC">Acre</option>
                    <option <?php if($result[0]['estado'] == 'AL'): echo 'selected'; endif;?> value="AL">Alagoas</option>
                    <option <?php if($result[0]['estado'] == 'AP'): echo 'selected'; endif;?> value="AP">Amapá</option>
                    <option <?php if($result[0]['estado'] == 'AM'): echo 'selected'; endif;?> value="AM">Amazonas</option>
                    <option <?php if($result[0]['estado'] == 'BA'): echo 'selected'; endif;?> value="BA">Bahia</option>
                    <option <?php if($result[0]['estado'] == 'CE'): echo 'selected'; endif;?> value="CE">Ceará</option>
                    <option <?php if($result[0]['estado'] == 'DF'): echo 'selected'; endif;?> value="DF">Distrito Federal</option>
                    <option <?php if($result[0]['estado'] == 'ES'): echo 'selected'; endif;?> value="ES">Espírito Santo</option>
                    <option <?php if($result[0]['estado'] == 'GO'): echo 'selected'; endif;?> value="GO">Goiás</option>
                    <option <?php if($result[0]['estado'] == 'MA'): echo 'selected'; endif;?> value="MA">Maranhão</option>
                    <option <?php if($result[0]['estado'] == 'MT'): echo 'selected'; endif;?> value="MT">Mato Grosso</option>
                    <option <?php if($result[0]['estado'] == 'MS'): echo 'selected'; endif;?> value="MS">Mato Grosso do Sul</option>
                    <option <?php if($result[0]['estado'] == 'MG'): echo 'selected'; endif;?> value="MG">Minas Gerais</option>
                    <option <?php if($result[0]['estado'] == 'PA'): echo 'selected'; endif;?> value="PA">Pará</option>
                    <option <?php if($result[0]['estado'] == 'PB'): echo 'selected'; endif;?> value="PB">Paraíba</option>
                    <option <?php if($result[0]['estado'] == 'PR'): echo 'selected'; endif;?> value="PR">Paraná</option>
                    <option <?php if($result[0]['estado'] == 'PE'): echo 'selected'; endif;?> value="PE">Pernambuco</option>
                    <option <?php if($result[0]['estado'] == 'PI'): echo 'selected'; endif;?> value="PI">Piauí</option>
                    <option <?php if($result[0]['estado'] == 'PI'): echo 'selected'; endif;?> value="PI">Rio de Janeiro</option>
                    <option <?php if($result[0]['estado'] == 'RN'): echo 'selected'; endif;?> value="RN">Rio Grande do Norte</option>
                    <option <?php if($result[0]['estado'] == 'RS'): echo 'selected'; endif;?> value="RS">Rio Grande do Sul</option>
                    <option <?php if($result[0]['estado'] == 'RO'): echo 'selected'; endif;?> value="RO">Rondônia</option>
                    <option <?php if($result[0]['estado'] == 'RR'): echo 'selected'; endif;?> value="RR">Roraima</option>
                    <option <?php if($result[0]['estado'] == 'SC'): echo 'selected'; endif;?> value="SC">Santa Catarina</option>
                    <option <?php if($result[0]['estado'] == 'SP'): echo 'selected'; endif;?> value="SP">São Paulo</option>
                    <option <?php if($result[0]['estado'] == 'SE'): echo 'selected'; endif;?> value="SE">Sergipe</option>
                    <option <?php if($result[0]['estado'] == 'TO'): echo 'selected'; endif;?> value="TO">Tocantins</option>
                </select>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="confirmPassword">Cidade  <span class="text-danger">*</span></label>
                <input id="confirmPassword" value="<?php echo @$result[0]['cidade']?>" type="text" placeholder="Cidade" name="cidade" class="form-control input-sm required">
            </div><!-- end form-group -->

            <div class="form-group">
                <label for="confirmPassword">Endereço  <span class="text-danger">*</span></label>
                <input id="confirmPassword" value="<?php echo @$result[0]['endereco']?>" type="text" placeholder="Rua xxx. nºx - Centro" name="endereco" class="form-control input-sm required">
            </div><!-- end form-group -->
        </div><!-- end col -->
        </form>
    </div><!-- end row -->
</div>
