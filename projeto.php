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
											<header>
												<h3 style="font-weight: 700;"><?= $result->title ?></h3>
											</header>
											<p><b style="word-wrap: break-word;text-align: justify;"><?= $result->sum ?></b></p>
											<p style="word-wrap: break-word;text-align: justify;"><?= $result->desc ?></p>
																					<?php if($aditionalmages): ?>
												<div class="project-aditionalimages" >
												<?php foreach($aditionalmages as $key => $img): ?>
													<img id="aditionalimage-<?= $key ?>" src="images/projects/<?= $img->name ?>" class="project-aditionalimage" onclick="modalFunction(<?= $key ?>)">
												<?php endforeach; ?>
													<div id="myModal" class="modal" data-backdrop="true">
														<span class="close">&times;</span>
														<img class="modal-content" id="img01">
														<img class="modal-content" id="img02">
														<div id="caption"></div>
													</div>
												</div>
											<?php endif; ?>
										</section>
									</div>
								</div>
							</div>
						</section>
		<?php require_once 'system/includes/footer.php'; ?>

		<!-- Scripts -->
			<script>
			// Get the modal

			function modalFunction(id){
				var modal = document.getElementById('myModal');
				
				var img = document.getElementById('aditionalimage-'+ id);
				var modalImg = document.getElementById("img01");

				var captionText = document.getElementById("caption");

				modal.style.display = "block";
				modalImg.src = img.src;
				captionText.innerHTML = img.alt;

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() { 
					modal.style.display = "none";
				}
			}
				
			</script>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

			<script type="text/javascript">
				/*$(document).ready(function(){
					$('.project-aditionalimage').click(function(){
						$('#mainimage').attr('src', $(this).attr('src'));
					});
				}); */
			</script>

	</body>
</html>
