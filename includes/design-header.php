<?PHP
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "";
    }
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    } else {
        $mode = "";
    }

//Including functions and security check
include_once('functions.php'); 
//Validation if a user has logged in
require_once 'auth_validate.php';

?>
<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Zenplan.dk">
    <link rel="icon" href="/images/favicon.ico">

    <title><?php echo SITE_PAGE;?> | <?php echo SITE_NAME;?> - <?php echo SITE_URL;?></title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="/css/bootstrap-extend.css">

    <!-- theme style -->
    <link rel="stylesheet" href="/css/master_style.css">

    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="/css/skins/_all-skins.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

