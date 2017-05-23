<?php 
	require_once 'core/init.php';

	$currentPage = 'Portofolio'; 

	$typeNavbar = 2;

	$activeNavbar = 'portofolio';
	$id = (isset($_GET['id'])) ? preg_replace('/\D/', '', $_GET['id']) : NULL;
	if($id == NULL){
		redirect('index');
	}

	$result = $db->ObjectBuilder()->where('id', $id)->getOne('projects');
	if(!$result) {
		redirect('index');
	}

	$aditionalmages = $db->ObjectBuilder()->where('project_id', $result->id)->get('images');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once 'system/includes/header.php'; ?>
		<style type="text/css">
			#mainimage {
				display: block;
				margin:auto;
				width: 150vh;
				height: 50vh;
				object-fit: cover;
				overflow: hidden;
			}
			.project-aditionalimages {
				margin:10px;

			}
			.project-aditionalimage {
				width: 10%;
				margin-right: 5px;
			}
			.project-aditionalimage:hover {
				opacity:0.7;
				cursor: pointer;

			}
		</style>
	</head>
	
	<body class="contact">
		<div id="page-wrapper">

			<?php require_once 'system/includes/navbar.php'; ?>

						<!-- One -->
						<section class="wrapper style4 container" style="margin-top: 7%; ">

							<div class="row 150%">
								<div class="12u 12u(narrower)">
									<!-- Content -->
									<div class="content">
										<section>
											<img src="images/projects/<?= $result->mainimage ?>" alt="<?= $result->title ?>" id="mainimage" />
											<?php if($aditionalmages): ?>
												<div class="project-aditionalimages">
												<?php foreach($aditionalmages as $img): ?>
													<img src="images/projects/<?= $img->name ?>" class="project-aditionalimage">
												<?php endforeach; ?>
												</div>
											<?php endif; ?>
											<header>
												<h3><?= $result->title ?></h3>
											</header>
											<p><b><?= $result->sum ?></b></p>
											<p><?= $result->desc ?></p>
										</section>
									</div>
								</div>
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

			<script type="text/javascript">
				$(document).ready(function(){
					$('.project-aditionalimage').click(function(){
						$('#mainimage').attr('src', $(this).attr('src'));
						console.log('2312');
					});
				});
			</script>

	</body>
</html>
