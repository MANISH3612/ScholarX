<?php
	$str = "";
	if($_POST) 
	{
		$email = $_POST['Email1'];
		$password = $_POST['Password1'];
		if($email!="" && $password!="") 
		{
			$link = mysqli_connect("localhost","root","","scholarx");
			if(!mysqli_connect_error())
			{
				$query = "INSERT INTO user(Email,Password) values('$email','$password') ";
				if(mysqli_query($link,$query))
				{	
					session_start();
					$_SESSION['Email']=$email;
					header('Location: http://localhost/AI/Dashboard.php');
				}
				else
					$str = "User exists!";
			}
			else
				$str = "Retry";
		}
		else
		{
			$str = "Enter Values for Required fields.";
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
		
		<title>SignUp</title>
		
		<style type="text/css">
			body {
				margin-top:50px;
			}
			.col-sm-6 {
				border:1px solid grey;
				padding:20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="alert-danger"><?php echo $str; ?></div>
					<form method="post">
						<div class="form-group">
							<label for="Email1">Email address</label>
							<input type="email" class="form-control" name="Email1" id="Email1" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="Password1">Password</label>
							<input type="password" class="form-control" name="Password1" id="Password1" placeholder="Password">
						</div>
						<button class="btn btn-primary">SignUp</button>
					</form>
					<br>
					Existing User? <a href="login.php"> Login Here </a>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>