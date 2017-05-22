<?php
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
	die(header('HTTP/1.0 403 Forbidden'));
}

$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
if($pos===false){
  die(header('HTTP/1.0 403 Forbidden'));
}

require_once '../../core/init.php';

$typeOfImage = (isset($_POST['typeOfImage'])) ? preg_replace('/[^A-Za-z\_]/', '', $_POST['typeOfImage']): NULL;
$id = (isset($_POST['id'])) ? preg_replace('/\D/', '', $_POST['id']) : NULL;

if($typeOfImage == 'MAIN_IMAGE'){
	$result = $db->ObjectBuilder()->where('id', $id)->getOne('projects');

	if($result->mainimage != 'noimg.png'){
		if(file_exists('../../images/projects/'.$result->mainimage)){
			unlink('../../images/projects/'.$result->mainimage); // remove Image!
		}
		if($db->where('id', $id)->update('projects', ['mainimage' => 'noimg.png'])){
			die(json_encode(['success' => true]));
		}else {
			die(json_encode(['success' => false]));
		}
	}
	die(json_encode(['success' => false]));
	

}elseif($typeOfImage == 'ADITIONAL_IMAGE'){

	$result = $db->ObjectBuilder()->where('id', $id)->getOne('images');

	if(file_exists('../../images/projects/'.$result->name)){
		unlink('../../images/projects/'.$result->name); // remove Image!
	}
	$result = $db->where('id', $id)->delete('images');
	die(json_encode(['success' => $result]));
}

