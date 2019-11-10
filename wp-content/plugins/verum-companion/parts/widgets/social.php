<?php
/*
Title: My Demo Widget
Description: A description of what my widget does
 */
?>

<div class="social-links ">


    <?php
$social_groups = $settings['address_group'];
if (is_array($social_groups) || is_object($social_groups)) {

    foreach ($social_groups as $social_group) {
        ?>
    <a href="<?php echo esc_url($social_group['address_2']) ?>"><i
            class="fa fa-<?php echo $social_group['address'] ?>"></i></a>
    <?php
}}

?>
</div>




<!--
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a> -->