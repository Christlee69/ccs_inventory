<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['loggedIn'])) {
	header('Location: index.php');
	exit();
}

require_once('inc/config/constants.php');
require_once('inc/config/db.php');
require_once('inc/header.html');
?>

<body>

	<head>
		<title>Login Page</title>
		<!-- Add the following CSS to style the logo and center it -->
		<style>
			.logo {
				display: list-item;
				margin: auto;
				max-width: 50%;
				min-width: 175px;
				height: auto;
				position: fixed;

				left: 50%;
				transform: translateX(-50%);
				width: 8%;

			}

			form {
				position: absolute;
				top: 225px;
				left: 225px;
				transform: translateX(-50%);
				padding-bottom: 70px;
			}
		</style>
	</head>

	<body>
		<!-- Add the following code to display the logo -->
		<img src="images/Loginlogo.png" alt="" class="logo">
		<?php
		// Variable to store the action (login, register, passwordReset)
		$action = '';
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
			if ($action == 'register') {
		?>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-12 col-md-5 col-lg-5">


						
						<form action="" class="form">
						<div id="registerMessage"></div>
						
						<div class="form-group">
							<label for="registerFullName">Name<span class="requiredIcon">*</span></label>
							<input type="text" class="form-control" id="registerFullName" name="registerFullName">
						</div>
						
						<div class="form-group">
							<label for="registerUsername">Username<span class="requiredIcon">*</span></label>
							<input type="email" class="form-control" id="registerUsername" name="registerUsername" autocomplete="on">
						</div>
						
						<div class="form-group">
							<label for="registerPassword1">Password<span class="requiredIcon">*</span></label>
							<input type="password" class="form-control" id="registerPassword1" name="registerPassword1">
						</div>
						
						<div class="form-group">
							<label for="registerPassword2">Re-enter password<span class="requiredIcon">*</span></label>
							<input type="password" class="form-control" id="registerPassword2" name="registerPassword2">
						</div>
						<div class="d-flex justify-content-between align-items-center">
						<a id="login" href="login.php" class="btn btn-primary">Login</a>
						<button type="button" id="register" class="btn btn-success">Register</button>
						<a href="login.php?action=resetPassword" class="btn btn-warning">Reset Password</a>
						<button type="reset" class="btn">Clear</button>
						</div>
					</form>



						</div>
					</div>
				</div>
			<?php
				require 'inc/footer.php';
				echo '</body></html>';
				exit();
			} elseif ($action == 'resetPassword') {
			?>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-12 col-md-5 col-lg-5">



							<form action="">
								<div id="resetPasswordMessage"></div>
								<div class="form-group">
									<label for="resetPasswordUsername">Username</label>
									<input type="text" class="form-control" id="resetPasswordUsername" name="resetPasswordUsername">
								</div>
								<div class="form-group">
									<label for="resetPasswordPassword1">New Password</label>
									<input type="password" class="form-control" id="resetPasswordPassword1" name="resetPasswordPassword1">
								</div>
								<div class="form-group">
									<label for="resetPasswordPassword2">Confirm New Password</label>
									<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
								</div>
								<div class="d-flex justify-content-between align-items-center">
								<a id="login" href="login.php" class="btn btn-primary">Login</a>
								<a href="login.php?action=register" class="btn btn-success">Register</a>
								<button type="button" id="resetPasswordButton" class="btn btn-warning">Reset Password</button>
								<button type="reset" class="btn">Clear</button>
								</div>
							</form>


						</div>
					</div>
				</div>
		<?php
				require 'inc/footer.php';
				echo '</body></html>';
				exit();
			}
		}
		?>
		<!-- Default Page Content (login form) -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-12 col-md-5 col-lg-5">



					<form action="">
						<div id="loginMessage"></div>
						<div class="form-group">
							<label for="loginUsername">Username</label>
							<input type="text" class="form-control" id="loginUsername" name="loginUsername">
						</div>
						<div class="form-group">
							<label for="loginPassword">Password</label>
							<input type="password" class="form-control" id="loginPassword" name="loginPassword">
						</div>
						<div class="d-flex justify-content-between align-items-center">
						<button type="button" id="login" class="btn btn-primary">Login</button>
						<a href="login.php?action=register" class="btn btn-success">Register</a>
						<a href="login.php?action=resetPassword" class="btn btn-warning">Reset Password</a>
						<button type="reset" class="btn">Clear</button>
						</div>
					</form>


				</div>
			</div>
		</div>
		<?php
		require 'inc/footer.php';
		?>
	</body>

	</html>
	<script>
		// Listen for "Enter" key press event on the document
		document.addEventListener('keypress', function(event) {
			// Check if the pressed key is "Enter" (keyCode 13)
			if (event.keyCode === 13) {
				// Trigger the click event of the login button
				document.getElementById('login').click();
			}
		});
		
	</script>