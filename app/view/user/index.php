
<?php include('app/view/partials/header.php'); ?>
<?php include('app/view/partials/top_menu.php'); ?>
<?php include('app/view/partials/notices.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h1 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="glyphicon glyphicon-user"></i> <strong>User list</strong></h1>
        <div class="btn-group pull-right">
            <a href="<?=SITEURL;?>/user/add" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Add new </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-responsive table-striped table-hover">
            <thead style="background: #eee">
                <tr>
                    <th width="50">#ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Group</th>
                    <th class="text-center">Status</th>
                    <th>Date registred</th>
                    <th>Date modified</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php if($users): ?>
                    <?php foreach($users as $user):?>
                         <tr>
                            <td><a href="<?= SITEURL; ?>/user/details/<?= $user['id'];?>">  #<?= $user['id'];?> </a></td>
                            <td><?= $user['username'];?> </td>
                            <td><?= $user['email'];?> </td>
                            <td><span class="badge <?= $user['group'] === "Administrator" ? 'badge-red' : 'badge-default'; ?> "><?= $user['group'] ;?></span> </td>
                            <td width="250" class="text-center"><?= $user['activated'] == 1 ? '<i class="glyphicon glyphicon-ok-circle ok"  data-toggle="tooltip" data-placement="top" title="Activated">' : '<i class="ban glyphicon glyphicon-ban-circle"  data-toggle="tooltip" data-placement="top" title="Banned"> ' ;?> </td>
                            <td><?= $user['registred'];?> </td>
                            <td><?= $user['modified'];?> </td>
                            <td>
                                <a href="<?=SITEURL;?>/user/edit/<?= $user['id'];?>" class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-edit"></i>  </a>
                                <a href="<?=SITEURL;?>/user/delete/<?= $user['id'];?>" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirm('Are you sure you want to delete #<?= $user['id']?> the user account');"><i class="glyphicon glyphicon-remove-circle"></i>  </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td></td><td></td><td></td><td></td>
                        <td>0 users found.             <a href="<?=SITEURL;?>/user/add">  Add new </a>
                        </td><td></td><td></td>
                    </tr>
                 <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>




<?php include('app/view/partials/footer.php'); ?>
