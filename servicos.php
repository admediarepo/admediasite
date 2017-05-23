<?php 
	require_once 'core/init.php';

	$currentPage = 'Serviços'; 

	$typeNavbar = 2;

	$activeNavbar = 'servicos';
	$type = (isset($_GET['type']) && is_string($_GET['type'])) ? preg_replace('/[^-a-zA-Z0-9-]/', '', $_GET['type']) : 'web-design';
	$type2 = 1; 
	switch ($type) {
		case 'web-design':
			$type2 = 1;
		break;
		case 'consultoria':
			$type2 = 2;
		break;
		case 'redes-sociais':
			$type2 = 3;
		break;
		case 'software':
			$type2 = 4;
		break;
		default:
			$type2 = 1;
		break;
	}

	$result = $db->ObjectBuilder()->where('type', $type2)->getOne('projects');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once 'system/includes/header.php'; ?>
	</head>
	
	<body class="contact">
		<div id="page-wrapper">

			<?php require_once 'system/includes/navbar.php'; ?>

									<!-- One -->
						<section class="wrapper style4 container" style="margin-top: 7%; ">

							<div class="row 150%">
								<div class="<?= ($result) ? '8': '12' ; ?>u 12u(narrower)">
							<!-- Content -->
										<div class="content">
											<section>
												<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
												<header>
													<h3>CONSTULTORIA</h3>
												</header>
												<p>Descrição consultoria!</p>
											</section>
										</div>
								</div>
							<?php if($result): ?>
								<div class="4u 12u(narrower)">

									<!-- Sidebar -->
									
										<div class="sidebar">
											<section>
												<a href="#" class="image featured"><img src="images/<?= $result->mainimage ?>" alt="<?= $result->title ?>" /></a>
												<header>
													<h3><?= $result->title ?></h3>
												</header>
												<p><?= $result->sum ?></p>
												<footer>
													<ul class="buttons">
														<li><a href="#" class="button small">VER MAIS</a></li>
													</ul>
												</footer>
											</section><br>

											<!--section>
												<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
												<header>
													<h3>PROJETO 2</h3>
												</header>
												<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
												<footer>
													<ul class="buttons">
														<li><a href="#" class="button small">VER MAIS</a></li>
													</ul>
												</footer>
											</section-->
										</div>
									</div>
								<?php endif; ?>
								</div>
							</section>
		<?php require_once 'system/includes/footer.php'; ?>

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