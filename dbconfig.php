<?php
//Note: This file should be included first in every php page.
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(__FILE__));

if($_SERVER['HTTP_HOST'] == 'dev.newalphaphptemplate30.com:8081') {// local
    define('BASE_URL', 'http://dev.newalphaphptemplate30.com:8081/');
    define('DB_HOST', "localhost");
    define('DB_USER', "root");
    define('DB_PASSWORD', "");
    define('DB_NAME', "zenplan_dk_db");
} else if($_SERVER['HTTP_HOST'] == 'alpha.zenplan.dk') {// online
    define('BASE_URL', 'http://alpha.zenplan.dk/');
    define('DB_HOST', "mysql90.unoeuro.com");
    define('DB_USER', "zenplan_dk");
    define('DB_PASSWORD', "bgtcnh5k");
    define('DB_NAME', "zenplan_dk_db");
}

define('APP_FOLDER', 'simpleadmin');
define('SITE_NAME', 'Alpha version');
define('SITE_URL', 'Alpha.Zenplan.dk');
define('SITE_PAGE', basename($_SERVER['REQUEST_URI']));
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once BASE_PATH . '/apps/users/lib/MysqliDb/MysqliDb.php';
require_once BASE_PATH . '/apps/users/helpers/helpers.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
 */

/**
 * Get instance of DB object
 */
function getDbInstance() {
    return new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}
?>