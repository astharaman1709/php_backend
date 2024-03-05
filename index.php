
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/log_style.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/slogo.png"/>

</head>
<body>
<div class="container padding">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 login">
		<div class="logo" align="center">
			<img src="img/user.png">
		</div>
		<div class="login_name">Admin Log In</div>

		<form role="form" action="#" method="post">
			<div class="form-group">
				<div class="icon-field"><i class="fa fa-user"></i></div>
				<input type="text" class="form-control" name="userid" placeholder="Your User Id" required>
			</div>
			<div class="form-group">
				<div class="icon-field"><i class="fa fa-lock"></i></div>
				<input type="password" class="form-control" name="password" placeholder="Your Password" required>
			</div>
			<div class="form-group text-center">
				<input type="submit" class="btn batt" name="login" value="LOGIN">
			</div>
		</form>
		<div id="error"></div>
		<?
			if(isset($_POST['login']))
			{
				extract($_POST);
				include('extra/connect.php');

				$sql="select * from user1 where userid='$userid'";
				$res=$con->query($sql);
				$row=mysqli_fetch_array($res);

				$pass=$row['user_pass'];
				$pass_check=password_verify($password, $pass);

				if($pass_check)
				{
					if($row['status']=="Deactive")
					{ ?>
						<script type="text/javascript">
							document.getElementById('error').innerHTML="Wrong UserId and Password";
							error.style.padding = "20px";
							error.style.color = "red";
							error.style.border = "1px solid red";
						</script>
					<? }
					else{
						session_start();
						$_SESSION['ntuser']=$userid;
						echo "<script>window.location.href='home.php';</script>";
					}
				}
				else
				{ ?>
					<script type="text/javascript">
						document.getElementById('error').innerHTML="Wrong UserId and Password";
						error.style.padding = "20px";
						error.style.color = "red";
						error.style.border = "1px solid red";
					</script>
				<? }
			}
		?>
	</div>
</div>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>