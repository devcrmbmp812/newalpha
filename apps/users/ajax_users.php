<?php
session_start();
require_once '../../dbconfig.php';
// Costumers class
$db = getDbInstance();
if(isset($_POST['mode']) && $_POST['mode'] == 'edit') {
    $db->where('id', $_POST['id']);
    $row = $db->getOne('tbl_users');
    echo json_encode($row);
}
?>