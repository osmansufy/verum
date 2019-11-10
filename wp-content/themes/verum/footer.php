  <!--flickr photo start-->
  <div id="flickr">
  <?php

if (is_active_sidebar('footer_top')) {
    dynamic_sidebar('footer_top');
}

?>

    <!--flickr photo end-->


    <!--footer start-->
    <footer class="footer-section">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <div class="logo text-center">
                        <h1>
                            <a href="<?php home_url('/');?>">
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/logo@2x.png 2x"  alt=""/> -->
                           <?php the_custom_logo();?>
                            </a>
                        </h1>
                    </div>
                </div>


                <div class="col-md-4">

                    <?php
wp_nav_menu(array(
    'theme_location' => 'footer-menu',
    'menu_class' => 'list-unstyled footer-links',
    'menu_id' => 'footer-menu',
));
?>
                </div>

                <div class="col-md-4 order-md-first">
                <?php
if (is_active_sidebar('footer_left')) {
    dynamic_sidebar('footer_left');
}
?>

                </div>

            </div>
        </div>
    </footer>
    <!--footer end-->



   <?php
wp_footer();
?>
</body>
</html>