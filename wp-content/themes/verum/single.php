<?php
get_header('single');
the_post();
$verum_sidber_positions = get_theme_mod('verum_sideber_positions', 'no');
$verum_container_class = 'no' == $verum_sidber_positions ? 'col-lg-10 col-md-8' : 'col-lg-9 col-md-8';
$verum_container_row_class = 'no' == $verum_sidber_positions ? 'justify-content-md-center' : '';
$verum_sidber_border = 'right' == $verum_sidber_positions ? 'side-border' : '';
?>
    <!--post start-->
    <div class="container">
        <div class="row <?php echo esc_attr($verum_container_row_class) ?>">
<?php
if ('left' == $verum_sidber_positions) {
    get_sidebar();
}
?>
            <div class="<?php echo esc_attr($verum_container_class) ?>> <?php echo esc_attr($verum_sidber_border) ?>">
                <div class="row">
                    <div class="col-md-12">
                    <?php
if ('quote' == get_post_format()) {
    get_template_part('templates/single-post/post', 'quote');
    get_template_part('templates/single-post/post', 'footer');
} else {

    ?>

                        <article <?php post_class()?>>
                            <?php get_template_part('templates/single-post/post', 'header')?>
							<?php get_template_part('templates/single-post/title', 'meta');?>
                            <div class="post-blog">
								<?php
the_content();
    ?>


<?php get_template_part('templates/single-post/post', 'footer');?>

                            </div>
                        </article>
                        <?php
}
?>

                        <!--related post start-->
                        <?php get_template_part('templates/single-post/related', 'post');?>
                        <!--related post end-->

                        <!--comments area start-->
                        <div class="comments">
                            <h2 class="comments-title"> Comments</h2>
                            <ul>
                                <li class="comment ">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author">
                                                <img alt="" src="assets/img/a0.jpg" class="">
                                                <b class="fn">
                                                    <a href="#" rel="external nofollow" class="url">
                                                        Chris Ames
                                                    </a>
                                                </b>
                                                <span class="says">says:</span>
                                            </div>
                                            <!-- .comment-author -->

                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <time datetime="2018-09-02T12:17:07+00:00">
                                                        September 2, 2018 at 12:17 pm
                                                    </time>
                                                </a>
                                            </div><!-- .comment-metadata -->

                                        </footer><!-- .comment-meta -->

                                        <div class="comment-content">
                                            <p>Hi, this is a comment.<br>
                                                To get started with moderating, editing, and deleting comments, please visit
                                                the Comments screen in the dashboard.<br>
                                                Commenter avatars come from <a href="#">Gravatar</a>.</p>
                                        </div><!-- .comment-content -->

                                        <div class="reply">
                                            <a rel="nofollow" class="comment-reply-link" href="#" >Reply</a>
                                        </div>
                                    </article><!-- .comment-body -->
                                    <ul class="children">
                                        <li class="comment ">
                                            <article class="comment-body">
                                                <footer class="comment-meta">
                                                    <div class="comment-author ">
                                                        <img alt="" src="assets/img/a1.jpg" class="" >
                                                        <b class="fn">
                                                            <a href="#" rel="external nofollow" class="url">Jones Brown</a>
                                                        </b>
                                                        <span class="says">says:</span>
                                                    </div><!-- .comment-author -->

                                                    <div class="comment-metadata">
                                                        <a href="#">
                                                            <time datetime="2018-10-16T13:13:25+00:00">
                                                                October 16, 2018 at 1:13 pm
                                                            </time>
                                                        </a>
                                                    </div><!-- .comment-metadata -->

                                                </footer><!-- .comment-meta -->

                                                <div class="comment-content">
                                                    <p>Hi, this is a comment.<br>
                                                        To get started with moderating, editing, and deleting comments,
                                                        please visit the Comments screen in the dashboard.<br>
                                                        Commenter avatars</p>
                                                </div><!-- .comment-content -->

                                                <div class="reply">
                                                    <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                                </div>
                                            </article><!-- .comment-body -->
                                        </li><!-- #comment-## -->
                                    </ul><!-- .children -->
                                </li><!-- #comment-## -->
                            </ul>
                        </div>
                        <!--comments area end-->

                        <!--comment form start-->
                       <?php
comments_template();
?>
                        <!--comment form end-->
                    </div>
                </div>
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