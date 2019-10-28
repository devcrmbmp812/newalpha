<?php
session_start();
require_once '../../dbconfig.php';

//Validation if a user has logged in
require_once '../../includes/auth_validate.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['del_id']) && $_POST['del_id'] != 0) {
        $db = getDbInstance();
        $db->where('id', $_POST['del_id']);
        $update_db_data['LogDeleted'] = "True";
        $status = $db->update('systemlog', $update_db_data);

        if ($status)
        {
            $_SESSION['info'] = "Succesfully updated!";
        }
        else
        {
            $_SESSION['failure'] = "Failed to update";
        }
    }

}
// Costumers class
$db = getDbInstance();
$db->where('LogDeleted', "False");
$db->join('tbl_users', 'tbl_users.id = systemlog.sysUserId');

$rows = $db->get('systemlog');

//Including desgin header + menu
include_once('../../includes/design-header.php');

//Under comes the main part this page
?>

<!-- Data Table-->
<link rel="stylesheet" type="text/css" href="/assets/vendor_components/datatable/datatables.min.css"/>

<?php
//Including design top
include_once('../../includes/design-top.php');

//Insert page content below
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Indstillinger
            <small>logs list</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Hjem</a></li>
            <li class="breadcrumb-item"><a href="/"><i class="fa fa-gears"></i> Indstillinger</a></li>
            <li class="breadcrumb-item active">Logs Overview</li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Logs List</h4>
                    </div>
                    <div class="col-lg-12">

                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="logs" class="table mt-0 table-hover no-wrap table-striped table-bordered" data-page-size="10">
                                <thead>
                                <tr class="bg-dark">
                                    <th>sysCustomerId</th>
                                    <th>sysUserId</th>
                                    <th>LogType</th>
                                    <th>LogDate</th>
                                    <th>LogSubject</th>
                                    <th>LogDescription</th>
                                    <th>LogIpaddress</th>
                                    <th>LogDevice</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($rows as $row): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars('(#'.$row['sysUserId'].') '.$row['first_name'].' '.$row['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars('(#'.$row['sysUserId'].') '.$row['first_name'].' '.$row['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LogType']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LogDate']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LogSubject']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LogDescription']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LogIpaddress']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LogDevice']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <?php include BASE_PATH . '/apps/users/forms/log_del_modal.php';?>
    </section>
    <!-- /.content -->
</div>



<?php
//Including design footer + javascripts
include_once('../../includes/design-footer.php');

//Including general javascripts
include_once('../../includes/design-bottom.php');
?>

<!-- This is data table -->
<script src="/assets/vendor_components/datatable/datatables.min.js"></script>
<!-- Fab Admin for Data Table -->
<script src="/js/pages/data-table.js"></script>
<!-- custom js -->
<script src="/js/pages/custom.js"></script>

