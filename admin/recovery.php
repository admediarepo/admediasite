<?php 
ob_start(); 
require_once '../core/init.php';

require_once 'includes/phpmailerConfigure.php';


if(isLoggedIn())
{
    redirect('index.php');
}
$reset_token = (isset($_GET['reset_token'])) ? preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['reset_token']) : NULL;
$email = (isset($_GET['e'])) ? filter_var($_GET['e'], FILTER_SANITIZE_STRING) : NULL;
$email = safe('decrypt', $email);
if($email != NULL && $reset_token != NULL){
    $userByGet = $db->ObjectBuilder()->where('email', $email)->getOne('users');
	$userByGetCount = $db->count;
	if($userByGetCount == 0){
		 redirect('index.php');
	}


}

?>
<!DOCTYPE html>
<html>
<head>
<?php require_once 'includes/header.php'; ?>
   <link href="../assets/css/login.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3">
            <?php if($reset_token == NULL || $email == NULL || $userByGet->password_token != $reset_token): ?>
                <div class="account-wall">
                    <img class="profile-img" src="../images/logo_horizontal.png" alt="AdMedia">
                    <form class="form-signin" method="POST">
                    	<p>We will send you the activation link:</p>
                        <input type="text" class="form-control" placeholder="Email" name="email" autofocus><br/>
                        <button class="btn btn-lg btn-admedia btn-block" type="submit" name="submitRecovery" style="border-radius: 0;">Recovery</button>
                    </form>

                </div>
            <?php else: ?>
            	 <div class="account-wall">
                    <img class="profile-img" src="../images/logo_horizontal.png" alt="AdMedia">
                    <form class="form-signin" method="POST">
                    	<p>Insert new password:</p>
                        <input type="password" class="form-control" placeholder="New Password" name="password" autofocus>
                        <input type="password" class="form-control" placeholder="Confirm password" name="password_c" autofocus><br/>
                        <button class="btn btn-lg btn-admedia btn-block" type="submit" name="submitNewPassword" style="border-radius: 0;">Change Password</button>
                    </form>

                </div>
           	<?php endif; ?>

                <br>
                <h4 style="text-align:center; color:#5c6771; margin:0 auto;">Made with <i class="fa fa-heart"></i> AdMedia &copy; 2017</h4>
            </div>

        </div>

    </div>

<!-- JS Scripts-->
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>
<?php
if($email != NULL && $reset_token != NULL){
 if($userByGet->password_token != $reset_token){
    alert('danger', 'Ups!', 'Este Token é inválido!');
    return false;
    }
}


/**
 * Change password!
 */
if(isset($_POST['submitNewPassword'])){
	$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
	$password_c = filter_input(INPUT_POST,'password_c',FILTER_SANITIZE_STRING);

	if($userByGet->date <= time()){
    	alert('danger', 'Ups!', 'Token expirado!');
        return false;
    }

	if($password == NULL){
        alert('danger', 'Ups!', 'Introduza uma password!');
        return false;
    }
    if($password_c == NULL){
        alert('danger', 'Ups!', 'Introduza a confirmação da password!');
        return false;
    }

   	if($password_c != $password){
        alert('danger', 'Ups!', 'As passwords não coincidem!');
        return false;
    }

    if($db->where('password_token', $reset_token)->update('users', ['password_token' => NULL, 'password' => password_hash($password, PASSWORD_BCRYPT) ])){
		redirect('index.php');
    }


}	
/**
 * Request a new password!
 */
if(isset($_POST['submitRecovery'])){	
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : NULL;
     if($email == NULL){
        alert('danger', 'Ups!', 'Please enter email!');
        return false;
    }

    $user = $db->ObjectBuilder()->where('email', $email)->getOne('users');
    $userCount = $db->count;
    if(!isset($user)){
    	alert('danger', 'Ups!', 'This email dont exists!');
        return false;
    }

    if($email != $user->email || $userCount == 0){
    	 alert('danger', 'Ups!', 'This email dont exists!');
        return false;
    }
    sleep(1);

    if($db->where('id', $user->id)->update('users', [ 'password_token' => sha1(md5(uniqid())), 'date' => strtotime("+5 minutes", time()) ])){
    	$password_token = $db->ObjectBuilder()->where('id', $user->id)->getOne('users')->password_token;

	   	$link = ((isset($_SERVER['HTTPS'])) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']."/admin/recovery?reset_token=" . $password_token . "&e=" . safe('encrypt',$user->email);

		$mail->addAddress('noreplyadmedia@gmail.com'/*$user->email */);  // changeeee!!!!

		$mail->Subject = 'Password reset link';
		$mail->Body    = 'Recently, they asked for a new password,<br>
						<b>if it was not you please ignore this email</b>
						<br>Link for reset password: <br>'. $link . '<br>'
                        . '<b>this link is valid only 5 minutes. </b>';
		$mail->AltBody = 'Recently, they asked for a new password,
						if it was not you please ignore this email
						Link for reset password: '. $link . ' This link is valid only 5 minutes.';

		if($mail->send()) {
			alert('success', 'Sucesso!', 'Foi enviado um email, com a opão de mudar a password!');
			return true;
		} else {
			alert('danger', 'Danger!', 'Problema ao enviar email,tente mais tarde!');
			return true;
		}
    }

}