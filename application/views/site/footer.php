
<!-- start footer -->
<footer class="footer" style="background: <?php echo COR2;?>!important;color:  <?php echo COR1;?>!important;">
    <div class="container">

        <div class="row">


            <div class="col-sm-3">
                <?php
                $this->db->from('config');
                $this->db->limit('1', '0');
                $get = $this->db->get();
                $result = $get->result_array();
                ?>
                <h5 class="title" style="color:<?php echo COR3;?>!important;">PortalUrbano | <a href="<?php echo $result[0]['FACEBOOK']?>" target="_blank" style="color:<?php echo COR3;?>!important;"><i class="fa fa-facebook"></i></a> | <a href="<?php echo $result[0]['INSTAGRAM']?>" target="_blank" style="color:<?php echo COR3;?>!important;"><i class="fa fa-instagram"></i></a> |</h5>
                <ul class="list alt-list">
                    <li ><a  href="<?php echo base_url('pagina/sobre-nos')?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i>Sobre Nós</a></li>
                    <li><a href="<?php echo base_url('pagina/como-funciona')?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i>Como Funciona</a></li>
                    <li><a href="<?php echo base_url('pagina/politica-privacidade')?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i>Pol&iacutetica de Privacidade</a></li>
                    <li><a href="<?php echo base_url('pagina/termos-de-uso')?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i>Termo de Uso</a></li>
                    <li><a href="<?php echo base_url('empresa')?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i>Acesso Empresas</a></li>
                    <li><a href="<?php echo base_url('contato')?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i>Contato</a></li>
                </ul>
            </div><!-- end col -->

            <div class="col-sm-6">
                <h5 class="title" style="color:<?php echo COR3;?>!important;">Categorias</h5>
                <ul class="list alt-list col-sm-6">
                    <?php
                    $this->db->from('categorias');
                    $this->db->where('status', 1);
                    $this->db->order_by('id', 'asc');
                    $this->db->limit('6', '0');
                    $get = $this->db->get();
                    $result = $get->result_array();
                    foreach ($result as $value){
                    ?>
                    <li><a href="<?php echo base_url('categoria/'.$value['id']);?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i><?php echo $value['nome'];?></a></li>
                 <?php }?>
                </ul>
                <ul class="list alt-list col-sm-6">
                    <?php
                    $this->db->from('categorias');
                    $this->db->where('status', 1);
                    $this->db->order_by('id', 'asc');
                    $this->db->limit('6', '6');
                    $get = $this->db->get();
                    $result = $get->result_array();
                    foreach ($result as $value){
                        ?>
                        <li><a href="<?php echo base_url('categoria/'.$value['id']);?>" style="color:<?php echo COR3;?>!important;"><i class="fa fa-angle-right"></i><?php echo $value['nome'];?></a></li>
                    <?php }?>
                </ul>
            </div><!-- end col -->

            <div class="col-sm-3">
                <h5 class="title" style="color:<?php echo COR3;?>!important;">Formas de Pagamento</h5>
                <p style="color:<?php echo COR3;?>!important;">PagSeguro Uol.</p>
                <div><img src="<?php echo base_url('assets/site/')?>img/pagseguro.png" style="width:100%;"></div>
                <p style="color:<?php echo COR3;?>!important;"></p>
                <div><img src="<?php echo base_url('assets/site/')?>img/logo-conexaosegura.png" style="width:60%;"></div>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-20">

        <div class="row text-center">
            <div class="col-sm-12">
                <p class="text-sm" style="color:<?php echo COR3;?>!important;">&COPY; 2018. Desenvolvido por <a href="javascript:void(0);" style="color:<?php echo COR3;?>!important;">PORTALURBANO</a></p>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</footer>
<!-- end footer -->


<!-- JavaScript Files -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/jquery.downCount.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/nouislider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/star-rating.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/wow.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/gmaps.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/site/')?>js/countdown.js"></script>
<script src="<?php echo base_url('assets/site/')?>js/owl.carrousel.js"></script>
<script src="<?php echo base_url('assets/site/')?>js/mask.js"></script>

