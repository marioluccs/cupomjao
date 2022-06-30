
<div class="row">

    <?php

    $this->db->from('menu_admin');
    $this->db->where('status','1');
    $this->db->order_by('nome','asc');
    $gets = $this->db->get();
    if($gets->num_rows() > 0):
    $results = $gets->result_array();
    foreach ($results as $value){
    ?>
    <div class="col-lg-3 col-md-6" style="cursor: pointer;" onclick="window.location.href='<?php echo base_url('admin?page='.$value['id'].'&&type='.$value['tipo'].'')?>';">
        <div class="card-box widget-user">
            <div>
                <i style="font-size: 45pt;position: absolute;" class="<?php echo $value['icon'];?>"></i>
                <div class="wid-u-info">
                    <h4 class="m-t-0 m-b-5"><?php echo $value['nome'];?></h4>
                    <?php

        $this->db->from('menu_admin_categorias');
        $this->db->where('id',$value['categoria']);
        $this->db->where('status','1');
        $this->db->order_by('ordem','asc');
        $get = $this->db->get();
        if($gets->num_rows() > 0):
            $result = $get->result_array();
                    ?>
                    <p class="text-muted m-b-5 font-13"><?php echo $result[0]['nome'];?></p>
        <?php endif;?>
                    <small class="text-custom"><b>Acessar</b></small>
                </div>
            </div>
        </div>
    </div><!-- end col -->

<?php } endif;?>





</div>
<!-- end row -->