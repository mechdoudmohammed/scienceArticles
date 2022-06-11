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

                      
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt="" style="width: 100%; height: 400px;"></a>
                            </div>
                            <div class="post-data">
                                <a href="catagories-post?cat_id=<?= $cat_id1;?>" class="post-catagory"><?= $category;?></a>
                                <a href="single-post?post_id=<?= $id;?>" class="post-title">
                                    <h6><?= $title;?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#"><?= $author;?></a></p>
                                    <p class="post-excerp"><?= $post_data;?></p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?= $views;?></span></a>
                                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination mt-50">
                            <?php for($i=1;$i<=$pages;$i++){?>
                            <li class="page-item <?=(($page == $i)?'active':'')?>">
                                <a class="page-link" href="catagories-post?cat_id=<?=$cat_id?>&page_id=<?= $i?>"><?= $i?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </nav>
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