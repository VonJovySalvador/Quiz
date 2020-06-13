<?php
include_once('config.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="center_box" align="center">
		<h4 style="font-size: 5vh;">REGISTER</h4>
		<form action ="registration.php" method ="post">
			<input type="text" name="name" placeholder="Full Name" required>
			<br>
			<input type="text" name="username" placeholder="Username" required>
			<br>
			<input type="password" name="password" placeholder="Password" required>
			<br>
			<input type="submit" name="register" value="Register">
		</form>
		<h4 style="font-size: 2vh;">Already has an account?
			<a href="home.php">Log In</a>
		</h4>
	</div>

	<?php
		if (isset($_POST['register'])){
			$name 		= $_POST ['name'];
			$username 	= $_POST['username'];
			$password 	= $_POST ['password'];

			$sql = "SELECT * FROM accounts WHERE username = '$username'";
			$result = $con->query($sql);

			if ($result->num_rows > 0){
				echo '
			        <script type="text/javascript">
						$(function callalert(uid=""){
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "Account already exist",
							})
						})
					</script>
				';
			} else{
				$sql = "INSERT INTO accounts (username, password, name) VALUES ('$username', '$password', '$name')";

				if ($con->query($sql) === TRUE){
		            echo '
			           	<script type="text/javascript">
							window.location = "home.php";
						</script>
					';
		        } else{
		            echo '
			            <script type="text/javascript">
							$(function callalert(uid=""){
								Swal.fire({
									icon: "error",
									title: "Oops...",
									text: "Something went wrong!",
								})
							})
						</script>
					';
		        }
			}
		}
	?>
</body>
</html>
