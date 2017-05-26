<?php 
$recaptcha = $db->ObjectBuilder()->getOne('recaptcha');
$recaptchaCount = $db->count;
?>

<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            Google recaptcha
	        </div>
	        <div class="panel-body">
	        	<form method="POST">
	        		<div class="form-group">
		                <p class="help-block">Public token:</p>
		                <input type="text" name="public" class="form-control" value="<?= (isset($recaptcha)) ? $recaptcha->public : '' ?>" placeholder="<?= (!isset($recaptcha)) ? 'Nenhum token encontrado!' : '' ?>" />
		            </div>
		            <div class="form-group">
		                <p class="help-block">Secret token:</p>
		                <input type="text" name="secret" class="form-control"  value="<?= (isset($recaptcha)) ? $recaptcha->secret : '' ?>" placeholder="<?= (!isset($recaptcha)) ? 'Nenhum token encontrado!' : '' ?>" />
		            </div>
		            <div class="form-group">
		                <input type="submit" name="submitRecaptcha" value="<?= (!isset($recaptcha)) ? 'Insert Tokens' : 'Update Tokens' ?>" class="btn btn-admedia" />
		            </div>
	        	</form>
	        </div>
	    </div>
	</div>
</div>

<?php

if(isset($_POST['submitRecaptcha'])) {
	$secretToken = (isset($_POST['secret'])) ? trim($_POST['secret']) : NULL;
	$publicToken = (isset($_POST['public'])) ? trim($_POST['public']) : NULL;

	if($secretToken == NULL){
		alert('warning', 'Ups!', 'Insira o token secreto!');
		return false;
	}

	if($publicToken == NULL){
		alert('warning', 'Ups!', 'Insira o token publico!');
		return false;
	}
	if ($recaptchaCount == 0) {
		if($db->insert('recaptcha', ['public' => $publicToken, 'secret' => $secretToken])){
			alert('success', 'Viva!', 'O seu Google recaptcha foi atualizado!');
			return false;
		}
	}

	if($db->update('recaptcha', ['public' => $publicToken, 'secret' => $secretToken])){
		alert('success', 'Viva!', 'O seu Google recaptcha foi atualizado!!');
		return false;
	}
	
	


}