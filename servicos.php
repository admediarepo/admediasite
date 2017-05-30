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
		<style type="text/css">
			.content > section > header > h3 {
				font-weight: 700;
			}
			.content > section > img {
				width: 100%;
			}
		</style>
	</head>
	
	<body class="contact">
		<div id="page-wrapper">

			<?php require_once 'system/includes/navbar.php'; ?>

									<!-- One -->
						<section class="wrapper style4 container" style="margin-top: 7%; ">

							<div class="row 150%">
								<div class="<?= ($result) ? '8': '12' ; ?>u 12u(narrower)">
							<!-- Content -->
									<?php if($type2 == 2): ?>
										<div class="content">
											<section>
												<img src=" http://placehold.it/700x300" alt="Consultoria" />
												<header>
													<h3>CONSULTORIA</h3>
												</header>
												<p><b>Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. 
												</b></p>

												<p>Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.</p>
											</section>
										</div>
									<?php elseif($type2 == 1): ?>
										<div class="content">
											<section>
												<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
												<header>
													<h3>WEB DESIGN</h3>
												</header>
												<p>Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.</p>
											</section>
										</div>

									<?php elseif($type2 == 3): ?>
										<div class="content">
											<section>
												<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
												<header>
													<h3>REDES SOCIAIS</h3>
												</header>
												<p>Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.</p>
											</section>
										</div>
									<?php elseif($type2 == 4): ?>
										<div class="content">
											<section>
												<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
												<header>
													<h3>SOFTWARE</h3>
												</header>
												<p>Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.</p>
											</section>
										</div>

									<?php endif; ?>


								</div>
							<?php if($result): ?>
								<div class="4u 12u(narrower)">

									<!-- Sidebar -->
									
										<div class="sidebar">
											<section style="border: solid 1px rgba(128, 136, 133, 0.25); padding: 10px;">
											<h3 style="text-align: center; font-weight: 500;"> PROJETO RELACIONADO </h3>
											<hr>
												<a href="projeto?id=<?= $result->id ?>" class="image featured"><img src="images/projects/<?= $result->mainimage ?>" alt="<?= $result->title ?>" style="object-fit: cover;width: 60%; max-height: 240px;min-height: 100px;" /></a>
												<header>
													<h3 style="font-weight: 600; word-wrap: break-word; margin-left: 10px;"><?= $result->title ?></h3>
												</header>
												<p style="margin-left: 10px; word-wrap: break-word; text-align: justify;"><?= $result->sum ?></p>
												<footer>
													<ul class="buttons" style="margin:auto; display: block; text-align: center;padding: 15px;">
														<li style="width: 100%;"><a href="projeto?id=<?= $result->id ?>" class="button small" style="width: 100%;">VER MAIS <i class="fa fa-plus" aria-hidden="true"></i></a></li>
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