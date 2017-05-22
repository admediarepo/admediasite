<?php
require_once('core/init.php');

/**
 * Sets the <title> to name of $currentPage
 * @var string
 */
$currentPage = 'Inicio'; 

/**
 * Type of navbar
 * $typeNavbar = 1  // Class  will be alt
 * else // class will be ''
 * @var integer
 */
$typeNavbar = 1;

/**
 * Current tab active
 * Can be : inicio, portofolio, contactos, servicos
 * @var string
 */
$activeNavbar = 'inicio';

?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once('system/includes/header.php'); ?>
		<style type="text/css">
			#footer {
				max-height: 2%!important;
			}
		</style>
	</head>
	<body class="index">
		<div id="page-wrapper">

		<?php require_once('system/includes/navbar.php') ?>
				
			<!-- Banner -->
				<section id="banner">
					<div class="inner">

						<header>
							<h2>ADMEDIA</h2>
						</header>
						<p>DESENVOLVEMOS <strong>IDEIAS 360º</strong>
						<br />
						<footer>
							<ul class="buttons vertical">
								<li><a href="#main" class="button fit scrolly">MAIS &nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a></li>
							</ul>
						</footer>

					</div>

				</section>

			<!-- Main -->
				<article id="main">

					<header class="special container" >
						<span class="icon fa-bar-chart-o"></span>
						<h2>O QUE <strong>FAZEMOS?</strong></h2>
						<br />
						Criada em 2016 a adMedia, tem como objectivo fornecer as melhores soluções tecnologicas a todos os seus clientes e parceiros.Vivendo num mundo empresarial cada vez mais interligado e tecnologicamente mais avançado, já não é possível deixar de acompanhar as novas tendências. Assim sendo, a adMedia foi criada com a missão de disponibilizar a mais nova tecnologia a todos aqueles que desejam, tenham conhecimentos ou não. Tendo já trabalhado com diversos clientes, contamos com um feedback 100% positivo, o que nos permite abraçar o seu desafio com a maior confiança, que em conjunto trabalhando em prol da sua empresa conseguiremos encontrar as melhores soluções ajustada ao seu problema.
					</header>

					<!-- One -->
						<section class="wrapper style2 container special-alt">
							<div class="row 50%">
								<div class="8u 12u(narrower)">

									<header>
										<p>Se antigamente a porta de entrada era a primeira imagem da sua empresa, hoje o seu website é a primeira imagem. Como tal acreditamos que um website bem construido, tanto a nível tecnologico, bem como de imagem deve ser uma prioridade para qualquer empresa. Assim oferecemos um serviço de webdesign 100% dedicado ao cliente.</p>
									</header>
								</div>
								<div class="4u 12u(narrower) important(narrower)">

									<ul class="featured-icons">
										<li><span class="icon fa-pencil"><span class="label">Feature 1</span></span></li>
										<li><span class="icon fa-desktop"><span class="label">Feature 2</span></span></li>
										
									</ul>

								</div>
							</div>
						</section>

					<!-- Two -->
						<section class="wrapper style1 container special">
							<div class="row">
								<div class="4u 12u(narrower)">

									<section>
										<span class="icon featured fa-briefcase"></span>
										<header>
											<h3>A NOSSA MISSÃO</h3>
										</header>
										<p style="text-align: justify;">Muitas vezes as novas empresas bem como as antigas não estão a par das novas tecnologias dentro do seu mercado. Essa é a nossa missão. Através do nosso serviço de consultoria iremos apresentar as melhores soluções para a sua empresa, de forma a aumentar a sua produtividade, bem como em alguns casos reduzindo os seus gastos.</p>
									</section>

								</div>
								<div class="4u 12u(narrower)">

									<section>
										<span class="icon featured fa-desktop"></span>
										<header>
											<h3>PRODUÇÃO</h3>
										</header>
										<p style="text-align: justify;">Quando o software comum já não serve e como nenhuma empresa é igual a outra é necessário, muitas vezes, ter software criado à medida da sua empresa. Como tal o serviço de produção de software da adMedia tem como objectivo a criação de um software à medida da sua empresa.</p>
									</section>

								</div>
								<div class="4u 12u(narrower)">

									<section>
										<span class="icon featured fa-users"></span>
										<header>
											<h3>REDES SOCIAIS</h3>
										</header>
										<p style="text-align: justify;">Longe vão os tempos em que a publicidade e o contacto com o cliente era esporadico e sempre numa versão presencial. Hoje em dia a maior parte dos clientes têm contacto diário com as suas empresas de eleição através das diversas redes sociais. Com o serviço de gestão de redes sociais da adMedia, terá contacto diário com os seus clientes.</p>
									</section>

								</div>
							</div>
						</section>

					<!-- Three -->
						<section class="wrapper style3 container special">

							<header class="major">
								<h2>O NOSSO <strong>PORTOFÓLIO</strong></h2>
							</header>
							<div class="row">
								<?php require_once 'system/includes/portofolioIndex.php' ?>
							</div>

							<footer class="major">
								<ul class="buttons">
									<li><a href="portofolio.php" class="button">VER MAIS <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></li>
								</ul>
							</footer>

						</section>

				</article>

			<!-- CTA -->
				<section id="cta">

					<header>
						<h2>FICOU COM DÚVIDAS?</h2>
						<p>Não hesite em contactar-nos. Responderemos o mais breve possível.</p>
					</header>
					<footer>
						<ul class="buttons">
							<li><a href="contact.html" class="button">CONTACTE-NOS!</a></li>
						</ul>
					</footer>

				</section>

			<?php require_once('system/includes/footer.php'); ?>

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