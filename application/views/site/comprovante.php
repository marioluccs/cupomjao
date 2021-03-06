<?php $this->load->view('site/fixed_files/header');

$this->db->from('pedidos');
$this->db->where('id', $this->uri->segment(2));
$get = $this->db->get();

if($get->num_rows() == 0):

//header('Location:'.CAMINHO_LOGADO);

else:

    $value = $get->result_array();


    $this->db->from('produtos');
    $this->db->where('id', $value[0]['produtos']);
    $get = $this->db->get();
    if($get->num_rows() == 0):

//header('Location:'.CAMINHO_LOGADO);

    else:
        $produtos = $get->result_array();
    endif;

    $this->db->from('empresas');
    $this->db->where('id', $produtos[0]['empresas']);
    $get = $this->db->get();
    if($get->num_rows() == 0):

//header('Location:'.CAMINHO_LOGADO);

    else:
        $empresas = $get->result_array();
    endif;
    $this->db->from('usuarios');
    $this->db->where('id', $value[0]['usuarios']);
    $get = $this->db->get();
if($get->num_rows() == 0):

//header('Location:'.CAMINHO_LOGADO);

else:
    $usuarios = $get->result_array();
    endif;
endif;
?>


<!-- start section -->
<section class="section white-backgorund">
	<div class="container">
		<div class="row">

			<div class="col-lg-12" style="padding-bottom:30px;"><h5>Parabéns, seu voucher foi gerado com sucesso!</h5><span>Este voucher foi enviado para <?php echo $_SESSION['EMAIL'];?></span></div>
             <div class="col-lg-12">
            	<div class="row">

					<div class="col-lg-3 col-xs-12"><img show-on-load="cover" ng-show="loaded.cover" class="img-responsive animate-show animate-hide" alt="" onerror="this.src='<?php echo base_url('web/imagens/default');?>';" ng-src="<?php echo !empty($produtos[0]['image']) ? base_url('web/imagens/'.$produtos[0]['image'])  : base_url('web/imagens/default');?>" src="<?php echo !empty($produtos[0]['image']) ? base_url('web/imagens/'.$produtos[0]['image'])  : base_url('web/imagens/default');?>" style="width:200px! important; height:170px !important;"></div>

					<div class="col-lg-3 col-xs-12">
	                	<div class="thumbnail store style1">                                	                           
                            <div class="caption">
                         	<h4 class="regular">texto descrição resumida</h4>
	                            <div class="price">
                                    <?php
                                        if($value[0]['tipo_compra'] == 1):
                                        $preco = number_format($produtos[0]['valor'],2,'.','');
                                        $precoDesconto =  !empty($produtos[0]['desconto']) ? $produtos[0]['desconto'] : $produtos[0]['valor'];
                                        else:
                                            $preco = number_format($produtos[0]['valor2'],2,'.','');
                                            $precoDesconto =  !empty($produtos[0]['desconto2']) ? $produtos[0]['desconto2'] : $produtos[0]['valor2'];
                                        endif;
                                    ?>                                
	                            	<h5 class="amount off text-gray">de R$ <?php echo number_format($preco,2,'.','');?></h5>
	                                <h5 class="amount text-primary">por R$ <?php echo number_format($precoDesconto,2,'.','');?></h5>
                                    <span>CÓDIGO: <b><?php echo $value[0]['code_gerado'];?></b></span>
	                            </div>
	                    	</div><!-- end caption -->  
						</div>
                    </div>
                    
                    <div class="col-lg-3 col-xs-12">
                    	<?php
	                    // Variavais
	                    @include '../../../../../core/qrcode/qr_img.php';
	                    #   d= data         URL encoded data.
	                    #   e= ECC level    L or M or Q or H   (default M)
	                    #   s= module size  (dafault PNG:4 JPEG:8)
	                    #   v= version      1-40 or Auto select if you do not set.
	                    #   t= image type   J:jpeg image , other: PNG image
	                    $aux = 'https://portalurbano.com.br/application/core/qrcode/qr_img.php?';
	                    $aux .= 'd='.base_url('empresa?validar').'='.$value[0]['code_gerado'].'&&tipo='.$produtos[0]['tipoProd'];
	                    $aux .='e=H&';
	                    $aux .= 's=4&';
	                    $aux .= 't=other';
	                   // echo $aux;
	                    ?>
	                    <qrcode data="960AA702" error-correction-level="L" size="180"><img style="width:180px;" src="<?php echo $aux;?>"></qrcode>
                        <br>
					</div>

				</div>                    	
            </div>

            <div class="col-lg-12">
            	<div class="row">
                    
                    <div class="col-lg-6 col-xs-12">
                    	<h5>Esta oferta é oferecida por:</h5>
                      <p class="ng-binding"> <?php echo $empresas[0]['nome']?><br>
						<?php echo $empresas[0]['endereco']?><br>
						<?php echo $empresas[0]['cidade']?>/<?php echo $empresas[0]['estado']?><br>
						<h5><?php echo $empresas[0]['telefone']?></h5>
                        </p>
                  </div>
                     <div class="col-lg-6 col-xs-12">   
                        <h5>Emitido para:</h5>
                        <p class="ng-binding"><?php echo $usuarios[0]['nome']?> em <?php echo $value[0]['data_pedido'];?></p>
                        <h5>Válido até:</h5>
                        <p class="ng-binding"><?php  $valido = explode('/',$produtos[0]['valido']); echo $valido[1].'/'.$valido[0].'/'.$valido[2]?></p>
                        <BR>
                        <a onclick="window.print();return false;" class="btn btn-warning-outline semi-circle btn-md">IMPRIMIR</a>
                    </div>
                    </div>
                    
  		</div>
            </div>

   <div class="col-sm-12">
				<ul class="nav nav-tabs style1" role="tablist" style="padding-top:40px;">
                	<li role="presentation">
                    	<h6 class="text-uppercase">REGRAS DE USO</h6>
                    </li>
                </ul>
                <div class="tab-content4" style="padding-top:10px;">
                	<div role="tabpanel" class="tab-pane fade in active" id="DIV001">
                 <div class="col-lg-12">Texto 01</div>
					</div>
                </div>
			</div>

			<div class="col-sm-12">
				<ul class="nav nav-tabs style1" role="tablist" style="padding-top:40px;">
                	<li role="presentation">
                    	<h6 class="text-uppercase">REGRAS DE USO GERAL</h6>
                    </li>
                </ul>
                <div class="tab-content4" style="padding-top:10px;">
                	<div role="tabpanel" class="tab-pane fade in active" id="DIV001">
                    	<div class="col-lg-12">
                        	Cada oferta tem suas regras de uso e validade. Fique atento!
                            <br><br>
                            Salvo em casos específicos em que o regulamento da seção estabelece o contrário, algumas restrições se aplicam a todas as ofertas:
                            <br><br>
                            - As ofertas não são cumulativas com outras promoções do estabelecimento.<br>
							- Observe a data de validade do seu cupom. A não utilização do cupom no prazo estabelecido implicará na perda do mesmo.<br>
							- Não é válido para taxas de serviços<br>
							- O valor total do cupom deverá ser gasto em uma única visita (não haverá troco ou crédito).<br>
							- Cupons não utilizados no prazo não tem direito a reembolso.<br>                        
                        </div>
					</div>
                </div> 
			</div>
            
                    
		</div>
	</div>
</section>
    	
<?php $this->load->view('site/fixed_files/footer'); ?>
