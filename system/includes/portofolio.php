<?php $projects = $db->ObjectBuilder()->get('projects') ?>

<?php foreach ($projects as $project): ?>
			<div class="6u 12u(narrower)">
				<section>
					<a href="#" class="image featured">
					<?php if(file_exists('images/projects/'.$project->mainimage)): ?>
						<img src="images/projects/<?= $project->mainimage ?>" alt="<?= $project->title ?>" width="100" /></a>
					<?php else: ?>
						<img src="images/projects/noimg.png" alt="<?= $project->title ?>" width="100" /></a>
					<?php endif; ?>
					<header>
						<h3 style="text-align: center;"><?= $project->title ?></h3>
					</header>
					<p><?= $project->desc ?></p>
				</section>

			</div>

	<?php endforeach; ?>