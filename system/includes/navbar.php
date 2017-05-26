			<?php
			$typeNavbar = (isset($typeNavbar)) ? $typeNavbar : '';

			if($typeNavbar == 1){
				$class = 'alt';
			}elseif($typeNavbar == 2) {
				$class = '';
			}

			$activeNavbar = (isset($activeNavbar)) ? $activeNavbar : '';

			?>

			<!-- nav bar -->
			<header id="header" class="<?= (isset($class)) ? $class : '' ; ?>">
				<a href="index">
					<div id="logo">
						<img src="images/logo_horizontal.png" height="40" style="margin-left:10px" />
					</div>
				</a>
				<nav id="nav">
					<ul>
						<li class="<?= ($activeNavbar == 'inicio') ? 'current' : ''; ?>"><a href="index">INÍCIO</a></li>
						<li class="<?= ($activeNavbar == 'portofolio') ? 'current' : ''; ?>"><a href="portofolio">PORTOFOLIO</a></li>
						<li class="submenu <?= ($activeNavbar == 'servicos') ? 'current' : ''; ?>" >
							<a href="#">SERVIÇOS</a>
							<ul>
								<li><a href="servicos?type=consultoria">CONSULTORIA</a></li>
								<li><a href="servicos?type=web-design">WEB DESIGN</a></li>
								<li><a href="servicos?type=software">SOFTWARE</a></li>
								<li><a href="servicos?type=redes-sociais">GESTÃO DE REDES SOCIAIS</a></li>
							</ul>
						</li>
						<li class="<?= ($activeNavbar == 'contatos') ? 'current' : ''; ?>"><a href="contact">CONTATOS</a></li>
					</ul>
				</nav>
			</header>
			<!-- /nav bar -->
