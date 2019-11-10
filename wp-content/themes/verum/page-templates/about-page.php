<?php
/**
 *
 * Template Name:About page
 */

get_header('single');
the_post();
$about_img = get_post_meta(get_the_ID(), 'about_img', true);
$about_img_src = wp_get_attachment_image_src($about_img, 'large');

$about_signature = get_post_meta(get_the_ID(), 'about_signature', true);
$about_signature_src = wp_get_attachment_image_src($about_signature, 'large');
$about_spcial = get_post_meta(get_the_ID(), 'social_link', true);
?>
<!--post start-->
<div class="container">
         <div class="row justify-content-md-center">
             <div class="col-md-8">
                 <div class="row justify-content-md-center justify-content-center">
                     <div class="col-md-10 col-10">
                         <div class="about-heading text-center">
                             <img class="img-fluid" src="<?php echo esc_url($about_img_src[0]) ?>" alt=""/>
                             <h2><?php the_title();?></h2>
                             <div class="designation"><?php echo get_post_meta(get_the_ID(), 'designation', true) ?></div>
                             <div class="short-title">
                                 <?php echo wp_kses_post(get_post_meta(get_the_ID(), 'teaser_text', true)) ?>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="about-info text-left">
                     <?php the_content();?>
                     <div class="text-center">
                         <img class="img-fluid" src="<?php echo esc_url($about_signature_src[0]) ?>" alt=""/>
                     </div>
                     <div class="about-social-links text-center">
                     <?php if ($about_spcial['facebook']) {
    ?>
                         <a href="<?php echo esc_url($about_spcial['facebook']) ?>"><i class="fa fa-facebook"></i></a>
                         <?php
}?>
                     <?php if ($about_spcial['twitter']) {
    ?>
                         <a href="<?php echo esc_url($about_spcial['twitter']) ?>"><i class="fa fa-twitter"></i></a>
                         <?php
}?>
                     <?php if ($about_spcial['google_plus']) {
    ?>
                         <a href="<?php echo esc_url($about_spcial['google_plus']) ?>"><i class="fa fa-google-plus"></i></a>
                         <?php
}?>

                     </div>
                 </div>
             </div>
         </div>
    </div>
    <!--post end-->
    <?php

get_footer();
?>