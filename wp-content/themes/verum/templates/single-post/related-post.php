
<div class="row related-post">
                            <div class="col-12 text-center">
                                <h2 class="post-single-title">You may also like</h2>
                            </div>
                            <?php
$verum_tag_ids = array();
$verum_tags = wp_get_post_tags(get_the_ID());
if ($verum_tags) {

    foreach ($verum_tags as $verum_tag) {
        $verum_tag_ids[] = $verum_tag->term_id;
    }
}
;
$verum_argumets = array(
    'posts_per_page' => 3,
    'tag__in' => $verum_tag_ids,
    'post__not_in' => array(get_the_ID()),
    'caller_get_posts' => true,
);
$verum_related_post = new WP_Query($verum_argumets);
while ($verum_related_post->have_posts()) {
    $verum_related_post->the_post();
    ?>

                            <div class="col-lg-4 col-md-6">
                                <article class="post">
                                    <div class="post-img">
                                        <a href="<?php the_permalink()?>"><?php the_post_thumbnail('verum_medium');?></a>
                                    </div>
                                    <div class="post-header">
                                        <h3><a href="#"><?php the_title()?></a></h3>
                                        <div class="post-meta">
                                        <?php
$verum_categories = get_the_category();
    if ($verum_categories) {
        echo '<ul class="cat">';
        foreach ($verum_categories as $verum_category) {
            printf('<li><a href="%s">%s</a></li>', get_category_link($verum_category), $verum_category->name);

            ?>





    <?php }
        echo ' </ul>';
        ?>
    <div class="separation"></div>
<?php }?>

                                            <div class="post-date"><a href="<?php the_permalink();?>"><?php echo get_the_date('jS F Y'); ?></a></div>
                                        </div>
                                    </div>

                                </article>
                            </div>
                            <?php }
wp_reset_query();
?>

                        </div>
