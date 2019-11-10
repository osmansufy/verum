 <!-- tags and share start-->
 <div class="meta-row">
                                    <div class="meta-tags">
									<?php
the_tags('<span>Tags:</span>', ' ')
?>


                                    </div>
                                    <div class="meta-share">
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>

                                        </div>
                                        <div class="share-btn"><i class="fa fa-share-alt pr-2"></i> Share</div>
                                    </div>
                                </div>
                                <!-- tags and share end-->

                                <!--custom pagination-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="custom-pagination custom-pagination-post">
                                            <div class="older full-">

												<?php previous_post_link('%link', '<span class="next-post-pagination">%title</span><i class="float-right fa fa-angle-right"></i>')?>
                                            </div>
                                            <div class="newer">

												<?php next_post_link('%link', '<i class="fa fa-angle-left"></i><span class="prev-post-pagination">%title</span>')?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--custom pagination-->

                                <!--author info start-->
                                <div class="post-author-info">
                                    <div class="author-thumb">
                                        <img class="img-fluid" src="assets/img/author.jpg" alt=""/>
                                    </div>
                                    <div class="author-details mt-3">
                                        <h5><a href="#">Maria Garcia</a></h5>
                                        <p>Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do. Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue.</p>
                                        <div class="s-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--author info end-->