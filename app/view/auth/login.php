<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login::Diwanee Priject By Ivan Stojmenovic Ivke</title>

 <!-- Bootstrap -->
 <link href="<?= SITEURL; ?>/public/css/bootstrap.min.css" rel="stylesheet">
 <link href="<?= SITEURL; ?>/public/css/login.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php include('app/view/partials/notices.php'); ?>

                            <form id="login-form" action="<?= SITEURL;?>/auth/authenticate" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <span>Username: demo</span>
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <span>Password: demo</span>
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                             <input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('app/view/partials/footer.php'); ?>
<!-- Scripts -->
<script src="<?= SITEURL;?>/public/js/jquery.min.js"></script>
<script src="<?= SITEURL;?>/public/js/bootstrap.min.js"></script>
<script src="<?= SITEURL;?>/public/js/app.js"></script>

</body>
</html>