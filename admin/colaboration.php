<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['email'])){
    header('Location:login');
}

if(isset($_POST['btn_accepte_colabor'])){
    $id_user_colabor=$_POST['btn_accepte_colabor'];
    $id=$_SESSION['id'];
   $client->run('match(u:user{id:'.$id_user_colabor.'})-[old:RequestColabor]->(u2:user{id:'.$id.'}) merge (u)-[new:colabor]->(u2) delete old');
}
if(isset($_POST['btn_refuse_colabor'])){
    $id_user_colabor=$_POST['btn_refuse_colabor'];
    $id=$_SESSION['id'];
   $client->run('match(u:user{id:'.$id_user_colabor.'})-[old:RequestColabor]->(u2:user{id:'.$id.'}) delete old');
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
                <h3><i class="fa fa-file"></i> Invitation Colaborator</h3>
                <?php
                
                $id=$_SESSION['id'];
                $results = $client->run('match(user)-[:RequestColabor]->(u:user{id:'.$id.'}) return user,count(user) as count_user');
                // A row is a CypherMap
                foreach ($results as $result) {
                    // Returns a Node
                    $node0 = $result->get('count_user');
                    $node = $result->get('user');
                    if(isset($node0)){
                        
                        $id = $node->getProperty('id');
                        $nom = $node->getProperty('nom');
                        $prenom = $node->getProperty('prenom');

                    }else{
                        break;
                    }
                    

                  

            ?>
                <form action="" method="post">
                

                <table class="table mt-5">
                    <thead>
                    <th><input type="checkbox" id="check_all_boxes"></th>
                    <th>id</th>
                    <th>nom prenom</th>
                    <th>object</th>
                    <th>accepter</th>
                    <th>refuser</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width:5%"><input type="checkbox" name="checkbox[]" class="checkboxes" value="<?=$id?>"></td>
                        <td style="width:5%"><?= $id?></td>
                        <td style="width:20%"><?= $nom.' '.$prenom?></td>
                        <td style="width:20%">demande de colaboration</td>
                        <td style="width:20%">
                        <form action="" method="post">
                            <button name="btn_accepte_colabor" value="<?= $id;?>" style="background: #28a795;border: none; color: white;padding: 6px;border-radius: 8px;"><i class="fa fa-edit"></i> Accepter</button>
                        </form>
                        <!-- <a href="add_post?edit_post_id="><i class="fa fa-edit"></i></a> -->
                        </td>
                        <td style="width:20%">
                        <form action="" method="post">
                            <button name="btn_refuse_colabor" value="<?= $id;?>" style="background: #28a795;border: none;color: white;padding: 6px;border-radius: 8px;"><i class="fa fa-trash"></i> Refuser</button>
                        </form></td>
                        <!-- <td style="width:5%"><a href="all_posts?del_post_id=<?= $id;?>"><i class="fa fa-trash"></i></a></td> -->
                    </tr>
                    <?php
                    }
            ?>
                    </tbody>
                </table>
                </form>
                
                <h3><i class="fa fa-file"></i> List of Colaborator with you</h3>
                <?php
                
                $id=$_SESSION['id'];
             //match(u:user{id:'.$id.'})-[:Colabor]->(u2:user) return u2
                $results = $client->run('match(u2:user)-[:colabor]->(u:user{id:'.$id.'}) return u2,count(u2) as count_user');
                // A row is a CypherMap
                foreach ($results as $result) {
                    // Returns a Node
                    $node0 = $result->get('count_user');
                    $node = $result->get('u2');
                    if(isset($node0)){
                        
                        $id = $node->getProperty('id');
                        $nom = $node->getProperty('nom');
                        $prenom = $node->getProperty('prenom');

                    }else{
                        break;
                    }
                    

                  

            ?>

                <table class="table mt-5">
                    <thead>
                    <th><input type="checkbox" id="check_all_boxes"></th>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Titre</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width:5%"><input type="checkbox" name="checkbox[]" class="checkboxes" value="<?=$id?>"></td>
                        <td style="width:5%"><?= $id?></td>
                        <td style="width:40%"><?= $nom.' '.$prenom?></td>
                        <td style="width:40%">Est un colabor avec vous</td>

                    </tr>
                    <?php
                    }
            ?>
                    </tbody>
                </table>

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
