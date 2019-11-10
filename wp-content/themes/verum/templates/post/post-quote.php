 <?php
$verum_quote_img = get_template_directory_uri() . "/assets/img/b9.jpg";
if (has_post_thumbnail()) {
    $verum_quote_img = get_the_post_thumbnail_url('medium');
}
?>




                        <article <?php post_class('post-quote d-flex align-items-center')?> style="background-image: url(<?php echo esc_url($verum_quote_img); ?>)">
                            <div class="post-header">
                                <h3><?php the_content();?></h3>
                                <div class="mb-3"><?php the_author_posts_link();?></div>
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
                                    <div class="post-date"><a href="<?php the_permalink()?>"><?php echo get_the_date('jS F Y') ?></a></div>

                            </div>
                            </div>
                        </article>
