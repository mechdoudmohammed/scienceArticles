<?php
    require_once 'inc/head.php';
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
        
                </div>

                <!-- Hero Add -->
                <div class="col-12 col-lg-4">
                    <div class="hero-add">
                        <!-- <a href="#"><img src="img/bg-img/hero-add.gif" alt=""></a> -->
                            <amp-auto-ads type="adsense"
              data-ad-client="ca-pub-4511365991738945">
</amp-auto-ads>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <!-- Starting Posts -->
                <?php
                
                    require_once 'inc/starting-post.php';
                ?>
                <!-- Side Bar Area -->
                <div class="col-12 col-md-6 col-lg-4">
                <h3 style="background: #007bff;color: white;padding: 6px; font-size: 18px;border-radius: 10px;width: 78%;">Recommande article for you</h3>
                    <?php 
                        require_once 'inc/sidebar.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->

    <!-- ##### Popular News Area Start ##### -->
    <div class="recommande_author-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Popular News -->
                <?php
                    require_once 'inc/recommande_author.php';
                ?>
                <!-- Info News -->
                <?php
                    require_once 'inc/info-news.php';
                ?>
            </div>
        </div>
    </div>


    <!-- ##### Footer Area Start ##### -->
    <?php
        require_once 'inc/footer.php';
    ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <?php
        require_once 'inc/scripts.php';
    ?>