<?php
    require_once 'inc/db.php';
    require_once 'inc/head.php';
    if(isset($_GET['post_id'])){

    }
    else{
        header('location:index.php');
    }

?>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <?php
            require_once 'inc/top-header.php';
        ?>

        <!-- Navbar Area -->
        <?php
            require_once 'inc/navbar.php';
        ?>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center">
                        <div class="news-title">
                            <p>Breaking News</p>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                <li><a href="#">Welcome to Colorlib Family.</a></li>
                                <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center mt-15">
                        <div class="news-title title2">
                            <p>International</p>
                        </div>
                        <div id="internationalTicker" class="ticker">
                            <ul>
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                <li><a href="#">Welcome to Colorlib Family.</a></li>
                                <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hero Add -->
                <div class="col-12 col-lg-4">
                    <div class="hero-add">
                        <a href="#"><img src="img/bg-img/hero-add.gif" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                     
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="catagories-post?cat_id=<?= $cat_id1;?>" class="post-catagory"><?= $category;?></a>
                                <a href="single-post?post_id=<?= $id;?>" class="post-title">
                                    <h6><?= $title;?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#"><?= $author;?></a></p>
                                    <p><?= $post_data;?></p>
                                    <a href="#" class="related--post">Related: Facebook announces changes to combat election meddling</a>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#"><?= $tags;?></a></li>
                                            </ul>
                                        </div>

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?= $views;?></span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About Author -->
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src="img/users/<?= $author_image;?>" alt="">
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name"><?= $author;?>, <span>The Author</span></a>
                                <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                            </div>
                        </div>
                 
                        <div class="pager d-flex align-items-center justify-content-between">
                            <div class="prev">
                                <a href="#" class="active"><i class="fa fa-angle-left"></i> previous</a>
                            </div>
                            <div class="next">
                                <a href="#">Next <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="section-heading">
                            <h6>Related</h6>
                        </div>

                        <div class="row">
                            <!-- Single Post -->
                          
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="catagories-post?cat_id=<?= $cat_id2;?>" class="post-catagory"><?= $category;?></a>
                                        <a href="single-post?post_id=<?= $id;?>" class="post-title">
                                            <h6><?= $title;?></h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?= $views;?></span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">


                            <ol>
                                <!-- Single Comment Area -->

                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="img/bg-img/<?= $comment_author_image;?>" alt="Author Image">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-author"><?= $comment_author;?></a>
                                            <a href="#" class="post-date"><?= $comment_month.' '.$comment_day.','.$comment_year;?></a>
                                            <p><?= $comment_data;?></p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                          
                        </div>
                     
                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Leave a comment</h4>
                         
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name*">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="web" id="subject" placeholder="Website">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <input  class="btn newspaper-btn mt-30 w-100" name="submit_comment" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">

                            <!-- Single Featured Post -->
                            <?php
                                require_once 'inc/sidebar.php';
                            ?>
                        </div>

                        <!-- Popular News Widget -->
                        <?php
                            require_once 'inc/4-most-popular-posts.php';
                        ?>

                        <!-- Newsletter Widget -->
                        <?php
                            require_once 'inc/newsletter.php';
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
        require_once 'inc/footer.php';
    ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <?php

        require_once 'inc/scripts.php';
    ?>

