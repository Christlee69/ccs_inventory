	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <img id="top" src="images/Loginlogo.png" style="border-radius:10px; margin-right: 10px; width: 60px; height:60px; filter: invert(100%);"/>
        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">CCS Inventory Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			<!-- <li class="nav-item">
				<form class="form-inline" action="/action_page.php">
					<input class="form-control col-md-8 mr-sm-2" type="text" placeholder="Search">
					<button class="btn btn-success" type="submit">Search</button>
				</form>
			</li> -->
			<li class="nav-item">
				<span class="nav-link">Welcome, <?php echo $_SESSION['fullname']; ?></span>
            </li>
			<li class="nav-item">
				<span class="nav-link"> | </span>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="model/login/logout.php">Log Out</a>
            </li>
            <li class="nav-item">
				<span class="nav-link"> | </span>
            </li>
            <li class="nav-item">
            <li><a href="./model/users/index.php"><img src="./images/Administrator.png" width="40px" height="40px"></a></li>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    