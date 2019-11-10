<?php
$verum_post_source = get_theme_mod('search_post_source', 'latest');
$verum_post_heading = get_theme_mod('search_heading', 'Latest');

?>

<div class="search-wrap">
    <div class="overlay">
        <?php
get_search_form();
?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-light search-blog-title"><?php _e("Latest Posts", "verum")?></h4>
                </div>
            </div>
        </div>
        <div class="search-blog-post">
            <div class="container">
                <div class="row">
                    <?php
if ('latest' == $verum_post_source) {

    $verum_latest_post_arg = array(
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'post_type' => 'post',
        'ignore_sticky_posts' => true,
    );

    $verum_latest_posts = new WP_Query($verum_latest_post_arg);
    while ($verum_latest_posts->have_posts()) {
        $verum_latest_posts->the_post();
        ?>
                    <div class="col-md-3">
                        <article class="post">
                            <div class="post-img">
                                <?php the_post_thumbnail('verum_medium')?>
                            </div>
                            <div class="post-header">
                                <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                                <div class="post-meta">
                                    <?php
$verum_categories = get_the_category();
        if ($verum_categories) {
            echo '<ul class="cat">';
            foreach ($verum_categories as $verum_category) {
                printf('<li><a href="%s">%s</a></li>', get_category_link($verum_category), $verum_category->name);
                break;

                ?>





                                    <?php }
            echo ' </ul>';
            ?>

                                    <div class="separation"></div>
                                    <?php }?>
                                    <div class="post-date">
                                        <a href="<?php the_permalink()?>"><?php echo get_the_date('j F Y'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php
}
    ;
    wp_reset_query();
} else {
    $verum_featured_post_id = get_theme_mod('search_featured_post');
    $verum_featured_post = array_column($verum_featured_post_id, 'post');
    $verum_featured_post_arg = array(

        'post_status' => 'publish',
        'post_type' => 'post',
        'ignore_sticky_post' => false,
        'post__in' => $verum_featured_post,
        'orderby' => 'post__in',
    );

    $verum_featured_posts = new WP_Query($verum_featured_post_arg);
    while ($verum_featured_posts->have_posts()) {
        $verum_featured_posts->the_post();
        ?>
                    <div class="col-md-3">
                        <article class="post">
                            <div class="post-img">
                                <?php the_post_thumbnail('verum_medium')?>
                            </div>
                            <div class="post-header">
                                <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                                <div class="post-meta">
                                    <?php
$verum_categories = get_the_category();
        if ($verum_categories) {
            echo '<ul class="cat">';
            foreach ($verum_categories as $verum_category) {
                printf('<li><a href="%s">%s</a></li>', get_category_link($verum_category), $verum_category->name);
                break;

                ?>





                                    <?php }
            echo ' </ul>';
            ?>

                                    <div class="separation"></div>
                                    <?php }?>
                                    <div class="post-date">
                                        <a href="<?php the_permalink()?>"><?php echo get_the_date('j F Y'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php
}
    ;
    wp_reset_query();
}

?>


                </div>
            </div>
        </div>
    </div>
</div>