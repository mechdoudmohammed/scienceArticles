<?php
    require_once 'inc/head.php';
    if(isset($_SESSION['email'])){
        header('Location:index');
    }

    if (isset($_POST['login'])){

        $username = $_POST['email'];
        $password = md5($_POST['password']);
        //$password = md5($password);

        $results = $client->run('MATCH (node:user) RETURN node');
                // A row is a CypherMap
                foreach ($results as $result) {
                    // Returns a Node
                    $node = $result->get('node');

                    if($username==$node->getProperty('email') && $password == $node->getProperty('password')){
                        $_SESSION['email'] = $node->getProperty('email');
                        $_SESSION['role'] = $node->getProperty('role');
                        $_SESSION['author']=$node->getProperty('nom');
                        $_SESSION['nom']=$node->getProperty('nom');
                        $_SESSION['prenom']=$node->getProperty('prenom');
                        $_SESSION['id']=$node->getProperty('id');
                        $_SESSION['password']=$node->getProperty('password');
                        header('Location:all_posts');
                    }     else{
                         $error = "Data Not Matched";
                      }

                }

     
   
    }
?>
<body class="bg-secondary">
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-4 offset-4 mt-5">
            <form action="" class="border  mt-5 p-3" method="post">
                <h4 class="text-light">Login <span class="float-right text-danger"><?php if(isset($error)){echo $error;}?></span></h4>
                <div class="form-group">
                    <label  class="text-light">Email:</label>
                    <input type="text" name="email" class="form-control">
                    <label for="" class="text-light">Password</label>
                    <input type="password" name="password" class="form-control">
                    <input type="submit" value="Login" name="login" class="btn btn-success mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>