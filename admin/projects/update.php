<?php
	$id = isset($_GET['id']) ? preg_replace('/\D/', '', $_GET['id']) : NULL;
	$project = $db->ObjectBuilder()->where('id', $id)->getOne('projects');
	$types = $db->ObjectBuilder()->get('types');

	$projectAditionalImages = $db->ObjectBuilder()->where('project_id',$id)->get('images');
	$projectAditionalImagesCount = $db->count;

?>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Projects<small> Update project!</small>
        </h1>
        	<form method="POST" enctype="multipart/form-data">
	            <div class="form-group">
	                <p class="help-block">Title:</p>
	                <input class="form-control" type="text" name="title" placeholder="Insert project title..." value="<?= $project->title ?>">
	            </div>

	            <div class="form-group">
	                <p class="help-block">Summary:</p>
	                <textarea name="sum" class="form-control" rows="2" cols="50" minlength="20" ><?= $project->sum ?></textarea>
	            </div>
	            <div class="form-group">
	                <p class="help-block">Description:</p>
	                <textarea name="desc" class="form-control" rows="8" cols="50" minlength="50"><?= $project->desc ?></textarea> 
	            </div>
	            <div class="row">
    				<div class="col-md-6">
			            <div class="form-group">
			                <p class="help-block">Main Image:</p>
			                <input class="form-control" type="file" name="main_image[]" >
			            </div>
				            <div class="preview-imgs" attr-project-id="<?= $project->id ?>">
					            <img src="../images/projects/<?= $project->mainimage ?>" class="img-thumbnail" width="100">
					            <button type="button" class="img-remove" attr-project-id="<?= $project->id ?>">&#10006;</button>
				            </div>
			        </div>
			        <div class="col-md-6">
		   	            <div class="form-group">
			             <p class="help-block">Adicional Images:</p>
			              <input class="form-control" type="file" size="5" name="imageAditional[]" multiple>
			            </div>
			            <?php foreach($projectAditionalImages as $img): ?>
				            <div class="preview-imgs" attr-image-id="<?= $img->id ?>">
					            <img src="../images/projects/<?= $img->name ?>" class="img-thumbnail" width="100">
					            <button type="button" class="img-remove" attr-image-id="<?= $img->id ?>">&#10006;</button>
				            </div>
			            <?php endforeach; ?>
	            	</div>
	            </div>
	            <div class="form-group">
	                <p class="help-block">Type:</p>
	                <select name="type" class="form-control">
	                	<?php foreach($types as $type): ?>
	                		<option value="<?= $type->id ?>" <?= ($type->id == $project->type) ? 'selected' : ''; ?>><?= $type->name ?></option>
	                	<?php endforeach; ?>
	                </select>
	            </div>
	            <div class="form-group">
	            	<br>
	                <input type="submit" name="submitUpdate" class="btn btn-admedia" value="Update project" style="float:right;">
	            </div>
            </form>
    </div>
</div>
<?php

if(isset($_POST['submitUpdate'])){

	$projectTitle = isset($_POST['title']) ? h($_POST['title']) : NULL;
	$projectSum = isset($_POST['sum']) ? h($_POST['sum']) : NULL;
	$projectMainImage = isset($_POST['main_image']) ? h($_POST['main_image']) : NULL;
	$projectDesc = isset($_POST['desc']) ? h($_POST['desc']) : NULL;
	$projectType = isset($_POST['type']) ? $_POST['type'] : NULL;


	if($projectTitle == NULL){
		alert('warning', 'Ups!', 'Preencha o titulo!');
		return false;
	}

	if(strlen($projectTitle) > 200){
		alert('warning', 'Ups!', 'Titulo não pode conter mais de 100 caracteres');
		return false;
	}

	if($projectSum == NULL){
		alert('warning', 'Ups!', 'Preencha o sumario!');
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

	if($projectDesc == NULL){
		alert('warning', 'Ups!', 'Preencha a Descrição!');
		return false;
	}

	if(strlen($projectDesc) > 3000){
		alert('warning', 'Ups!', 'Descrição não pode conter mais de 500 caracteres');
		return false;
	}
	
	$mainImage = uploadImage('main_image', 1, 1);
	if($mainImage == 'MAX_IMAGES'){
		alert('warning', 'Ups!', 'Porfavor selecione apenas 1 imagem');
		return false;
	}elseif($mainImage == 'ERROR_MOVE_FILE'){
		alert('danger', 'Ups!', 'Não conseguimos fazer upload da(s) imagem(ns), tente mais tarde!');
		return false;
	}elseif($mainImage == 'ERROR_EXT_OR_SIZE'){
		alert('danger', 'Ups!', 'Imagem com extensão inválida ou tamanho maior que 2MB!');
		return false;
	} 
	
	$aditionalImages = uploadImage('imageAditional', $projectAditionalImagesCount, 4);
	if($aditionalImages == 'MAX_IMAGES'){
		alert('warning', 'Ups!', 'Porfavor selecione apenas 5 imagens');
		return false;
	}elseif($aditionalImages == 'ERROR_MOVE_FILE'){
		alert('danger', 'Ups!', 'Não conseguimos fazer upload da(s) imagem(ns), tente mais tarde!');
		return false;
	}elseif($aditionalImages == 'ERROR_EXT_OR_SIZE'){
		alert('danger', 'Ups!', 'Imagem com extensão inválida ou tamanho maior que 2MB!');
		return false;
	}elseif($aditionalImages == 'PROJECT_MAX_IMAGES'){
		alert('danger', 'Ups!', 'O seu projeto ja contem 5 images!');
		return false;
	}

	/**
	 * Delete existing images!
	 
	if($projectAditionalImagesCount > 0){
		foreach ($projectAditionalImages as $img) {
			$db->where('project_id', $id);
			$db->delete('images');
		}
	}*/

	/**
	 * Insert new ones!
	 */
	if(isset($aditionalImages)){
		foreach ($aditionalImages as $img) {
			$db->insert('images', ['name'=> $img, 'project_id' => $id]);
		}
	}
	
	$data = [	
		'sum' => $projectSum,
		'desc' => $projectDesc,
		'title' => $projectTitle,
		'type' => $projectType,
	];

	/**
	 * If the mainImage is a array
	 */
	if(is_array($mainImage) || ($mainImage instanceof Traversable)){
		$data['mainimage'] = $mainImage[0];
		if(file_exists('../../images/projects/' . $project->mainimage) && $project->mainimage != 'noimg.png'){
			unlink('../../images/projects/' . $project->mainimage);
		}
		

	} 

	if($db->where('id',$id)->update ('projects', $data)){
		//redirect('index?page=projects/get');
	    alert('success', 'Success!', 'Projecto atualizado com sucesso!');

	}

}