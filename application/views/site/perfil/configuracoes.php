<?php
$this->db->from('usuarios');
$this->db->where('id', $_SESSION['ID']);
$get = $this->db->get();
?>
<div class="">
    <div class="row">
        <form method="post" action="javascript:alterapass();">
        <div class="col-md-6">
            <?php
            if(!empty($get->result_array()[0]['pass'])):
            ?>
            <div class="form-group">
                <label for="oldPassword">Senha Antiga <span class="text-danger">*</span></label>
                <input id="oldPassword" type="password" placeholder="*********" name="oldPassword" class="form-control input-sm required" required>
            </div><!-- end form-group -->
            <?php endif;?>
            <div class="form-group">
                <label for="newPassword">Nova Senha  <span class="text-danger">*</span></label>
                <input id="newPassword" type="password" placeholder="*********" name="newPassword" class="form-control input-sm required" required>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="confirmPassword">Repita a Nova Senha  <span class="text-danger">*</span></label>
                <input id="confirmPassword" type="password" placeholder="*********" name="confirmPassword" class="form-control input-sm required" required>
            </div><!-- end form-group -->

            <div class="form-group">
                <a href="javascript:alterapass();" class="btn btn-default round btn-md"><i class="fa fa-save mr-5"></i> Salvar</a>
            </div><!-- end form-group -->
        </div><!-- end col -->

        </form>
    </div><!-- end col -->
    </div><!-- end row -->


