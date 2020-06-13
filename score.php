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
<body style="padding: 5vh 20vh;">
	<div class="row" style="width: 150vh; margin: auto;">
		<div class="col-md-10">
			<h4 style="font-size: 7vh;">Score Board</h4>
		</div>
		<div class="col-md-2">
			<button style="font-size: 3vh; background: transparent; width: 100%; margin-top: 10%; border: 2px solid white;" onclick="home()">HOME</button>
		</div>
	</div>
	<hr style="border-top: 1px solid white; margin: auto;">
	<br>
	<div class="row" style="width: 150vh; margin: auto;">
		<div class="col-md-6">
			<h4 style="font-size: 3vh;">Name</h4>
		</div>
		<div class="col-md-1" align="center">
			<h4 style="font-size: 3vh;">|</h4>
		</div>
		<div class="col-md-1" align="center">
			<h4 style="font-size: 3vh;">Score</h4>
		</div>
		<div class="col-md-1" align="center">
			<h4 style="font-size: 3vh;">|</h4>
		</div>
		<div class="col-md-3" align="center">
			<h4 style="font-size: 3vh;">Date & Time</h4>
		</div>
	</div>
	<?php
		$sql = mysqli_query($con, "SELECT * FROM score ORDER BY score_id DESC");

		while($row = mysqli_fetch_array($sql)){
			$score = $row["score"];
			$date = $row["date_time"];
			$account_code = $row["account_code"];
			$sql1 = mysqli_query($con, "SELECT * FROM accounts WHERE account_id = '$account_code'");

			while($row1 = mysqli_fetch_array($sql1)){
				$name = $row1["name"];
				?>
					<hr style="border-top: 1px solid white; width: 95%;">
					<div class="row" style="width: 150vh; margin: auto;">
						<div class="col-md-6">
							<h4 style="font-size: 3vh;"><?php echo $name ?></h4>
						</div>
						<div class="col-md-1" align="center">
							<h4 style="font-size: 3vh;">|</h4>
						</div>
						<div class="col-md-1" align="center">
							<h4 style="font-size: 3vh;"><?php echo $score ?></h4>
						</div>
						<div class="col-md-1" align="center">
							<h4 style="font-size: 3vh;">|</h4>
						</div>
						<div class="col-md-3" align="center">
							<h4 style="font-size: 3vh;"><?php echo $date ?></h4>
						</div>
					</div>
				<?php
			}
		}
	?>
	<script>
		function home(){
			window.location = "start.php";
		}
	</script>
</body>
</html>
