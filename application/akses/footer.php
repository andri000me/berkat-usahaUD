<!-- <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/jquery/jquery.min.js"></script>
<!-- Scripts -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/validator.min.js"></script> 
<!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/js-visitor/scripts.js"></script> <!-- Custom scripts -->
<script>
    $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>