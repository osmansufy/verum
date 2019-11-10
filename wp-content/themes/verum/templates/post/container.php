                   <?php

global $wp_query;
$verum_current_index = $wp_query->current_post + 1;
$verum_container_column = ($verum_current_index % 5 == 1) ? 12 : 6;
?>







                    <div class="col-md-<?php echo esc_attr($verum_container_column); ?>">

                        <?php
if ('quote' != get_post_format()):
?>
    <article <?php post_class();?>>
    <?php

get_template_part('templates/post/post', 'header');
get_template_part('templates/post/title', 'meta');
get_template_part('templates/post/post', 'content');

?>
 </article>
<?php
else:

    get_template_part('templates/post/post', 'quote');

endif;

?>

                    </div>