<?php
include_once('config.php');
session_start();
if (empty($_SESSION['aid'])){
	echo '
		<script type="text/javascript">
			window.location = "home.php";
		</script>
	';
}
$_SESSION['quiz_number'] = 1;
$_SESSION['point'] = 0;
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
	<div class="center_box">
		<div class="row">
			<div class="col-md-7">
				<h4 style="font-size: 5vh;">Welcome!</h4>
				<h4 style="font-size: 3vh;">IMORTANT!!!</h4>
				<h4 style="font-size: 3vh;">
					1. Instruction.<br>
					2. Instruction.<br>
					3. Instruction.<br>
				</h4>
			</div>
			<div class="col-md-5">
				<div class="center_box">
					<a href="quiz.php">
						<button style="width: 100%;">Start Quiz</button>
					</a>
					<br><br>
					<a href="score.php">
						<button style="width: 100%;">View Scores</button>
					</a>
					<br><br>
					<a href="home.php">
						<button style="width: 100%;">Log Out</button>
					</a>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
