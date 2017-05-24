<?php $trabalhos = $db->get('projects', 4) ?>

<?php foreach ($trabalhos as $t => $trabalho): ?>
<?php if( $t == 2 ): ?>
<div class="row">
<?php endif; ?>
	<div class="6u 12u(narrower)">
		<section style="word-wrap: break-word;text-align: justify;">
			<a href="#<?= $trabalho['id'] ?>" class="image featured">
			<?php if(file_exists('images/projects/'.$trabalho['mainimage'])): ?>
			<img src="images/projects/<?= $trabalho['mainimage'] ?>" alt="<?= $trabalho['title'] ?>" style="object-fit: cover; width: 80%; height: 30vh; min-height: 20vh;" /></a>
		<?php else: ?>
			<img src="images/projects/noimg.png" alt="<?= $trabalho['title'] ?>" style="object-fit: cover; width: 80%; height: 30vh; min-height: 20vh;" /></a>
		<?php endif; ?>
			<header>
				<h3 style="text-align:center; font-weight: 600;"><?= $trabalho['title'] ?></h3>
			</header>
			<p><?= $trabalho['sum'] ?></p>
		</section>
	</div>
<?php if( $t > 2 ): ?>
</div>
<?php endif; ?>

<?php endforeach; ?>
