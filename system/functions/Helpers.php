<?php
/* Clean the string, used for output by 13 (: */
function h( $s ) {
    return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}
/*
function alert($class = null, $title = null, $msg = null){
	session_clean('alert'); //clean!
	$_SESSION['alert'] = [
		'class' => $class,
		'title' => $title,
		'msg' => $msg ];
}*/

function alert($class = null, $title = null, $msg = null){
	echo "<script>alertMessage('".$class."', '".$title."', '".$msg."');</script>";

}

function session_clean($name) {
	if(isset($_SESSION[$name])){
		unset($_SESSION[$name]);
	}
}
function reloadPage(){
	 $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
	echo '<meta http-equiv="Refresh" content="1;' . $url . '">';
}


/**
 * Verifica se o utilizador entrou
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}


function redirect($page){
	header("Location: " . $page);
	exit();
}
function truncate($text, $chars = 25) {
    return mb_strimwidth($text, 0, $chars, "...");
}

/**
 * upload multiple images or single 
 * @param  [string]  $nameFile         [name of input file]
 * @param  integer $projectImagesCount [how many images the project has]
 * @param  integer $maxImages 		   [max images to upload]
 * @return [string, array]             [return array of images or error - string]
 */
function uploadImage($nameFile, $projectImagesCount = 0, $maxImages = 5) {

	if((!empty($_FILES[$nameFile])) && ($_FILES[$nameFile]['error'][0] == 0)){

		$target_path = '../images/projects/';
		$maxSize = 2000000; // 2mb


		if($projectImagesCount >= $maxImages && $maxImages > 1){
			//alert('warning', 'Ups!', 'O seu projeto já contem '.$maxImages.' images!');
			return 'PROJECT_MAX_IMAGES';
		}

		if(count($_FILES[$nameFile]['name']) > $maxImages && $maxImages != 1){
			//alert('warning', 'Ups!', 'Porfavor selecione apenas '.$maxImages.' images');
			//return false;
			return 'MAX_IMAGES';
		}

		for ($i = 0; $i < count($_FILES[$nameFile]['name']); $i++) {

		
			$validextensions = array('jpeg', 'jpg', 'png');
			$ext = explode('.', basename($_FILES[$nameFile]['name'][$i]));  

			$file_extension = end($ext);
			$imgName = md5(uniqid()) . "." . $ext[count($ext) - 1];  
			$target_path1 = $target_path . $imgName; 

			if ($_FILES[$nameFile]['size'][$i] < $maxSize && in_array($file_extension, $validextensions)) {
				if (!move_uploaded_file($_FILES[$nameFile]['tmp_name'][$i], $target_path1)) {
					//alert('danger', 'Ups!', 'Could not upload image ('.$j.'), please try later!');
					return 'ERROR_MOVE_FILE';

				}else{
					$arrayImages[] = $imgName;


				}
			} else { 
				//alert('danger', 'Ups!', 'Could not upload image ('.$j.'), please try another extension or another size!');
				return 'ERROR_EXT_OR_SIZE';
			}
		}
		return $arrayImages;
	}
	
}