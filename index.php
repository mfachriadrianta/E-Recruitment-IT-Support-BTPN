<?php
include 'functions.php';

if (empty($_SESSION['login'])){
	header("location:login.php");
} 

?>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="images/logobtpn.png" />

	<title>E-Recruitment BTPN</title>
	<link href="css/spacelab-bootstrap.min.css" rel="stylesheet" />
	<link href="css/general.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="csstwo/style.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
		<a href="index.php">
		<img class="navbar-brand " src="images/logo_btpn.png" >
                </a>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if ($_SESSION['level'] == 'admin') : ?>
						<!-- <li class="dropdown">
							<a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img id="logo" src="images/nav_criteria.png" height="20"> Criteria <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								
							</ul>
						</li>
						<li class="dropdown">
							<a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img id="logo" src="images/nav_alternative.png" height="20"> Alternative <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								
							</ul>
						</li> -->
						<li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Criteria</a></li>
								<li><a href="?m=nilai_kriteria"><span class="glyphicon glyphicon-star"></span> Value Criteria</a></li>
					<li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Alternative</a></li>
								<li><a href="?m=nilai_alternatif"><span class="glyphicon glyphicon-stats"></span> Value Alternative</a></li>
					<?php endif ?>
					<li><a href="?m=hitung"><img id="logo" src="images/nav_calculation.png" height="20"> Calculation</a></li>
					<li><a href="?m=password"><img id="logo" src="images/nav_password.png" height="20"> Password</a></li>
					<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
			<!-- /.nav-collapse -->
		</div>
	</nav>
	
	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
	<footer class="footer bg-primary">
		<div class="container" position-center>
			<p style="text-align:center">Made With <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
  				<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg> From Medan</p>
		</div>
	</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	
	<script type="text/javascript">
		$('.form-control').attr('autocomplete', 'off');
	</script>
</body>

</html>