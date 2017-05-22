<?php 
	require_once 'core/init.php';

	$currentPage = 'Portofólio'; 

	$typeNavbar = 2;

	$activeNavbar = 'portofolio';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once 'system/includes/header.php'; ?>
	</head>
	<body class="contact">
		<div id="page-wrapper">

			<!-- Header -->
					<?php require_once 'system/includes/navbar.php'; ?>
						
					<section class="wrapper style4 container" style="margin-top: 7%; ">
						<h2 style="text-align: center;font-size:40px;"><strong>OS NOSSOS TRABALHOS!</strong></h2>
						<div class="row 150%">
							<div class="row">

								<div class="6u 12u(narrower)">
									<section>
										<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
										<header>
											<h3>TRABALHO 1</h3>
										</header>
										<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
									</section>

								</div>
								<div class="6u 12u(narrower)">

									<section>
										<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
										<header>
											<h3>TRABALHO 2</h3>
										</header>
										<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
									</section>

								</div>
							</div>
							<div class="row">
								<div class="6u 12u(narrower)">

									<section>
										<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
										<header>
											<h3>TRABALHO 3</h3>
										</header>
										<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
									</section>

								</div>
								<div class="6u 12u(narrower)">

									<section>
										<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
										<header>
											<h3>TRABALHO 4</h3>
										</header>
										<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
									</section>

								</div>
							</div>								

							</div>
						</section>

				
						<?php require_once 'system/includes/footer.php'; ?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>