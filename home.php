<?php
include_once('config.php');
session_start();
$_SESSION['aid'] = "";
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
		<h4 style="font-size: 5vh;">Please Log In</h4>
		<form action ="home.php" method ="post">
			<input type="text" name="username" placeholder="Username" required>
			<br>
			<input type="password" name="password" placeholder="Password" required>
			<br>
			<input type="submit" name="login" value="Log In">
		</form>
			<a href="registration.php"><button>Register</button></a>
	</div>

	<?php
		if (isset($_POST['login'])){
			$username = $_POST['username'];	
			$password = $_POST['password'];

			$sql = mysqli_query($con, "SELECT * FROM accounts");

			while($row = mysqli_fetch_array($sql))
			{
				if ($username === $row["username"] && $password === $row["password"]) {
					$_SESSION['aid'] = $row["account_id"];
					echo '
				        <script type="text/javascript">
							window.location = "start.php";
						</script>
					';
				}
			}

			echo '
			    <script type="text/javascript">
					$(function callalert(uid=""){
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Account does not exist",
						})
					})
				</script>
			';
		}
	?>
</body>
</html>
