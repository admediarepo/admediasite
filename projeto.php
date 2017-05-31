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
				max-height: 50vh;
				object-fit: cover;
				overflow: hidden;
			}
			.project-aditionalimages {
				margin: 10px;
    			display: block;
    			text-align: center;

			}
			.project-aditionalimage {
				width: 20vh;
				min-width: 18vh;
				margin-right: 5px;
				max-width: 20vh;
				height: 15vh;
				min-height: 15vh;
				max-height: 15vh;
				object-fit: cover;
			}
			.project-aditionalimage:hover {
				opacity:0.8;
				cursor: pointer;

			}
			@media screen and (max-width: 767px){
				.project-aditionalimages {
					margin: 5px;
				}

				.modal-content {
					margin: auto;
					display: block;
					width: 20%;
					max-width: 50vh;
					margin-top:5vh;
				}

				.close {
					position: absolute;
					top: 10vh;
					right: 3vh;
					color: #f1f1f1;
					font-size: 40px;
					font-weight: bold;
					transition: 0.3s;
				}
			}

				.project-aditionalimage {
					width: 13vh;
					min-width: 40px;
					margin-right: 5px;
					max-width: 15vh;
					display: inline-block;
	    			object-fit: cover;
					overflow: hidden;
			}
			}
			#myImg {
				border-radius: 5px;
				cursor: pointer;
				transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				padding-top: 100px; /* Location of the box */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0,0,0); /* Fallback color */
				background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			}

			/* Modal Content (image) */
			.modal-content {
				margin: auto;
				display: block;
				width: 20%;
				max-width: 50vh;
				margin-top:20vh;
			}

			/* Caption of Modal Image */
			#caption {
				margin: auto;
				display: block;
				width: 20%;
				max-width: 500px;
				text-align: center;
				color: #ccc;
				padding: 10px 0;
				height: 150px;
			}

			/* Add Animation */
			.modal-content, #caption {    
				-webkit-animation-name: zoom;
				-webkit-animation-duration: 0.6s;
				animation-name: zoom;
				animation-duration: 0.6s;
			}

			@-webkit-keyframes zoom {
				from {-webkit-transform:scale(0)} 
				to {-webkit-transform:scale(1)}
			}

			@keyframes zoom {
				from {transform:scale(0)} 
				to {transform:scale(1)}
			}

			/* The Close Button */
			.close {
				position: absolute;
				top: 15vh;
				right: 35px;
				color: #f1f1f1;
				font-size: 40px;
				font-weight: bold;
				transition: 0.3s;
			}

			.close:hover,
			.close:focus {
				color: #bbb;
				text-decoration: none;
				cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
				.modal-content {
					width: 100%;
				}
								.modal-content {
					margin: auto;
					display: block;
					width: 80%;
					max-width: 80vh;
					margin-top:5vh;
				}

				.close {
					position: absolute;
					top: 10vh;
					right: 3vh;
					color: #f1f1f1;
					font-size: 40px;
					font-weight: bold;
					transition: 0.3s;
				}
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
											<header>
												<h3 style="font-weight: 700;"><?= $result->title ?></h3>
											</header>
											<p><b style="word-wrap: break-word;text-align: justify;"><?= $result->sum ?></b></p>
											<p style="word-wrap: break-word;text-align: justify;"><?= $result->desc ?></p>
																					<?php if($aditionalmages): ?>
												<div class="project-aditionalimages" >
												<?php foreach($aditionalmages as $img): ?>
													<img id="myImg" src="images/projects/<?= $img->name ?>" class="project-aditionalimage">
												<?php endforeach; ?>
													<div id="myModal" class="modal" data-backdrop="true">
														<span class="close">&times;</span>
														<img class="modal-content" id="img01">
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
				var modal = document.getElementById('myModal');

				// Get the image and insert it inside the modal - use its "alt" text as a caption
				var img = document.getElementById('myImg');
				var modalImg = document.getElementById("img01");
				var captionText = document.getElementById("caption");
				img.onclick = function(){
					modal.style.display = "block";
					modalImg.src = this.src;
					captionText.innerHTML = this.alt;
				}

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() { 
					modal.style.display = "none";
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
				$(document).ready(function(){
					$('.project-aditionalimage').click(function(){
						$('#mainimage').attr('src', $(this).attr('src'));
					});
				});
			</script>

	</body>
</html>
