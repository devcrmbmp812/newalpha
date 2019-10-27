<?php
session_start();
require_once 'dbconfig.php';

// If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE)
{
	header('Location: index.php');
}

// If user has previously selected "remember me option": 

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online vagtplan">
    <meta name="author" content="Zenplan.dk">
    <link rel="icon" href="/images/favicon.ico">

    <title><?php echo SITE_PAGE;?> | <?php echo SITE_NAME;?> - <?php echo SITE_URL;?></title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="/css/bootstrap-extend.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/css/master_style.css">

    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="/css/skins/_all-skins.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">
        <div class="col-lg-4 col-md-8 col-12">
            <div class="login-box">
                <div class="login-box-body">
                     <center>
                        <img src="/images/logo/logo-light.png" alt="logo"> &nbsp; 
                        <img src="/images/logo/logo-light-text.png" alt="logo" class="light-logo" width="130px">
                    </center>
                    <h3 class="text-center">Log ind</h3>

                    <form action="/login-authenticate.php" method="post">
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control rounded" placeholder="E-mail" required="required" autocomplete="off">
                            <span class="ion ion-email form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control rounded" placeholder="Adgangskode" required="required" autocomplete="off">
                            <span class="ion ion-locked form-control-feedback"></span>
                        </div>
                        <?php if (isset($_SESSION['login_failure'])): ?>
                            <div class="alert alert-danger alert-dismissable in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php
                                echo $_SESSION['login_failure'];
                                unset($_SESSION['login_failure']);
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info btn-block margin-top-10">Log ind</button>
                            </div>
                        </div>

                        <div class="margin-top-30 text-center">
                        <p>Online vagtplan leveret af <a href="http://www.zenplan.dk" class="text-warning ml-5">www.Zenplan.dk</a></p>
                    </div>
                    
                    </form>
                </div>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->

        </div>
    </div>
</div>


<!-- jQuery 3 -->
<script src="/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- popper -->
<script src="/assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
