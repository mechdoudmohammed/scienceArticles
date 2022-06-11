<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['email'])){
    header('location:login');
}
if(isset($_SESSION['email']) && $_SESSION['role'] != 'admin'){
    header('Location:index');
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
                <h3><i class="fa fa-users"></i> All Users</h3>
                <table class="table">
                    <thead>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                   $results = $client->run('MATCH (u:user) RETURN u');
              
                   // A row is a CypherMap
                   foreach ($results as $result) {
                       // Returns a Node
                     
                       $node = $result->get('u');
                       
                       $category="";
                       $id = $node->getProperty('id');
                       $nom = $node->getProperty('nom');
                       $prenom = $node->getProperty('prenom');
                       $email = $node->getProperty('email');
                       $role = $node->getProperty('role');
                    ?>
                        <tr>
                            <td><?= $id;?></td>
                            <td><?= $nom;?></td>
                            <td><?= $prenom;?></td>
                            <td><?= $role;?></td>
                            <td><?= $email;?></td>
                            <td><a href="add_user?edit_user_id=<?= $id;?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="users?del_user_id=<?= $id;?>"><i class="fa fa-trash"></i></a></td>
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