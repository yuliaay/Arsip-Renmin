<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>post</title>
</head>
<body>
	<?php
		if(isset($_POST['submit'])){
			$title = $_POST['title'];
			$q1 ="insert into posts(title) values ('$title')";
			$q2 = "insert into notifications (title, read_n) values ('$title','1')";
			$pdo->query($q1);
			$pdo->query($q2);

			header("location:notif.php");
		}
	?>


	<form style="text-align: center;" action="" method="POST">
		<textarea name="title"></textarea>
		<input type="submit" name="submit" value="Post">
	</form>

</body>
</html>