<?php ob_start(); ?>
<?php require_once '../core/init.php'; ?>
<?php
    if(isLoggedIn())
    {
        redirect('index.php');
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
                <div class="account-wall">
                    <img class="profile-img" src="../images/logo_horizontal.png" alt="AdMedia">
                    <form class="form-signin" method="POST">
                        <input type="text" class="form-control" placeholder="Email" name="email" autofocus>
                        <input type="password" class="form-control" placeholder="Password" name="password" >
                        <button class="btn btn-lg btn-admedia btn-block" type="submit" name="submitLogin" style="border-radius: 0; c">Login</button>
                    </form>
                </div><br>
                <h4 style="text-align:center; color:#5c6771; margin:0 auto;">Made with <i class="fa fa-heart"></i> AdMedia &copy; 2017</h4>
            </div>

        </div>

    </div>

<!-- JS Scripts-->
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>
<?php
$db->insert('users', ['email' => 'admedia@admedia.com', 'password' => password_hash('admedia13', PASSWORD_BCRYPT)]);

if(isset($_POST['submitLogin'])){

    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : NULL;
    $password = isset($_POST['password']) ? $_POST['password'] : NULL; 

    if($email == NULL){
        alert('danger', 'Ups!', 'Por favor, introduza um email!');
        return false;
    }elseif($password == NULL){
        alert('warning', 'Ups!', 'Por favor, introduza uma password!');
        return false;
    }

    $login = $db->ObjectBuilder()->where('email', $email)->getOne('users');
    if($db->count == 0){
         alert('danger', 'Ups!','Email ou password incorreta, por favor tente novamente!');
        return false;
    }elseif($db->count > 1){
        alert('danger', 'Ups!', 'Email ou password incorreta, por favor tente novamente!');
        return false;
    }else{
        $isPasswordCorrect = password_verify($password, $login->password);
        if(!$isPasswordCorrect){
            alert('danger', 'Ups!','Email ou password incorreta, por favor tente novamente!');
            return false;
        }else{
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $login->id;
            redirect('index.php');
            alert('success', 'Sucesso!', 'Redirecionado...');

        }
    } 

}