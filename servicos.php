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

	$result = $db->ObjectBuilder()->where('type', $type2)->get('projects');
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
							<?php if($db->count): ?>
							<?php foreach ($result as $project ): ?>
								<div class="6u 12u(narrower)">
									<div class="content">
										<section>
											<a href="#" class="image featured">
											<?php if(file_exists('images/projects/'.$project->mainimage)): ?>
												<img src="images/projects/<?= $project->mainimage ?>" alt="<?= $project->title ?>" width="100" /></a>
											<?php else: ?>
												<img src="images/projects/noimg.png" alt="<?= $project->title ?>" width="100" /></a>
											<?php endif; ?>

											</a>
											<header>
												<h3 style="text-align: center;"><?= $project->title ?></h3>
											</header>
											<p style="text-align:justify;"><?= $project->desc ?></p>
										</section>
									</div>
									</div>
							<?php endforeach; ?>

							<?php else: ?>

								<div class="12u 12u(narrower)">
									<div class="content">
										<section>
											<h2 style="text-align: center;">Lamentamos, mas não há nenhum projeto nesta área!</h2>
											<img src="images/nothing.png" style="margin: auto;opacity: 0.7;display: block;" /></a>
										</section>
									</div>
									</div>
							<?php endif; ?>

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