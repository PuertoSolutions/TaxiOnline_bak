<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<title>Taxi Online Iquique</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Sistema Pedidos Taxi Online">
		<meta name="author" content="Puerto Solutions">
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    	<style>body {
			padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="/">Taxi Online</a>
					<?php
						if (isset($_SESSION['Usuario'])) { ?>
							<div class="btn-group pull-right">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="icon-user"></i>Marito<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Profile</a></li>
									<li class="divider"></li>
									<li><a href="#">Salir</a></li>
								</ul>
							</div>
						<?php } ?>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<?php
								if(isset($_SESSION['Usuario'])){
									
								}else{ ?>
									<li><a href="/Registro">Registrarse</a></li>
								<?php }
							?>
							<li><a href="/Pedido">Pedidos</a></li>
							<li><a href="#">About</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php echo $_html; ?>
			<hr>
			<footer>
				<p>&copy; Puerto Solutions 2012</p>
			</footer>
		</div>
	</body>
</html>