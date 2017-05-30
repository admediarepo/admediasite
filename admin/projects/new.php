<?php

$types = $db->ObjectBuilder()->get('types');
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Projects<small> Create a new project!</small>
        </h1>
        	<form method="POST" enctype="mutipart/form-data">
	            <div class="form-group">
	                <p class="help-block">Title:</p>
	                <input class="form-control" type="text" name="title" placeholder="Insert project title...">
	            </div>

	            <div class="form-group">
	                <p class="help-block">Summary:</p>
	                <textarea name="sum" class="form-control" rows="2" cols="50" minlength="20" ></textarea>
	            </div>
	            <!--div class="form-group">
	                <p class="help-block">Main Image:</p>
	                <input class="form-control" type="file" name="main_image">
	            </div>
   	            <div class="form-group">
	             <p class="help-block">Adicional Images:</p>
	              <input class="form-control" type="file" name="images" multiple="true">
	            </div-->
	            <div class="form-group">
	                <p class="help-block">Description:</p>
	                <textarea name="desc" class="form-control" rows="8" cols="50" minlength="50"></textarea> 
	            </div>
	            <div class="form-group">
	                <p class="help-block">Type:</p>
	                <select name="type" class="form-control">
	                	<?php foreach($types as $type): ?>
	                		<option value="<?= $type->id ?>"><?= $type->name ?></option>
	                	<?php endforeach; ?>
	                </select>
	            </div>
	            <div class="form-group">
	            	<br>
	                <input type="submit" name="submitNew" class="btn btn-admedia" value="Create a new project" style="float:right;">
	            </div>
            </form>
    </div>
</div>


<?php

if(isset($_POST['submitNew'])){

	$projectTitle = isset($_POST['title']) ? h($_POST['title']) : NULL;
	$projectSum = isset($_POST['sum']) ? h($_POST['sum']) : NULL;
	$projectMainImage = isset($_POST['main_image']) ? h($_POST['main_image']) : NULL;
	$projectDesc = isset($_POST['desc']) ? h($_POST['desc']) : NULL;
	$projectType = isset($_POST['type']) ? $_POST['type'] : NULL;

	if($projectTitle == NULL){
		alert('danger5', 'Ups!', 'Preencha o titulo!');
		return false;
	}

	if($projectSum == NULL){
		alert('danger3', 'Ups!', 'Preencha o sumario!');
		return false;
	}

	if($projectDesc == NULL){
		alert('danger2', 'Ups!', 'Preencha a Descrição!');
		return false;
	}

	if(strlen($projectTitle) > 200){
		alert('warning', 'Ups!', 'Titulo não pode conter mais de 100 caracteres');
		return false;
	}

	if(strlen($projectSum) > 600){
		alert('warning', 'Ups!', 'Sumario não pode conter mais de 600 caracteres');
		return false;
	}

	if($projectType == NULL){
		alert('warning', 'Ups!', 'Preencha o tipo do projeto!');
		return false;
	}

	$data = [	
		'sum' => $projectSum,
		'desc' => $projectDesc,
		'title' => $projectTitle,
		'type' => $projectType,
	];

	$id = $db->insert('projects', $data);
	if($id){
	    //alert('success', 'Success!', 'Projecto criaco com sucesso! id= '. $id);
	    redirect('?page=projects/update&id='. $id);
	}

}
