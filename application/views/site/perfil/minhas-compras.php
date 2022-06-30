<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>CODE</th>
            <th>Oferta</th>
            <th>Foto</th>
            <th>Data</th>
            <th>Tipo</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $this->db->from('pedidos');
        $this->db->where('usuarios', $_SESSION['ID']);
        $this->db->where('tipo_pedido','1');
        $this->db->where('status',1);
        $this->db->order_by('id','desc');
        $get = $this->db->get();



        if($get->num_rows() > 0):
        $result = $get->result_array();
            $this->db->from('produtos');
            $this->db->where('id', $result[0]['produtos']);
            $this->db->where('status',1);
            $get = $this->db->get();

            if($get->num_rows() > 0):
                $produto = $get->result_array()[0]['nome'];
                $prodImage = $get->result_array()[0]['image'];
                else:
                $produto = '';
                $prodImage = '';
            endif;
        foreach ($result as $key => $value) {
            ?>
            <tr>
                <td> <?php echo $value['id']?></td>
                <td> <?php echo $value['code_gerado']?></td>
                <td> <?php echo $produto?></td>
                <td> <img style="width: 50px;" src="<?php echo base_url('web/imagens/'.$prodImage)?>" /></td>
                <td> <?php echo $value['data_pedido'];?></td>
                <td> <?php echo ($value['tipo_pedido'] == 1) ? 'Pedido de Compra' : 'Pedido de Desconto';?></td>
                <td> <?php

                    if($value['utilizado'] == 1):
                        echo ($value['pago'] == 1) ? 'Pago e Utilizado' : 'Sistema Burlado';

                    else:
                        echo ($value['pago'] == 1) ? '<a style="font-size: 11pt;" class="btn btn-default btn-block btn-lg semi-circle" href="'.base_url('comprovante/'.$value['id']).'">Ver Voucher</a>' : '<a class="btn btn-default btn-block btn-lg semi-circle" href="'.$value['link_payment'].'" onclick="return false;" target="_blank" style="font-size: 11pt;">Aguardando Pagamento</a>';
                    endif;


                    ?></td>

            </tr>
        <?php } else: ?>
            <tr>
                <td> -- --</td>
                <td> -- --</td>
                <td> -- --</td>
                <td> -- --</td>
                <td> -- --</td>
                <td> -- --</td>
                <td> -- --</td>


            </tr>
        <?php endif;?>
        </tbody>
    </table><!-- end table -->
</div>