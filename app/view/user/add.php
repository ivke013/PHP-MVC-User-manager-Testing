
<?php include('app/view/partials/header.php'); ?>
<?php include('app/view/partials/top_menu.php'); ?>
<?php include('app/view/partials/notices.php'); ?>

<form action="<?= SITEURL;?>/user/add" method="post" accept-charset="UTF-8">
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h1 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="glyphicon glyphicon-plus-sign"></i> <strong>Add new user</strong></h1>
        <div class="btn-group pull-right">
            <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Save </button>
        </div>
    </div>
    <div class="panel-body">
            <fieldset class="form-group">
                <label for="username">Username<span class="required">*</span> </label>
                <input type="text" class="form-control" id="username" name="username">
                <small class="text-muted text-danger"><?= isset($error_username) ? $error_username : null; ?></small>

            </fieldset>
            <fieldset class="form-group">
                <label for="username">Group</label>
                <select name="group" class="form-control">
                    <?php if($groups): ?>
                        <?php foreach($groups as $group): ?>
                            <option value="<?= $group['id'];?>"><?= $group['name'];?></option>
                        <?php endforeach; ?>
                    <?php endif;?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="email">Email address<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" name="email" >
                <small class="text-muted text-danger"><?= isset($error_email) ? $error_email : null; ?></small>
            </fieldset>
            <fieldset class="form-group">
                <label for="password">Password<span class="required">*</span></label>
                <input type="password" class="form-control" name="password" id="password" >
                <small class="text-muted text-danger"><?= isset($error_pass) ? $error_pass : null; ?></small>
            </fieldset>
            <fieldset class="form-group">
                <label for="password2">Password Confirm<span class="required">*</span></label>
                <input type="password" class="form-control" name="password2" id="password2" >
                <small class="text-muted text-danger"><?= isset($error_pass_conf) ? $error_pass_conf : null; ?></small><br>
                <small class="text-muted text-danger"><?= isset($error_pass_match) ? $error_pass_match : null; ?></small>
            </fieldset>
    </div>
</div>

</form>


<?php include('app/view/partials/footer.php'); ?>
