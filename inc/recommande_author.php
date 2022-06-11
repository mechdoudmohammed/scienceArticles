<div class="col-12 col-lg-8">
    <div class="section-heading">
        <h6>Recommande author</h6>
    </div>

    <div class="row">

        <!-- Single Post -->
        <?php
if(isset($_POST['btn_colabor']) && isset($_SESSION['email'])){
    $id_current_user=$_SESSION['id'];
    $id_col=$_POST['btn_colabor'];
    $results = $client2->run('match(u:user{id:'.$id_col.'})
    match(u1:user{id:'.$id_current_user.'})
    merge(u1)-[:RequestColabor]->(u)');
    // $results = $client1->run('match(u:user{id:'.$id_col.'})
    // match(u1:user{id:'.$id_current_user.'})
    // merge(u)-[:RequestColabor]->(u1)
    // where (u)-[:colabor]->(u1) and not (u1)-[:colabor]->(u)
    // ');
}

        if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
  $results = $client->run('MATCH (u:user)-[:publish]->(article)-[:has]->(k:keywords) match(u1:user)-[:publish]->(article)-[:has]->(k) return distinct u1');
                
             

                  

  
  // A row is a CypherMap
  foreach ($results as $result) {
      // Returns a Node
      $find=false;
      $node = $result->get('u1');
      $id = $node->getProperty('id');
      $author = $node->getProperty('nom') .' '. $node->getProperty('prenom');
      $email = $node->getProperty('email');

      $id_curn=$_SESSION['id'];
      $results1 = $client2->run('match(u2:user)-[:colabor]->(u:user{id:'.$id_curn.'}) return u2,count(u2) as count_user');

      foreach ($results1 as $result1) {
          // Returns a Node
          $node0 = $result1->get('count_user');
          $node = $result1->get('u2');
          if(isset($node0)){
              $id1 = $node->getProperty('id');

          }else{
              break;
          }
          if($id==$id1){
              $find=true;
          }
        }

      //$image = $node->getProperty('image');

      if($email==$_SESSION['email']){
        continue;  
      }
      if($find==true){
        continue;  
      }

    ?>
        <div class="col-12 col-md-6">
            <div class="single-blog-post style-3">
    
                <div class="post-data">
                <div class="post-thumb">
                        <a href="single-post?post_id=<?= $id;?>"><img src="img/users/925t4.jpg" alt="" style="    width: 97px;border-radius: 31px;display: inline-flex;"></a>
                  
                    <a href="" class="post-catagory"><?= $author;?></a>
                    <a href="single-post?post_id=<?= $id;?>" class="post-title">
                        <?= $email;?>
                    </a>
                    <form action="" method="post">
                    <button type="submit" name="btn_colabor" value="<?=$id;?>" 
                    style="cursor: pointer;background: #28a745;border: none;color: white;padding: 4px;border-radius: 10px;width: 33%;">
                    invite to colabor</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>


    </div>
</div>