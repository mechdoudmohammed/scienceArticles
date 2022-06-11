    <!-- Single Featured Post -->
    <?php
    if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        //$results = $client->run('MATCH (u:user {email:"'.$email.'"})-[:publish]->(article)-[:has]->(k:keywords) match(a:article)-[:has]->(k) return a ,count(*) AS occurrence ORDER BY occurrence DESC LIMIT 5');
              
        $results = $client->run('MATCH (u:user {email:"'.$email.'"})-[:publish]->(article)-[:has]->(k:keywords) match(a:article)-[:has]->(k) match(u1:user)-[:publish]->(a) where not u1.email="'.$email.'" return u1,a ,count(*) AS occurrence ORDER BY occurrence DESC LIMIT 5');
        
        // A row is a CypherMap
        foreach ($results as $result) {
            // Returns a Node
          
            $node = $result->get('a');
            
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
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
        </div>
        <div class="post-data">
            <a href="catagories-post?cat_id=<?= $id;?>" class="post-catagory"><?= $title;?></a>
            <div class="post-meta">
            <h6 style="font-size: 13px;color: #007eff;">Tags:</h6>
                    <h6 style="font-size: 13px;color: #007eff;"><?= $category;?></h6>
              
               
            </div>
        </div>
    </div>
    <?php
         }
        
        }
    ?>
