<?php
$verum_banner_display = get_theme_mod('banner_display', true);
?>
<?php
if ($verum_banner_display) {

    ?>

<!--hero start-->
<div class="js_hero_slider owl-carousel owl-theme">
    <div class="item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-1.jpg" alt="" />
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <article class="post text-center">
                                <div class="post-header">
                                    <ul class="cat">
                                        <li><a href="#">Travel</a></li>
                                        <li><a href="#">Lifestyle</a></li>
                                    </ul>
                                    <h2><a href="#">Picturesque Trip of a Lifetime in Egypt</a></h2>
                                    <div class="post-date"><a href="#">28th June 2018</a></div>
                                </div>
                                <div class="post-blog">
                                    <p>She has previously sung about her love for New York, and it looks like one North
                                        African nation is also inspiring poetry in Alicia Keys...</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-2.jpg" alt="" />
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <article class="post text-center">
                                <div class="post-header">
                                    <ul class="cat">
                                        <li><a href="#">Lifestyle</a></li>
                                    </ul>
                                    <h2><a href="#">Alicia Keys is on the Picturesque Trip ..</a></h2>
                                    <div class="post-date"><a href="#">28th June 2018</a></div>
                                </div>
                                <div class="post-blog">
                                    <p>Previously sung about her love for New York, and it looks like one North African
                                        nation is also inspiring poetry in Alicia Keys...</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-3.jpg" alt="" />
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <article class="post text-center">
                                <div class="post-header">
                                    <ul class="cat">
                                        <li><a href="#">Sports</a></li>
                                        <li><a href="#">Game</a></li>
                                    </ul>
                                    <h2><a href="#">Haifaa Al Mansour Brings a New Tale</a></h2>
                                    <div class="post-date"><a href="#">28th June 2018</a></div>
                                </div>
                                <div class="post-blog">
                                    <p>She has previously sung about her love for New York, and it looks like one North
                                        African nation is also inspiring poetry in Alicia Keys...</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--hero end-->
<?php
}
?>