<script>
    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });
</script>
<script>

    function redefinir_senha() {
        var email = $("#emailRedefinir").val();
        $.ajax({
            url: '<?php echo base_url('Ajax/redefinirPass')?>',
            data: {email:email},
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {


                $('body').css('opacity','1');

            },
            success: function (data) {


                if(data == 11){

                    Command: toastr["success"]('E-mail enviado com sucesso!');

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
                }else{

                    Command: toastr["warning"](data);

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


    function localidade(id) {
        $.ajax({
            url: '<?php echo base_url('Ajax/localidadeDefine')?>',
            data: {localidade:id},
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["warning"]('Erro ao definir a localidade!');

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

                    Command: toastr["warning"]('Erro ao definir a localidade!');

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
    function carrosels(id) {
//Initialize Plugin
        $(".owl-carousel").owlCarousel()

//get carousel instance data and store it in variable owl
        var owl = $("#sync1").data('owlCarousel');

        owl.goTo(id);

    }

    $(document).ready(function() {
        $('#sync1').owlCarousel({
            loop:true,
            margin:0,
            autoplay:true,
            autoplayHoverPause:true,
            responsiveClass:true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:1,
                    nav:true
                },
                1000:{
                    items:1,
                    nav:true,
                }
            }
        });
    });


    $(document).ready(function() {
        $('#sync2').owlCarousel({
            loop:true,
            margin:0,
            responsiveClass:true,
            responsive:{
                0:{
                    items:6,
                    nav:false
                },
                600:{
                    items:6,
                    nav:false
                },
                1000:{
                    items:6,
                    nav:false,
                    loop:true
                }
            }
        });
    });


    $(document).ready(function() {
        $('#sync3').owlCarousel({
            loop:true,
            margin:0,
            autoplay:true,
            autoplayHoverPause:true,
            responsiveClass:true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:1,
                    nav:true
                },
                1000:{
                    items:1,
                    nav:true,
                }
            }
        });
    });


    $(document).ready(function() {
        $('#sync4').owlCarousel({
            loop:true,
            margin:0,
            autoplay:true,
            autoplayHoverPause:true,
            responsiveClass:true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:1,
                    nav:true
                },
                1000:{
                    items:1,
                    nav:true,
                }
            }
        });
    });
</script>
<!-- Initialize Swiper slide -->
<script>
    var swiperH = new Swiper('.swiper-coverflow', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        effect: 'coverflow',
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        autoplay: {
            delay: 5000
        },
        coverflow: {
            rotate: 50,
            stretch: 0,
            depth: 1000,
            modifier: 1,
            slideShadows : true
        }
    });
</script>
<script src="<?php echo base_url('assets/admin/')?>/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
    $(function () {
        var i = -1;
        var toastCount = 0;
        var $toastlast;

        var getMessage = function () {
            var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
                'Are you the six fingered man?',
                'Inconceivable!',
                'I do not think that means what you think it means.',
                'Have fun storming the castle!'
            ];
            i++;
            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };

        var getMessageWithClearButton = function (msg) {
            msg = msg ? msg : 'Clear itself?';
            msg += '<br /><br /><button type="button" class="btn btn-default clear">Yes</button>';
            return msg;
        };

        $('#showtoast').click(function () {
            var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
            var msg = $('#message').val();
            var title = $('#title').val() || '';
            var $showDuration = $('#showDuration');
            var $hideDuration = $('#hideDuration');
            var $timeOut = $('#timeOut');
            var $extendedTimeOut = $('#extendedTimeOut');
            var $showEasing = $('#showEasing');
            var $hideEasing = $('#hideEasing');
            var $showMethod = $('#showMethod');
            var $hideMethod = $('#hideMethod');
            var toastIndex = toastCount++;
            var addClear = $('#addClear').prop('checked');

            toastr.options = {
                closeButton: $('#closeButton').prop('checked'),
                debug: $('#debugInfo').prop('checked'),
                newestOnTop: $('#newestOnTop').prop('checked'),
                progressBar: $('#progressBar').prop('checked'),
                positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                preventDuplicates: $('#preventDuplicates').prop('checked'),
                onclick: null
            };

            if ($('#addBehaviorOnToastClick').prop('checked')) {
                toastr.options.onclick = function () {
                    alert('You can perform some custom action after a toast goes away');
                };
            }

            if ($showDuration.val().length) {
                toastr.options.showDuration = $showDuration.val();
            }

            if ($hideDuration.val().length) {
                toastr.options.hideDuration = $hideDuration.val();
            }

            if ($timeOut.val().length) {
                toastr.options.timeOut = addClear ? 0 : $timeOut.val();
            }

            if ($extendedTimeOut.val().length) {
                toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut.val();
            }

            if ($showEasing.val().length) {
                toastr.options.showEasing = $showEasing.val();
            }

            if ($hideEasing.val().length) {
                toastr.options.hideEasing = $hideEasing.val();
            }

            if ($showMethod.val().length) {
                toastr.options.showMethod = $showMethod.val();
            }

            if ($hideMethod.val().length) {
                toastr.options.hideMethod = $hideMethod.val();
            }

            if (addClear) {
                msg = getMessageWithClearButton(msg);
                toastr.options.tapToDismiss = false;
            }
            if (!msg) {
                msg = getMessage();
            }

            $('#toastrOptions').text('Command: toastr["'
                + shortCutFunction
                + '"]("'
                + msg
                + (title ? '", "' + title : '')
                + '")\n\ntoastr.options = '
                + JSON.stringify(toastr.options, null, 2)
            );

            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;

            if (typeof $toast === 'undefined') {
                return;
            }

            if ($toast.find('#okBtn').length) {
                $toast.delegate('#okBtn', 'click', function () {
                    alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                    $toast.remove();
                });
            }
            if ($toast.find('#surpriseBtn').length) {
                $toast.delegate('#surpriseBtn', 'click', function () {
                    alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                });
            }
            if ($toast.find('.clear').length) {
                $toast.delegate('.clear', 'click', function () {
                    toastr.clear($toast, {force: true});
                });
            }
        });

        function getLastToast() {
            return $toastlast;
        }

        $('#clearlasttoast').click(function () {
            toastr.clear(getLastToast());
        });
        $('#cleartoasts').click(function () {
            toastr.clear();
        });
    })
