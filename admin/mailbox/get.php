<?php
    $messages = $db->ObjectBuilder()->get('messages');
    if($messages):
?>

<div class="row">
    <div class="col-md-12">
	<div class="panel panel-default">
                        <div class="panel-heading" style="font-size: 20px; font-weight: 500;">
                            YOUR MESSAGES!
                        </div><hr>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>SUBJECT</th>
                                            <th>EMAIL</th>
                                            <th>MESSAGE</th>
                                            <th>DATE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($messages as $message): ?>
                                        <tr>
                                        <td> <?= h($message->id) ?></td>
                                            <td><?= h($message->name) ?></td>
                                            <td><?= h($message->subject) ?></td>
                                            <td><?= h($message->mail) ?></td>
                                            <td><?= truncate(h($message->message),60) ?></td>
                                            <td><?= h($message->data)?></td>
                                            <td style="text-align: center;">
                                            <a href="?page=mailbox/view&id=<?=$message->id?>">
                                            <button class="btn btn-primary" id="btn-edit"><i class="fa fa-eye"></i></button>
                                            </a>

                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!-- data-toggle="modal" data-target="#editmodal" -->

    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 20px; font-weight: 500;">
               <h2 style="text-align: center;">Lamentamos, não existe nenhuma mensagem!</h2>
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