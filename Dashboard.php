<?php
	$email="";
	session_start();
	if(!isset($_SESSION['Email']))
		header('Location: http://localhost/AI/Login.php');
	$email = $_SESSION['Email'];
	$link = mysqli_connect("localhost","root","","scholarx");
	if($_POST)
	{
		for($i=1;$i<=5;$i++)
		{
			$r="remove".$i;
			if(!empty($_POST[$r])) {
				$val=1;
				$query = "UPDATE user SET Video".$i." = '$val' where Email = '$email'";
				mysqli_query($link,$query);
			}
			$r="red".$i;
			if(!empty($_POST[$r])) {
				$val=2;
				$query = "UPDATE user SET Video".$i." = '$val' where Email = '$email'";
				mysqli_query($link,$query);
			}
		}
	}
	$v=array();
	$vi=array();
	for($i=1;$i<=5;$i++) { 
		$v[$i]="block";
		$vi[$i]="none";
	}
	if(!mysqli_connect_error())
	{
		$query = "select * from user where Email = '$email' ";
		$result = mysqli_query($link,$query);
		if(mysqli_num_rows($result) > 0)
		{	
			$row=mysqli_fetch_array($result);
			for($i=2;$i<=6;$i++)
			{
				switch($row[$i])
				{
					case 1:$v[$i-1]="none";
						   break;
					case 2:$vi[$i-1]="5px solid red";
						   break;
				}
			}
		}
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script>
			window.location.hash="no-back-button";
			window.location.hash="Again-No-back-button";
			window.onhashchange=function(){window.location.hash="no-back-button";}
		</script>
		<script src="jquery.js"></script>
		
		<title>DashBoard</title>
		
		<style type="text/css">
			.container {
				margin-top:50px;
			}
			button {
				margin:10px;
			}
			.col-sm-2 {
				border:2px solid gray;
				padding:10px 10px 40px 10px;
				margin:10px;
			}
			navbar {
				padding:5px;
			}
			h4 {
				position:absolute;
				left:90%;
			}
			a:hover {
				text-decoration:none;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<h4><a href="logout.php">Logout</a></h4>
			<h3><?php echo $email; ?></h3>
		</nav>
		<div class="container">	
			<div class="row">
				<?php 
					$src = array("https://www.youtube.com/embed/rfscVS0vtbw","https://www.youtube.com/embed/3u1fu6f8Hto","https://www.youtube.com/embed/-G7bJVAIiEI","https://www.youtube.com/embed/a9_oMNSgX2g","https://www.youtube.com/embed/t_ispmWmdjY");
					for($i=1;$i<=5;$i++)
					echo '<div class="col-sm-2" style="display:'.$v[$i].'">
					<iframe width="100%" height="200px" style="border:'.$vi[$i].'" src='.$src[$i-1].' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<form method="post">
						<input type="hidden" name="remove'.$i.'" value="1">
						<button class="btn btn-primary">I Know it Already</button>
					</form>
					<form method="post">
						<input type="hidden" name="red'.$i.'" value="1">
						<button class="btn btn-primary">I Forgot</button>
					</form>
					<button type="button" class="btn btn-primary" data-toggle="popover" data-placement="bottom" data-content="Learn it Now!">I don\'t know</button>
				</div>';
				?>
			</div>
		</div>
		
		<script type="text/javascript">
			$(function () {
				$('[data-toggle="popover"]').popover()
			})
		</script>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>