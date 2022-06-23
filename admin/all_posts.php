<?php
use Laudis\Neo4j\Databags\Statement;
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['email'])){
    header('Location:login');
}
if(isset($_GET['del_post_id'])){
    $id_art=intval($_GET['del_post_id']);
    $rs=$client1->runStatements([
        Statement::create('MATCH (a:article{id:'.$id_art.'}) detach delete a')
    ]);
    header("Refresh:0");

}

?>
    <div class="container">
        <div class="row mt-2 mb-2">
            <div class="col-md-3">
                <?php
                require_once 'inc/sidebar.php';
                ?>
            </div>
            <div class="col-md-9">
                <?php
                require_once 'address.php';
                ?>
                <h3><i class="fa fa-file"></i> All Posts</h3>
                <?php
                $email=$_SESSION['email'];
                $results = $client->run('MATCH (u:user{email:"'.$email.'"})-[:publish]->(article) RETURN article');
              
                // A row is a CypherMap
                foreach ($results as $result) {
                    // Returns a Node
                  
                    $node = $result->get('article');
                    
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
                <form action="" method="post">
                

                <table class="table mt-5">
                    <thead>
                    <th><input type="checkbox" id="check_all_boxes"></th>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Tags</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width:5%"><input type="checkbox" name="checkbox[]" class="checkboxes" value="<?=$id?>"></td>
                        <td style="width:5%"><?= $id;?></td>
                        <td style="width:20%"><img src="../../scienceArticles/img/bg-img/<?= $image;?>" alt="" class="rounded-circle" style="width: 60px; height: 60px;"></td>
                        <td style="width:40%"><?= $title;?></td>
                        <td style="width:20%"><?= $category;?></td>
                        <td style="width:5%"><a href="add_post?edit_post_id=<?= $id;?>"><i class="fa fa-edit"></i></a></td>
                        <td style="width:5%"><a href="all_posts?del_post_id=<?= $id;?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
                    }
          
           
            ?>
                    </tbody>
                </table>
                </form>

            </div>
        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>
<script>
    $(document).ready(function () {
        $('#check_all_boxes').click(function () {
            if (this.checked){
                $('.checkboxes').each(function () {
                    this.checked = true;
                });
            }
            else{
                $('.checkboxes').each(function () {
                    this.checked = false;
                });
            }
        });
    });
</script>
