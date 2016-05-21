<?php if(isset($_SESSION['message']['error'])):?>
<div class="alert alert-danger fade in">
    <div class="glyphicon glyphicon-exclamation-sign"></div>

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error:</strong> <?= $_SESSION['message']['error']; ?>
</div>
<?php unset($_SESSION['message']['error']); ?>

<?php endif; ?>

<?php if(isset($_SESSION['message']['warning'])):?>
<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong>     <?= $_SESSION['message']['error']; ?></div>
<?php unset($_SESSION['message']['warning']); ?>
<?php endif; ?>


<?php if(isset($_SESSION['message']['success'])):?>
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong>     <?= $_SESSION['message']['success']; ?>
 </div>
<?php endif; ?>
<?php unset($_SESSION['message']['success']); ?>

