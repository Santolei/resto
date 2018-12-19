<!--Footer-->
    <footer class="page-footer fixed-bottom text-center font-small elegant-color-dark mt-4">

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © <?php echo date('Y'); ?> Desarrollo:
            <a href="http://www.neomicron.com.ar/" target="_blank"> Neomicron </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

    <!-- Ocultar y mostrar sidebar -->

    <script>
        $(document).ready(function () {

          $('#button-collapse-sidebar').on('click', function(){
            var sidebar = $('.sidebar-fixed');
            var main = $('#main');

            if ($(window).width() < 768) {
               sidebar.show();
               sidebar.addClass('slideInLeft');
            }
            else {
               if (sidebar.hasClass('bounceOutLeft')) {
                    sidebar.removeClass('bounceOutLeft').addClass('slideInLeft');
                    main.removeClass('main').addClass('bounceOutLeft');
                } else if (sidebar.hasClass('slideInLeft')){
                    sidebar.removeClass('slideInLeft').addClass('bounceOutLeft');
                    main.addClass('main'); 
                } 
                else {
                   sidebar.addClass('bounceOutLeft');
                   main.addClass('main'); 
                }
            }
            
          });
            
        });
        
    </script>
</body>

</html>