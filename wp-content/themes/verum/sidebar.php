<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package verum
 */

if (!is_active_sidebar('blog-sidebar')) {
    return;
}
$verum_sidber_positions = get_theme_mod('verum_sideber_positions', 'no');
$verum_sidber_border = 'left' == $verum_sidber_positions ? 'side-border' : '';
?>


<!-- Sidebar start-->
<div class="col-lg-3 col-md-4 <?php echo esc_attr($verum_sidber_border) ?>">
<?php
dynamic_sidebar('blog-sidebar');
?>




            </div>