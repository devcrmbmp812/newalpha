<?php
require_once './dbconfig.php';
session_start();
require_once './includes/log_function.php';

$db = getDbInstance();
//logout log activity insert
$login_db_data['sysCustomerId'] = $_SESSION['user_id'];
$login_db_data['sysUserId'] = $_SESSION['user_id'];
$login_db_data['LogType'] = "Logout";
$login_db_data['LogDate'] = date('Y-m-d H:i:s');
$login_db_data['LogSubject'] = "Logout";
$login_db_data['LogDescription'] = "User log out";
$login_db_data['LogDeleted'] = 'False';
$login_db_data['LogIpaddress'] = get_ip_address();
$login_db_data['LogDevice'] = get_device_type();

$last_id = $db->insert('systemlog', $login_db_data);

if ($last_id)
{
    $_SESSION['success'] = 'log recording success';
}
else
{
    echo 'Insert failed: ' . $db->getLastError();
    $_SESSION['failure'] = 'log recording failure';
}

session_destroy();


if(isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token'])){
	clearAuthCookie();
}
header('Location:index.php');
exit;

 ?>