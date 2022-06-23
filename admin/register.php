<?php
    require_once 'inc/head.php';
    if(isset($_SESSION['email'])){
        header('Location:index');
    }

    if (isset($_POST['login'])){
		if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$results_id = $client2->run('match(u:user) return u, u.id as id,u.email as email order by u.id desc limit 1');
			foreach ($results_id as $result_id) {
				$node = $result_id->get('u');
				$id_user=$node->getProperty('id');

			}
			$results_email = $client1->run('match(u:user) return u,u.email as email');
			foreach ($results_email as $result_email) {
				$node1 = $result_email->get('u');
				$email_old=$node1->getProperty('email');
				if($email==$email_old){
					setcookie("msg", "compte deja existe", time() + (20), "/");
					header("Refresh:0");
					die();
				}
			}
			$id_user+=1;
			$results = $client->run('merge (n:user {id: '.$id_user.', email:"'.$email.'",nom:"'.$nom.'",prenom:"'.$prenom.'",role:"author",password:"'.$password.'"});');
					// A row is a CypherMap

					setcookie("msg", "Votre compte est ajouter avec success", time() + (20), "/");
					header('location:login');
			}
			else{
				header('location:register');
			}
     
   
    }
?>
<head>
	<title>S'inscrire</title>
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
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
				echo('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$_COOKIE['msg'].'</div>');
}
					?>
					<span class="login100-form-title">
					S'inscrire
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid nom is required: ex@abc.xyz">
						<input class="input100" type="text" name="nom" placeholder="nom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid prenom is required: ex@abc.xyz">
						<input class="input100" type="text" name="prenom" placeholder="prenom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

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
						S'inscrire
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login">
							Connectez-vous!
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