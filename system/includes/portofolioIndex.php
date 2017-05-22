<?php $trabalhos = $db->get('projects', 4) ?>

<?php foreach ($trabalhos as $trabalho): ?>

	<div class="6u 12u(narrower)">
		<section style="word-wrap: break-word;text-align: justify;">
			<a href="#<?= $trabalho['id'] ?>" class="image featured"><img src="images/<?= $trabalho['image'] ?>" alt="<?= $trabalho['title'] ?>" /></a>
			<header>
				<h3><?= $trabalho['title'] ?></h3>
			</header>
			<p><?= $trabalho['sum'] ?></p>
		</section>
	</div>

<?php endforeach; ?>
