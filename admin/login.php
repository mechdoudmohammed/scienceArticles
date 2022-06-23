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
<head>
	<title>Connecter-Vous</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="">
					<?php 
if(isset($_COOKIE['msg'])){
				echo('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$_COOKIE['msg'].'</div>');
}
					?>
					<span class="login100-form-title">
						Connecter-Vous!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register">
							Créer un compte!
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>