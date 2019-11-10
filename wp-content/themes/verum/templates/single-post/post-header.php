<?php
if ('audio' == get_post_format()) {
    $verum_media_src = get_post_meta(get_the_ID(), 'verum_media_url', true);
    if ($verum_media_src) {

        ?>
            <div class="post-audio">
                <iframe width="100%" height="100%" scrolling="no" frameborder="no" allow="autoplay" src="<?php echo esc_url($verum_media_src); ?>"></iframe>
            </div>
   <?php ?>
<?php
}
} elseif ('video' == get_post_format()) {
    $verum_media_src = get_post_meta(get_the_ID(), 'verum_media_url', true);
    if ($verum_media_src) {

        ?>
                                <div class="post-img position-relative">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail(verum_post_img_fixed())?></a>
                                    <a href="<?php echo esc_url($verum_media_src); ?>" class="play-btn popup-youtube">
                                    <i class="fa fa-play">
                                    </i></a>
                                    </div>

<?php
}
} elseif ('gallery' == get_post_format()) {
    $verum_gallery = get_post_meta(get_the_ID(), 'verum_gallery');
    $verum_gallery = array_filter($verum_gallery);
    $verum_gallery_type = get_post_meta(get_the_ID(), 'verum_gallery_type', true);

    if ($verum_gallery) {
        if ($verum_gallery_type == 'carousel') {
            echo '<div class="post-img">';
            echo '<div class="post_gallery owl-carousel owl-theme">';

            foreach ($verum_gallery as $verum_gallery_img) {
                $verum_gallery_img_url = wp_get_attachment_image_src($verum_gallery_img, 'large');

                ?>


                                    <div class="item">
                                        <a href="<?php the_permalink();?>"><img class="img-fluid" src="<?php echo esc_url($verum_gallery_img_url[0]); ?>" alt="<?php the_title();?>"/></a>
                                    </div>



<?php
}
            echo '</div>';
            echo '</div>';
        } elseif ($verum_gallery_type == 'justified') {
            echo '<div id="justified_gallery" class="post-img popup-gallery">';
            foreach ($verum_gallery as $verum_gallery_img) {
                $verum_gallery_img_url = wp_get_attachment_image_src($verum_gallery_img, 'medium');
                $verum_gallery_img_large_url = wp_get_attachment_image_src($verum_gallery_img, 'large');
                ?>

                                <a title="Title 2" href="<?php echo esc_url($verum_gallery_img_large_url[0]) ?>">
                                    <img alt="<?php the_title();?>" src="<?php echo esc_url($verum_gallery_img_url[0]) ?>"/>


       <?php
}
            echo '</div>';
        }
    }
}
?>