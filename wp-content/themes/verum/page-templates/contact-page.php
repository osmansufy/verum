<?php
/**
 *
 * Template Name:Contact page
 */

get_header('single');
the_post();
?>
<div class="container">
         <div class="row justify-content-md-center">
             <div class="col-md-8">
                 <div class="row justify-content-center">
                     <div class="col-10">
                         <div class="contact-heading text-center">
                             <h2><?php the_title();?></h2>
                             <div class="subtitle"><?php echo get_post_meta(get_the_ID(), 'verum_sub_heading', true) ?></div>
                             <?php the_content();?>
                         </div>
                     </div>
                 </div>

<?php
$verum_contact_form = get_post_meta(get_the_ID(), 'verum_contact_shortcode', true);
echo do_shortcode($verum_contact_form);
?>

             </div>
         </div>
    </div>
<?php

get_footer()?>
