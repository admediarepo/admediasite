<?php
	require 'includes/phpmailerConfigure.php';

	$messageId = isset($_GET['id']) ? preg_replace('/\D/', '', $_GET['id']) : NULL;
	$message = $db->ObjectBuilder()->where('id', $messageId)->getOne('messages');
	$answersMessages = $db->ObjectBuilder()->where('message_id', $messageId)->get('answers');
	if($message):
?>

<style type="text/css">

.details> h5 {
	font-weight: 700;
	font-size: 18px;
	display: inline; 
}
.details > span {
	display: inline; 
	font-size: 16px;
	line-height:40px;
}
.details {
	margin:10px;
}
</style>
<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
            <div class="panel-heading" style="font-size: 20px; font-weight: 500;">
                <h3>Message of <?= h($message->name) ?></h3>
            </div><hr>
            <div class="panel-body">
	    		<div class="details">
	    			<h5>Sender:</h5>
	    			<span><?= h($message->name)?></span>
	    		</div>

	    		<div class="details">
	    			<h5>Email:</h5>
	    			<span><?= h($message->mail)?></span>
	    		</div>

	    		<div class="details">
	    			<h5>Subject:</h5>
	    			<span><?= h($message->subject)?></span>
	    		</div>

	    		<div class="details">
	    			<h5>Message:</h5>
	    			<span><?= h($message->message)?></span>
	    		</div>

	    		<div class="details">
	    			<h5>Date:</h5>
	    			<span><?= h($message->data)?></span>
	    		</div>
    		</div>
    	</div>
    </div>
</div>

<?php
if($answersMessages):
	$c = 0;
	foreach ($answersMessages as $messageAnswer):
		$c++;
	 ?>
	
<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
            <div class="panel-heading" style="font-weight: 500;">
                <h3 style="font-size: 20px; ">Answer #<?= $c ?> </h3>
            </div><hr>
            <div class="panel-body">
	    		<div class="details">
	    			<h5>Subject:</h5>
	    			<span><?= $messageAnswer->subject ?></span>
	    		</div>
	    		<div class="details">
	    			<h5>Message:</h5>
	    			<span><?= $messageAnswer->message ?></span>
	    		</div>
    		</div>
    	</div>
    </div>
</div>

<?php  endforeach; ?>
<?php else: ?>

<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
            <div class="panel-heading" style="font-weight: 500;">
                <h3 style="font-size: 20px; ">No answers for this message!</h3>
            </div>
            <div class="panel-body">
    		</div>
    	</div>
    </div>
</div>

<?php endif; ?>

<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
            <div class="panel-heading" style="font-weight: 500;">
                <h3 style="font-size: 20px; ">Send email? </h3>
                <span style="font-size: 14px; ">The email will be sent to <b><?= h($message->mail)?></b></span>
            </div><hr>
            <div class="panel-body">
	    		<form method="POST">
		    		<div class="form-group">
		                <p class="help-block">Subject:</p>
		                <input class="form-control" type="text" name="subject" placeholder="Insert email subject..."  value="RE: <?= $message->subject ?> - AdMedia">
		            </div>
		            <div class="form-group">
		                <p class="help-block">Message:</p>
		                <textarea name="message" class="form-control" rows="10" cols="50" minlength="20" ></textarea>
		            </div>
		            <div class="form-group">
		                <input class="btn btn-admedia" type="submit" name="submitAnswer" style="float: right;" value="Send Email" >
		            </div>
	    		</form>
    		</div>
    	</div>
    </div>
</div>

<?php else: ?>
<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
            <div class="panel-heading" style="font-size: 20px; font-weight: 500;">
               <h2 style="text-align: center;">Lamentamos, mas esta mensagem não existe!</h2>
            </div><hr>
            <div class="panel-body">
				<section>
					<img src="../images/nothing.png" style="margin: auto;opacity: 0.7;display: block;" /></a>
				</section>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php

if(isset($_POST['submitAnswer'])){

	$messageForm = !empty($_POST['message'])?  filter_var($_POST['message'], FILTER_SANITIZE_STRING) : NULL;

    $subject = !empty($_POST['subject'])?  filter_var($_POST['subject'], FILTER_SANITIZE_STRING) : NULL;
    if($messageForm == NULL){
    	alert('warning', 'Ups!', 'Escreva uma mensagem!');
		return false;
    }
    if($subject == NULL){
    	alert('warning', 'Ups!', 'Escolha um assunto!');
		return false;
    }

    $data = [
    	'subject' => $subject,
    	'message' => $messageForm,
    	'message_id' => $message->id,
    	'date' => date('d-m-Y H:i:s'),
    ];


	$mail->addAddress($message->mail, $message->name);  
	$mail->addReplyTo($message->mail, $subject);
	/*$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('info@example.com', 'Information');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com'); */

	$mail->Subject = $subject;
	$mail->Body    = $messageForm;
	$mail->AltBody = $messageForm;
	if(!$db->insert('answers',  $data)) {
		alert('danger', 'Error!', 'Erro ao gravar na base de dados '. $db->getLastError());
		return false;
	}

	if($mail->send()) {
		alert('success', 'Sucesso!', 'Resposta enviada com sucesso!');
		return true;
	    
	} else {
		if($mail->ErrorInfo){
			alert('danger', 'Error!', 'PhpMailer:'. $mail->ErrorInfo);
		}
		return false;
	}

    
}