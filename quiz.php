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
	<?php
		$question_number = $_SESSION['quiz_number'];
		if (isset($_POST['submit'])) {
			$Answer = $_POST['answer'];
			$myAnswer = $_POST['myAnswer'];
			$Point = $_POST['points'];
			$myPoint = $_SESSION['point'];
			if ($Answer == $myAnswer){
				$_SESSION['point'] = $Point + $myPoint;
			}
			$question_number++;
			$_SESSION['quiz_number'] = $question_number;

			if ($question_number === 11) {
				$aid 	= $_SESSION['aid'];
				$score 	= $_SESSION['point'];
				$sql = "INSERT INTO score (account_code, score) VALUES ('$aid', '$score')";

				if ($con->query($sql) === TRUE){
		            echo '
			           	<script type="text/javascript">
							window.location = "score.php";
						</script>
					';
		        }
			}
		}
		$sql = mysqli_query($con, "SELECT * FROM quiz WHERE question_id = '$question_number'");

		while($row = mysqli_fetch_array($sql)){
			$question 	= $row["question"];
			$time 		= $row["time"];
			$point 		= $row["point"];
			$op1 		= $row["op1"];
			$op2 		= $row["op2"];
			$op3 		= $row["op3"];
			$op4 		= $row["op4"];
			$answer 	= $row["answer"];
		}
	?>

	<div class="center_box">
		<div class="progress" style="height: auto;">
			<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">
				<span class="sr-only"></span>
				<h6 id="text" style="color: transparent;">a</h6>
			</div>
		</div>

		<h4 style="font-size: 5vh;">Question #<?php echo $question_number ?>/10</h4>
		<h4 style="font-size: 3vh;"><?php echo $question ?></h4>
		<div class="radio-group">
			<label class="radio">
				<input type="radio" id="op1" name="answer" onclick="myFunction()" value="<?php echo $op1 ?>">
				<?php echo $op1 ?>
			</label>
			<label class="radio">
				<input type="radio" id="op2" name="answer" onclick="myFunction()" value="<?php echo $op2 ?>">
				<?php echo $op2 ?>
			</label>
			<label class="radio">
				<input type="radio" id="op3" name="answer" onclick="myFunction()" value="<?php echo $op3 ?>">
				<?php echo $op3 ?>
			</label>
			<label class="radio">
				<input type="radio" id="op4" name="answer" onclick="myFunction()" value="<?php echo $op4 ?>">
				<?php echo $op4 ?>
			</label>
		</div>
		<div align="right">
			<form action ="quiz.php" method ="post">
				<input type="hidden" name="myAnswer" id="answer">
				<input type="hidden" name="answer" value="<?php echo $answer ?>">
				<input type="hidden" name="points" value=<?php echo $point ?>>
				<input type="hidden" id="time" value=<?php echo $time ?>>
				<input type="hidden" name="mypoints" value=<?php echo $_SESSION['point'] ?>>
				<input type="submit" name="submit"  id="submit" value="Submit">
			</form>
		</div>
	</div>

	<script>
		function myFunction() {
			var element = document.getElementById('answer');
			var answer;
			if (document.getElementById('op1').checked) {
				answer = document.getElementById('op1').value;
			}
			else if (document.getElementById('op2').checked) {
				answer = document.getElementById('op2').value;
			}
			else if (document.getElementById('op3').checked) {
				answer = document.getElementById('op3').value;
			}
			else if (document.getElementById('op4').checked) {
				answer = document.getElementById('op4').value;
			}
			element.value = answer;
		}

		var i = document.getElementById('time').value;

		var counterBack = setInterval(function(){
			i--;
			if (i > 0){
				$('.progress-bar').css('width', i+'%');
			} else {
				clearInterval(counterBack);
				document.getElementById("submit").click();
			}
		}, 1000);
	</script>
</body>
</html>
