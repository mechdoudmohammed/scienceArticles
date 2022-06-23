<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
require_once($_SERVER['DOCUMENT_ROOT']."/scienceArticles/vendor/autoload.php");
 use Laudis\Neo4j\Authentication\Authenticate;
 use Laudis\Neo4j\ClientBuilder;
 use Laudis\Neo4j\Contracts\TransactionInterface;
 use Laudis\Neo4j\Databags\Statement;

try{
    $auth = Authenticate::basic('neo4j', '123456');
    $client = ClientBuilder::create()
                ->withDriver('neo4j', 'neo4j://localhost:7687',  $auth)
                ->build();
     }catch(PDOException $e){
       // echo("no connect");
     }
     try{
        $auth = Authenticate::basic('neo4j', '123456');

        $client1 = ClientBuilder::create()
                    ->withDriver('neo4j', 'neo4j://localhost:7687',  $auth)
                    ->build();
         }catch(PDOException $e){
           // echo("no connect");
         }

?>
    <div class="container">
        <div class="row mt-2 mb-2">
            <div class="col-md-3">
                <?php
                require_once 'inc/sidebar.php';
                ?>
            </div>
            <div class="col-md-5">
                <?php
                    require_once 'address.php';
                ?>
                <?php
                              
                if(isset($_POST['submit_post'])){
                
                    $titre = $_POST['title'];
                    $label = $_POST['tags'];
                    $des=$_POST['des'];
                    $image = $_FILES['pic']['name'];
                    $temp = $_FILES['pic']['tmp_name'];
                    $date = time();
                    $unique = substr($date,7,3);
                    $image = $unique.$image;
                    $author=$_SESSION['author'];
                    $id=$_SESSION['id'];
                    $email=$_SESSION['email'];
                    $nom=$_SESSION['nom'];
                    $password=$_SESSION['password'];
                    $prenom=$_SESSION['prenom'];
                    $role=$_SESSION['role'];

                    $results_id = $client->run('match(u:article) return u, u.id as id order by u.id desc limit 1');
                    foreach ($results_id as $result_id) {

                        $node = $result_id->get('u');
                        $id_art=$node->getProperty('id');

                    }
                    $id_art+=1;
                    $arr_tags=explode(",",$label);
            

                    for($i=0;$i<sizeof($arr_tags);$i++){
                        $label=$arr_tags[$i];
                        if($i==0){
                           $client->run(
                               '
                                MERGE (a:article {titre: $titre,image:$image,author:$author,id:$id_art,description:$des})
                                MERGE(k:keywords {label:  $label})
                                MERGE(u:user {id: $id,email:$email,nom:$nom,password:$password,prenom:$prenom,role:$role})
                                merge(u)-[:publish]->(a)
                                merge(a)-[:has]->(k)',
                                ['titre' => $titre,'image'=>$image,'author'=>$author,'label'=> $label,'id'=>$id,'email'=>$email,'nom'=>$nom,'password'=>$password,'prenom'=>$prenom,'role'=>$role,'id_art'=>$id_art,'des'=>$des]
                            );
                            
                        }
                        if($i==1){
                            $client1->run(
                                '
                                MERGE (a:article {titre: $titre,image:$image,author:$author,id:$id_art,description:$des})
                                MERGE(k:keywords {label:  $label})
                                MERGE(u:user {id: $id,email:$email,nom:$nom,password:$password,prenom:$prenom,role:$role})
                                merge(u)-[:publish]->(a)
                                merge(a)-[:has]->(k)',
                                ['titre' => $titre,'image'=>$image,'author'=>$author,'label'=> $label,'id'=>$id,'email'=>$email,'nom'=>$nom,'password'=>$password,'prenom'=>$prenom,'role'=>$role,'id_art'=>$id_art,'des'=>$des]
                            );
                        }
                        if($i==2){
                            $client1->run(
                                '
                                MERGE (a:article {titre: $titre,image:$image,author:$author,id:$id_art,description:$des})
                                MERGE(k:keywords {label:  $label})
                                MERGE(u:user {id: $id,email:$email,nom:$nom,password:$password,prenom:$prenom,role:$role})
                                merge(u)-[:publish]->(a)
                                merge(a)-[:has]->(k)',
                                ['titre' => $titre,'image'=>$image,'author'=>$author,'label'=> $label,'id'=>$id,'email'=>$email,'nom'=>$nom,'password'=>$password,'prenom'=>$prenom,'role'=>$role,'id_art'=>$id_art,'des'=>$des]
                            );
                        }
                        if($i==3){
                            $client1->run(
                                '
                                MERGE (a:article {titre: $titre,image:$image,author:$author,id:$id_art,description:$des})
                                MERGE(k:keywords {label:  $label})
                                MERGE(u:user {id: $id,email:$email,nom:$nom,password:$password,prenom:$prenom,role:$role})
                                merge(u)-[:publish]->(a)
                                merge(a)-[:has]->(k)',
                                ['titre' => $titre,'image'=>$image,'author'=>$author,'label'=> $label,'id'=>$id,'email'=>$email,'nom'=>$nom,'password'=>$password,'prenom'=>$prenom,'role'=>$role,'id_art'=>$id_art,'des'=>$des]
                            );
                        }
                  

                    }

                  
                    $success_msg1 = '<span class="text-success">Post Submitted Successfully</span>';
                    move_uploaded_file($temp,"../img/bg-img/".$image);
                    header('refresh:3;url=add_post');
                  
                    if(empty($titre) || empty($image) || empty($label) || empty($des)){
                        $error_message1 = '<span class="text-danger">All * Fields are required</span>';
                    }else{
                        $error_message1 = '<span class="text-success">Post Submitted Successfully</span>';
                    }
            
                      
                 

                    
                }
                ?>
                <h3><i class="fa fa-file"></i>Ajouter l'article</h3>
                <hr>
                <h6>Required <i class="text-danger">*</i></h6>

                <?php
                    if (isset($error_message1)){
                        echo $error_message1;
                    }
                    elseif (isset($success_msg1)){
                        echo $success_msg1;
                        header('Refresh:3');
                    }
                    elseif (isset($success_msg_update)){
                        echo $success_msg_update;
                        header("refresh:3;url=all_posts");
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title <i class="text-danger">*</i></label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php if (isset($title)){echo $title;}?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tags <span style="color:#005cbf">(Max 4 Tags)</span> <i class="text-danger">*</i></label>
                        <input type="text" name="tags" class="form-control" placeholder="Tags" value="<?php if (isset($tags)){echo $tags;}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Picture <i class="text-danger">*</i></label>
                        <input type="file" name="pic" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label>Text de l'article <i class="text-danger">*</i></label>
                        <textarea name="des" class="form-control" rows="12" value="" required ><?php if (isset($des)){echo $des;}?></textarea>
                    </div>
                    <input type="submit" class="btn btn-success rounded-0" name="submit_post" value="Add Post" >
                </form>
            </div>
        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>