<?php
require_once './dbconfig.php';
session_start();

require_once './includes/log_function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$username = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');

	// Get DB instance.
	$db = getDbInstance();

	$db->where('user_email', $username);
	$row = $db->getOne('tbl_users');

	if ($db->count >= 1)
    {
		$db_password = $row['password'];
		$user_id = $row['id'];

		if (password_verify($password, $db_password))
        {
			$_SESSION['user_logged_in'] = TRUE;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_name'] = $row['first_name'];

            //login log activity insert
            $login_db_data['sysCustomerId'] = $_SESSION['user_id'];
            $login_db_data['sysUserId'] = $_SESSION['user_id'];
            $login_db_data['LogType'] = "Login";
            $login_db_data['LogDate'] = date('Y-m-d H:i:s');
            $login_db_data['LogSubject'] = "Login";
            $login_db_data['LogDescription'] = "User log in";
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

			// Authentication successfull redirect user
			header('Location: index.php');
		}
        else
        {
			$_SESSION['login_failure'] = 'Forkert brugernavn eller adgangskode!';
			header('Location: login.php');
		}
		exit;
	}
    else
    {
		$_SESSION['login_failure'] = 'Forkert brugernavn eller adgangskode!';
		header('Location: login.php');
		exit;
	}
}
else
{
	die('Method Not allowed');
}
