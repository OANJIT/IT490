<DOCTYPE html>
<html>

<div class="w3-container w3-cyan">
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

 	<head>
		<title>NJIT Bookies | Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

  	<body>
		<ul>
			<li style="color:green; border-right: 1px solid #bbb"><a href="index.html"><b>Home</b></a></li>
			<li><a href="register.html">Register</a></li>
			<li style="float:right" class="dropdown" >
			    <a href="#" class="dropbtn">Logged in as: <?php if (isset($username)) {echo "<b>$username<b>";} else {echo "<b>Anonymous<b>";}?></a>
			    <div class="dropdown-content">
			      <a href="login.html">Login</a>
			    </div>
			  </li>
		</ul>

		<br><br>

		<div>
			<h1>Login to place your bet!</h1>
			<form method="post" action="login.php">	
				<label for="username">Username</label>
				<input type="text" id="username" name="username"required/>

				<label for="password">Password</label>
				<input type="password" id="password" name="password" required>

				<input type="submit" value="Submit">
			</form>
		</div>
	</body>

<img src="football.jpg" alt="football" style="width:304px;height:228px;">
<img src="bball.jpeg" alt="bball" style="width:250px;height:228px;">
<img src="baseball.jpg" alt="baseball" style="width:250px;height:228px;">
</html>

