<?php $this->load->view('admin/fixed_files/header'); ?>

    <!-- Start content -->
    <div class="content">
        <div class="container">
            <?php if (!isset($_GET['page']) and !isset($_GET['type'])):
                $this->load->view('admin/pages/navigation_menu');

            elseif (isset($_GET['page']) and isset($_GET['type'])):

                if ($_GET['type'] == 1 and !isset($_GET['edit']) and !isset($_GET['adicionar'])):
                    $this->load->view('admin/pages/tabelas');
                elseif ($_GET['type'] == 1 and isset($_GET['edit']) and !empty($_GET['edit'])):
                    $this->load->view('admin/pages/edicao');
                endif;

                if ($_GET['type'] == 1 and isset($_GET['adicionar']) and !empty($_GET['adicionar']) and !isset($_GET['edit'])):
                    $this->load->view('admin/pages/edicao');
                endif;
            else:
                $this->load->view('admin/pages/navigation_menu');




            endif;


            if (isset($_GET['type']) and $_GET['type'] == 3):
                $this->load->view('admin/pages/validar');
            endif;
            ?>



            <?php
           if (isset($_GET['page']) and isset($_GET['type']) and $_GET['type'] == 2 and !isset($_GET['adcionar']) and !isset($_GET['edit'])):

                $_GET['edit'] = 1;
                $_GET['editMod'] = 1;
                $this->load->view('admin/pages/edicao');
                endif;
            ?>

        </div> <!-- container -->

    </div> <!-- content -->

<?php $this->load->view('admin/fixed_files/footer'); ?>