</script>
<script>
    function logout() {

        $.ajax({
            url: '<?php echo base_url('Ajax/logout')?>',
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["warning"]('Erro ao realizar o Logout!');

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

                    Command: toastr["warning"]('Erro ao realizar o Logout!');

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

<script>
    function alteradados() {
        var form = $('form').serialize();
        $.ajax({
            url: '<?php echo base_url('Ajax/alteradados')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["warning"]('Erro ao salvar dados!');

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

                    Command: toastr["warning"](data);

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


    function formcontato() {
        var form = $('form').serialize();
        $.ajax({
            url: '<?php echo base_url('Ajax/contato')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["warning"]('Erro ao salvar dados!');

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

                    Command: toastr["success"]("Email enviado com sucesso.");

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

                    Command: toastr["success"]("Email enviado com sucesso.");

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
<script>
    function alterapass() {
        var form = $('form').serialize();
        $.ajax({
            url: '<?php echo base_url('Ajax/alterarSenha')?>',
            data: form,
            type: 'POST',
            beforeSend: function () {
                $('body').css('opacity','0.5');
            },
            error: function (res) {

                Command: toastr["warning"]('Erro ao alterar a senha!');

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

                    alert(data);
                    $('body').css('opacity','1');

                }



            }
        });
    }

</script>

<script>
    logInWithFacebook = function(tipos) {


        $("#textFB").hide();
        $("#loadFB").show();


        FB.login(function(response) {
            if (response.authResponse) {

                if(tipos == '1')
                {
                    $.ajax({
                        url: "<?php echo base_url('Ajax/facebookloginapi');?>",
                        data: {fbnewlogs:'true'},
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {


                            if (data > 0) {

                                window.location.reload();

                            } else {

                                if(data == 0727){
                                    $("#textFB").show();
                                    $("#loadFB").hide();

                                    Command: toastr["warning"]('Informe um e-mail para processegir');

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

                                    $("#textFB").show();
                                    $("#loadFB").hide();
                                    Command: toastr["warning"](data);

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



                            }

                            $('.content-loading').html('');
                        }
                    });

                }else{

                    var email = $("#emaillogsfacemanual").val();

                    $.ajax({
                        url: "<?php echo base_url('Ajax/facebookloginapi');?>",
                        data: {email:email,fbnewlogs:'true'},
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {


                            if (data > 0) {

                                window.location.reload();

                            } else {

                                if(data == 0727){
                                    $("#textFB").show();
                                    $("#loadFB").hide();
                                    Command: toastr["warning"]('Informe um e-mail para processegir');

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

                                    $("#textFB").show();
                                    $("#loadFB").hide();
                                    Command: toastr["warning"](data);

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



                            }

                            $('.content-loading').html('');
                        }
                    });

                }



                // Now you can redirect the user or do an AJAX request to
                // a PHP script that grabs the signed request from the cookie.
            } else {
                $("#textFB").show();
                $("#loadFB").hide();
                Command: toastr["warning"]('Login cancelado pelo usuario');

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
        },{scope: 'email'});
        return false;
    };
    window.fbAsyncInit = function() {
        FB.init({
            <?php
            $this->db->select('FACEBOOK_ID,FACEBOOK_KEY');
            $this->db->from('config');
            $this->db->order_by('id','desc');
            $this->db->limit(1,0);
            $get = $this->db->get();
            $count = $get->num_rows();
            if($count > 0):
                $result = $get->result_array();
                $appid = $result[0]['FACEBOOK_ID'];
            else:
                $appid = '';
            endif;
            ?>
            appId: '<?php echo $appid;?>',
            cookie: true, // This is important, it's not enabled by default
            version: 'v2.2'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));





</script>
<!-- Login via Facebook Fim -->


<?php if(!isset($_SESSION['localidade']) and !isset($_SESSION['ID'])):?>
<?php if($this->uri->segment(1) <> 'login'):?>
<script type="text/javascript">
    window.onload = function(){
     $(".registerModal").modal('show');
    }
</script>
<?php endif;?>
<!-- Modal Register -->
<div class="modal fade account registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row display-table text-center">
                    <div class="col-sm-6 vertical-align">
                        <div class="inner-content">
                            <h3>PortalUrbano</h3>
                            <p class="lead">Selecione sua Localidade</p>

                            <hr class="spacer-5 no-border">


                            <div class="form-group">
    <select class="form-control input-lg" name="localidadeHome" id="localidadeHome">
                                <?php
                                $this->db->from('localidade');
                                $this->db->where('status', 1);
                                $get = $this->db->get();
                                $result = $get->result_array();
                                foreach ($result as $value){
                                ?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['nome'];?></option>
                                <?php }?>
    </select>
                            </div><!-- end form-group -->



                            <div class="form-group">
                            <input type="submit" onclick="localidade($('#localidadeHome').val());" class="btn btn-default btn-block round btn-lg" value="Definir Local" >
                            </div><!-- end form-group -->



                        </div><!-- inner-content -->

                    </div><!-- end col -->

                    <div class="col-sm-6 vertical-align image-background layer-dark" style="background-image: url('http://www.hibrasil.com.br/v1/wp-content/uploads/2017/11/belo-horizonte-1.jpg');">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="inner-content">
                            <h3 class="text-white">Realizar Login</h3>
                            <p class="lead text-white">entre com sua conta do facebook</p>

                            <ul class="social-icons style2">
                                <li class="facebook"><a class="semi-circle" href="javascript:logInWithFacebook(1);"><i class="fa fa-facebook"></i></a></li>
                            </ul>

                            <hr class="spacer-10 no-border"/>

                            <p>Já e cadastrado? <a href="<?php echo base_url('login')?>" class="text-white">Entre aqui</a></p>

                        </div><!-- end inner-content -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end registerModal -->

<?php endif;?>
</body>
</html>
