<?php
session_start();
require_once '../../dbconfig.php';

// Costumers class
$db = getDbInstance();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['add_user']) && $_POST['add_user'] == 'add_user') {
        $data_to_db = array_filter($_POST);

        unset($data_to_db['add_user']);

        // Check whether the user name already exists
        $db = getDbInstance();
        $db->where('user_email', $data_to_db['user_email']);
        $db->get('tbl_users');

        if ($db->count >= 1)
        {
            $_SESSION['failure'] = 'Brugeren eksisterer i forvejen!';
        } else {
            // Insert user and timestamp
            $data_to_db['created_by'] = $_SESSION['user_id'];
            $data_to_db['password'] = password_hash($data_to_db['password'], PASSWORD_DEFAULT);
            $data_to_db['created_date'] = date('Y-m-d');
            unset($data_to_db['confirm_password']);

            $db = getDbInstance();
            $last_id = $db->insert('tbl_users', $data_to_db);

            if ($last_id)
            {
                $_SESSION['success'] = 'Brugeren blev succesfuldt tilføjet!';
            }
            else
            {
                echo 'Insert failed: ' . $db->getLastError();
                $_SESSION['failure'] = 'Insert Failed';
            }
        }
    } else if(isset($_POST['edit_user']) && isset($_POST['edit_id']) && $_POST['edit_user'] == 'edit_user') {
        // Get input data
        $data_to_db = array_filter($_POST);


        // Check whether the user name already exists
        $db = getDbInstance();
        $db->where('user_email', $data_to_db['user_email']);
        $db->where('id', $data_to_db['edit_id'], '!=');
        $row = $db->getOne('tbl_users');

        if (!empty($row['user_email']))
        {
            $_SESSION['failure'] = 'User already exists';
        } else {
            unset($data_to_db['confirm_password']);
            unset($data_to_db['edit_user']);
            unset($data_to_db['edit_id']);
            $db = getDbInstance();
            $db->where('id', $_POST['edit_id']);
            $stat = $db->update('tbl_users', $data_to_db);

            if ($stat)
            {
                $_SESSION['success'] = 'Brugeren blev opdateret!';
            }
        }
    } else if(isset($_POST['del_id']) && $_POST['del_id'] != 0) {
        $db->where('id', $_POST['del_id']);
        $status = $db->delete('tbl_users');

        if ($status)
        {
            $_SESSION['info'] = "Brugeren blev slettet!";
        }
        else
        {
            $_SESSION['failure'] = "Det er ikke muligt at slette brugeren!";
        }
    }

}
$query = 'SELECT * FROM tbl_users;';
$rows = $db->query($query);
$result_rows = array();
foreach ($rows as $key=>$row) {
    $result_rows[$key]['id'] = $row['id'];
    $result_rows[$key]['first_name'] = $row['first_name'];
    $result_rows[$key]['last_name'] = $row['last_name'];
    $result_rows[$key]['user_email'] = $row['user_email'];
    $result_rows[$key]['phone_no'] = $row['phone_no'];
    $result_rows[$key]['note'] = $row['note'];

    $db = getDbInstance();
    $db->where('id', $row['created_by']);
    $row1 = $db->getOne('tbl_users');

    $result_rows[$key]['created_by'] = $row1['first_name'].' '.$row1['last_name'];
    $result_rows[$key]['created_date'] = date("d-m-Y", strtotime($row['created_date']));
}



//Including desgin header + menu
include_once('../../includes/design-header.php');

//Insert page specific css etc below
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
        <small>Brugerhåndtering</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Hjem</a></li>
        <li class="breadcrumb-item"><a href="/"><i class="fa fa-gears"></i> Indstillinger</a></li>
        <li class="breadcrumb-item active">Bruger oversigt</li>
      </ol>
    </section>

    <!-- Main content -->
    
 <section class="content">
            <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
            <div class="row">
                <div class="col-12">
                    <div class="box box-solid box-info">
                      <div class="box-header with-border">
                        <h4 class="box-title">Bruger oversigt</h4>
                          <div class="box-controls pull-right">
                            <div class="box-header-actions">
                              <button data-toggle="modal" data-target=".user-add-modal" class="btn btn-xs btn-primary btn-flat"><i class="glyphicon glyphicon-plus"></i> Opret bruger</button> &nbsp;&nbsp;&nbsp;&nbsp; 
                              <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                                <input type="text" name="s" placeholder="Søg..." style="width: 250px;">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-12">

                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tickets" class="table mt-0 table-hover no-wrap table-striped table-bordered" data-page-size="8">
                                    <thead>
                                    <tr class="bg-dark">
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Note</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($result_rows as $row): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['phone_no']); ?></td>
                                        <td><?php echo htmlspecialchars($row['note']); ?></td>
                                        <td><?php echo htmlspecialchars($row['created_by']); ?></td>
                                        <td><?php echo htmlspecialchars($row['created_date']); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger-outline edit" id="edit-<?php echo $row['id']; ?>" data-original-title="Edit"><i class="ion-edit" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger-outline delete" id="delete-<?php echo $row['id']; ?>"  data-original-title="Delete"><i class="ti-trash" aria-hidden="true"></i></button>
                                        </td>
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
            <?php include BASE_PATH . '/apps/users/forms/user_del_modal.php';?>
            <?php include BASE_PATH . '/apps/users/forms/user_add_modal.php'; ?>
            <?php include BASE_PATH . '/apps/users/forms/user_edit_modal.php'; ?>
        </section>
        <!-- /.content -->
  </div>
  



<?php 
//Including design footer
include_once('../../includes/design-footer.php'); 


//Including general javascripts
include_once('../../includes/design-bottom.php'); 

//Insert page specific Javascript below
?>
<!-- This is data table -->
<script src="/assets/vendor_components/datatable/datatables.min.js"></script>

<!-- Fab Admin for Data Table -->
<script src="/apps/users/data-table.js"></script>

<!-- custom js -->
<script src="/apps/users/custom.js"></script>

</body>
</html>