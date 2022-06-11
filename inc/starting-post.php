
<div class="col-12 col-md-6 col-lg-8">
    <div class="row">
        <!-- Single Featured Post -->
    
            <?php
                $results = $client->run('MATCH (node:article) RETURN node');
              
                // A row is a CypherMap
                foreach ($results as $result) {
                    // Returns a Node
                  
                    $node = $result->get('node');
                    
                    $category="";
                    $id = $node->getProperty('id');
                    $author = $node->getProperty('author');
                    $title = $node->getProperty('titre');
                    $image = $node->getProperty('image');
                    $results2=$client2->run('match(n:article{id:'.$id.'})--(keywords) return keywords.label');

                    foreach ($results2 as $result2) {

                        $node2 = $result2->get('keywords.label');
     
                        $category=$category.' '.$node2;

                    }

           
            ?>
            <div class="col-6">
                <div class="single-blog-post featured-post">
                    <div class="post-thumb">
                        <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="" class="post-catagory"><?= $category;?></a>
                        <a href="single-post?post_id=<?= $id;?>" class="post-title">
                            <h6><?= $title;?></h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-author">By <a href="#"><?= $author;?></a></p>
                            <p class="post-excerp"></p>

                        </div>
                     </div>
                </div>
            </div>
            <?php
                    }
          
           
            ?>
       
        

      
    </div>
</div>