<?php 
	require_once 'core/init.php';

	$currentPage = 'Software'; 

	$typeNavbar = 2;

	$activeNavbar = 'contatos';

	$secret = '6Lf5hCIUAAAAAI4SI-6XIDAyu9l1GTfctubBrAEv';
	$publickey = 'AIzaSyBkIvALalO05rdva99ehdkc4DlVonpPe9g';
?>

<!DOCTYPE HTML>
<html>
	<head>
	<?php require_once 'system/includes/header.php'; ?>
		<style type="text/css">
			#map {
				height: 100%;
				width: 100%;
				padding: 25%;
				margin-top:5%;
			}
		</style>
	</head>
	<body class="contact">
		<div id="page-wrapper">
		<?php require_once 'system/includes/navbar.php'; ?>
			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-envelope"></span>
						<h2>CONTACTE-NOS!</h2>
						<p>Responderemos o mais breve possível.</p>
					</header>

					<!-- One -->
						<section class="wrapper style4 special container 75%">

							<!-- Content -->
								<div class="content">
									<form method="POST">
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input type="text" name="name" placeholder="Nome" />
											</div>
											<div class="6u 12u(mobile)">
												<input type="text" name="email" placeholder="Email" />
											</div>
										</div>
										<div class="row 50%">
											<div class="12u">

												<select class="12u">
												<option disabled selected>Selecione um assunto:</option>
													<option value="assunto1">Assunto1</option>
													<option value="assunto2">Assunto2</option>
												</select>
											</div>
										</div>
										<div class="row 50%">
											<div class="12u">
												<textarea name="message" placeholder="Mensagem..." rows="7"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<ul class="buttons">
													<li><input type="submit" name="submit" class="special" value="ENVIAR" /></li>
												</ul>
											</div>
										</div>
										<div class="g-recaptcha" data-sitekey="6Lf5hCIUAAAAAMwzUP83wzZQy4VpCNFqvw2MN_Jv"></div>
									</form>
									<br><br>
									<h2>ONDE NOS PODE ENCONTRAR ?</h2>
									<div id="map"></div>
									<h4 style="text-align: right!important;margin: 5%;"><i class="fa fa-map-marker fa-2x" aria-hidden="true" style="margin-top: 1%; position: absolute; margin-left: -3%; float: left;"></i> &nbsp; Rua do carmo, 88 - K <br>&nbsp;&nbsp;9050 - 019 Funchal</h4>
								</div>

						</section>
				</article>
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
			<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

			<script>

	      function initMap() {
	        var myLatLng = {lat: 32.6504747, lng: -16.9036642};

	        var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 16,
	          center: myLatLng
	        });

	        var marker = new google.maps.Marker({
	          position: myLatLng,
	          map: map,
	          title: 'A NOSSA LOCALIZAÇÃO'
	        });
	      }
	    </script>
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $publickey ?>&callback=initMap"></script>
	</body>
</html>

<?php

if(isset($_POST['submit']) && !empty($_POST['submit'])){
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
            //contact form submission code
            $name = !empty($_POST['name'])? preg_replace('/[^-a-zA-Z0-9-]/', '', $_POST['name']):'';
            $email = !empty($_POST['email'])? preg_replace('/[^-a-zA-Z0-9-]/', '', $_POST['email']):'';
            $message = !empty($_POST['message'])?  preg_replace('/[^-a-zA-Z0-9-]/', '', $_POST['message']):'';

            $subject = !empty($_POST['subject'])?  preg_replace('/[^-a-zA-Z0-9-]/', '', $_POST['subject']):'';
            
        }else{
        	alert('danger', 'Error!', 'Robot verification failed, please try again.');
        	return false;
        }
    }else{
    	alert('danger', 'Error!', 'Please click on the reCAPTCHA box.');
        return false;
    }
}

?>