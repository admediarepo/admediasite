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
								<?php require_once 'system/includes/portofolio.php'; ?>			
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