
<?php
    $projects = $db->get('projects');
?>

<div class="row">
    <div class="col-md-12">
	<div class="panel panel-default">
                        <div class="panel-heading">
                            Your projects!
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>IMAGE</th>
                                            <th>TITLE</th>
                                            <th>SUM</th>
                                            <th>DESCRIPTION</th>
                                            <th>TYPE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($projects as $project): ?>
                                        <tr id="<?= h($project['id']) ?>">
                                        <td><?php if(file_exists('../images/projects/'.$project['mainimage'])): ?>
                                            <img class="img-thumbnail" src="../images/projects/<?= $project['mainimage'] ?>" width="50" />
                                        <?php else: ?>
                                            <img class="img-thumbnail" src="../images/projects/noimg.png" width="50" />
                                            <?php endif;?>
                                        </td>
                                            <td><?= h($project['title']) ?></td>
                                            <td><?= truncate(h($project['sum']),30) ?></td>
                                            <td><?= truncate(h($project['desc']),60) ?></td>
                                            <td><?= h($project['type']) ?></td>
                                            <td style="text-align: center;">
                                            <a href="?page=projects/update&id=<?=$project['id']?>">
                                            <button class="btn btn-primary" id="btn-edit" attr-id="<?= $project['id'] ?>" ><i class="fa fa-pencil"></i></button>
                                            </a>

                                            </td>
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