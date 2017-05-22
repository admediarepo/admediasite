<?php $trabalhos = $db->get('projects', 4) ?>

<?php foreach ($trabalhos as $trabalho): ?>

	<div class="6u 12u(narrower)">
		<section style="word-wrap: break-word;text-align: justify;">
			<a href="#<?= $trabalho['id'] ?>" class="image featured">
			<?php if(file_exists('images/projects/'.$trabalho['mainimage'])): ?>
			<img src="images/projects/<?= $trabalho['mainimage'] ?>" alt="<?= $trabalho['title'] ?>" width="100" /></a>
		<?php else: ?>
			<img src="images/projects/noimg.png" alt="<?= $trabalho['title'] ?>" width="100" /></a>
		<?php endif; ?>
			<header>
				<h3 style="text-align:center;"><?= $trabalho['title'] ?></h3>
			</header>
			<p><?= $trabalho['sum'] ?></p>
		</section>
	</div>

<?php endforeach; ?>
