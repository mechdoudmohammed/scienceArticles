<?php
    require_once 'inc/db.php';
    require_once 'inc/head.php';
    if(isset($_GET['post_id'])){

    }
    else{
        header('location:index.php');
    }
    $id_art=$_GET['post_id'];

                $results = $client->run('MATCH (n:article) where n.id='.intval($id_art).' RETURN n');
                $author_image="img/users/925t4.jpg";
                // A row is a CypherMap
                foreach ($results as $result) {
                    // Returns a Node
                  
                    $node = $result->get('n');
                    
                    $tags="";
                    $id = $node->getProperty('id');
                    $author = $node->getProperty('author');
                    $title = $node->getProperty('titre');
                    $image = $node->getProperty('image');
                    $post_data=$node->getProperty('description');

                    $results2=$client2->run('match(n:article{id:'.$id.'})--(keywords) return keywords.label');

                    foreach ($results2 as $result2) {

                        $node2 = $result2->get('keywords.label');
                     if(isset($node2)){
                         $tags=$tags.' , '.$node2;
                            $tags=substr($tags,1);
                     }
                         
                        

                    }
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
                                <a href="single-post?post_id=<?= $id;?>" class="post-title">
                                    <h6><?= $title;?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#"><?= $author;?></a></p>
                                    <p><?= $post_data;?></p>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#"><?= $tags;?></a></li>
                                            </ul>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About Author -->
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src=<?= $author_image;?> alt="">
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name"><?= $author;?>, <span>L'auteur de l'article</span></a>
                                <p>Une description d'auteur ici</p>
                            </div>
                        </div>
                 
                        <div class="pager d-flex align-items-center justify-content-between">
                            <div class="prev">
                                <a href="#" class="active"><i class="fa fa-angle-left"></i> précédent</a>
                            </div>
                            <div class="next">
                                <a href="#">Suivant <i class="fa fa-angle-right"></i></a>
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
                        <h3 style="background: #007bff;color: white;padding: 6px; font-size: 18px;border-radius: 10px;width: 78%;">Recommande article pour vous:</h3>

    <?php
    $lbl=explode(",",$tags);


        $results = $client2->run('MATCH (a)-[:has]->(k:keywords) where k.label="'.trim($lbl[1]).'" return a,k  LIMIT 5');
        
        // A row is a CypherMap
        foreach ($results as $result) {
            // Returns a Node
          
            $node = $result->get('a');
            $id = $node->getProperty('id');
            $author = $node->getProperty('author');
            $title = $node->getProperty('titre');
            $image = $node->getProperty('image');
        
      
    
   
    ?>
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
        </div>
        <div class="post-data">
            <a href="catagories-post?cat_id=<?= $id;?>" class="post-catagory"><?= $title;?></a>
            <div class="post-meta">
            </div>
        </div>
    </div>
    <?php
         }
        
        
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
