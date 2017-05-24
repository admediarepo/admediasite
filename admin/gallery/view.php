<?php
	$images = $db->ObjectBuilder()->get('images');
	$mainImages = $db->ObjectBuilder()->get('projects');
?>

<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
		    <div class="panel-heading" style="font-size: 20px; font-weight: 500;">
		        PROJECTS MAIN IMAGES 
		    </div><hr>
		    <div class="panel-body">
		    	<div style="margin: 0 auto; display: block; text-align: center;">
		    	<?php foreach ($mainImages as $img): ?>
			    	<?php if(file_exists('../images/projects/'.$img->mainimage)): ?>
			    		<a href="?page=projects/update&id=<?= $img->id ?>">
		                <img class="img-thumbnail" src="../images/projects/<?= $img->mainimage ?>" style="max-height: 100px; height: 100px;margin: 5px; width: 100px;object-fit: cover;" />
		                </a>
		            <?php endif; ?>
	            <?php endforeach; ?>
	            </div>
		    </div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
		    <div class="panel-heading" style="font-size: 20px; font-weight: 500;">
		        PROJECTS ADITIONAL IMAGES
		    </div><hr>
		    <div class="panel-body">
		    <div style="margin: 0 auto; display: block; text-align: center;">
		    <?php foreach ($images as $img): ?>

		    	<?php if(file_exists('../images/projects/'.$img->name)): ?>
		    		<a href="?page=projects/update&id=<?= $img->project_id ?>">
	                <img class="img-thumbnail" src="../images/projects/<?= $img->name ?>" width="100" style="max-height: 100px; height: 100px; width: 100px;object-fit: cover; margin: 5px;" />
	                </a>
	            <?php endif; ?>
	             <?php endforeach; ?>
	             </div>
		    </div>
		</div>
	</div>
</div>