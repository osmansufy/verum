<?php
get_header('search');
$verum_sidber_positions = get_theme_mod('verum_sideber_positions', 'no');
$verum_container_class = 'no' == $verum_sidber_positions ? 'col-lg-10 col-md-8' : 'col-lg-9 col-md-8';
$verum_container_row_class = 'no' == $verum_sidber_positions ? 'justify-content-md-center' : '';
$verum_sidber_border = 'right' == $verum_sidber_positions ? 'side-border' : '';
?>


<!--post start-->
<div class="container">
    <div class="row">

        <?php
if ('left' == $verum_sidber_positions) {
    get_sidebar();
}
?>
        <div class="<?php echo esc_attr($verum_container_class) ?>> <?php echo esc_attr($verum_sidber_border) ?>">



            <div class="row">
                <?php
while (have_posts()) {
    the_post();

    get_template_part('templates/post/container');
}

?>
            </div>



            <!--custom pagination-->
            <div class="row">
                <div class="col-12">
                    <div class="custom-pagination">
                        <?php
$verum_ppl = get_previous_posts_link();
if (!$verum_ppl):
?>
                        <div class="older full">
                            <?php next_posts_link(__('Older Posts >', 'verum'));?>
                        </div>
                        <?php
else:
?>
                        <div class="older">
                            <?php next_posts_link(__('Older Posts >', 'verum'));?>
                        </div>
                        <?php
endif;
?>

                        <!-- class="newer">-->
                        <?php
$verum_npl = get_next_posts_link();
if (!$verum_npl):
?>
                        <div class="older full">
                            <?php previous_posts_link(__(' < Newer Posts', 'verum'));?>
                        </div>
                        <?php
else:
?>
                        <div class="newer">
                            <?php previous_posts_link(__(' < Newer Posts ', 'verum'));?>
                        </div>
                        <?php
endif;
?>


                    </div>
                </div>
            </div>
            <!--custom pagination-->
        </div>

        <?php
if ('right' == $verum_sidber_positions) {
    get_sidebar();
}
?>

    </div>
</div>
<!--post end-->

<?php
get_footer();
?>