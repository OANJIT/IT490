<?php
	try{
		require_once('../path.inc');
		require_once('../get_host_info.inc');
		require_once('../rabbitMQLib.inc');
		
		$client = new rabbitMQClient("RabbitMQ.ini","BackendServer");

		$request = array();
		$request['type'] = "register";
		$request['password'] = $_POST["password"];
		$request['email'] = $_POST["email"];
		$request['firstName'] = $_POST["firstName"];
		$request['lastName'] = $_POST["lastName"];
			
		$response = $client->send_request($request);		

	}catch(Exception $e){
		echo $e->getMessage();
	}
?>

<html>
	<head>
		<meta charset="utf-8">		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NJIT Bookies | Register Failed</title>
		<link rel="stylesheet" type="text/css" href="../style.css">		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	</head>

	<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
			  <a class="navbar-brand" href="index.php">NJIT Bookies</a>
			</div>
			<ul class="nav navbar-nav">
			  <li><a href="../index.php">Home</a></li>			  
			  <li><a href="../games.php">Games</a></li>
			</ul>	
			<ul class="nav navbar-nav navbar-right">
				<?php
					if (isset($_SESSION['username'])) {
						echo '<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>' . $_SESSION['username'] . '</a></li>    
						<li><a href="./scripts/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>';
					}
					else {
						echo '<li class="active"><a href="register.php">Register</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
					}
				?>
			</ul>
		</div>
	</nav>		
	<div class="container">
		<div class="page-header">
			<h1>Register</h1>
		</div>
		<?php
			if ($response != "1")
			{
				session_start();
				echo $response;
				$_SESSION["username"] = $response;
			header("Location: ../profile.php");
			}

			if ($response == "1")
			{
				echo '<div class="alert alert-danger">Account could not be created. Email address is already in use.</div>';
				echo '<div class="text-center"><a href=../register.html>Go Back</a></div>';
				header('Refresh: 3; url = ../register.php');
			}

		?>
	</div>
	</body>
</html>
