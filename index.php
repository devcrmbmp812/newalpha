<?php
session_start();
require_once 'dbconfig.php';

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Including desgin header + menu
include_once('includes/design-header.php');

//Insert page specific css etc below
?>

<!-- Bootstrap switch-->
	<link rel="stylesheet" href="/assets/vendor_components/bootstrap-switch/switch.css">

<!-- fullCalendar -->
	<link rel="stylesheet" href="/assets/vendor_components/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="/assets/vendor_components/fullcalendar/fullcalendar.print.min.css" media="print">

<?php 
//Including design top
include_once('includes/design-top.php'); 

//Insert page content below
?>
   
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Velkommen
        <small><?php echo $_SESSION['user_name'];?></small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Hjem</a></li>
        <li class="breadcrumb-item active">Oversigt</li>
      </ol>
    </section>

    <!-- Main content -->
 <section class="content">
	  <div class="row">
		<div class="col-lg-3 col-md-6">		  
			<div class="info-box">
				<span class="info-box-icon bg-primary rounded"><i class="fa fa-wheelchair"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number">4,569</span>
				  <span class="info-box-text">Patient</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>
		<div class="col-lg-3 col-md-6">		  
			<div class="info-box">
				<span class="info-box-icon bg-warning rounded"><i class="fa fa-file"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number">23,009</span>
				  <span class="info-box-text">Encounters</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>
		<div class="col-lg-3 col-md-6">		  
			<div class="info-box">
				<span class="info-box-icon bg-info rounded"><i class="fa fa-calendar"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number">56</span>
				  <span class="info-box-text">Appointments</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>
		<div class="col-lg-3 col-md-6">		  
			<div class="info-box">
				<span class="info-box-icon bg-success rounded"><i class="fa fa-heartbeat"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number">12,100</span>
				  <span class="info-box-text">Lab & Radiology</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>					
	</div>	  	
	<div class="row">
		<div class="col-lg-4 col-12"> 
			
		  <div class="box box-solid box-info">
			<div class="box-header with-border">
			  <h4 class="box-title">Vagtplan</h4>

			  <ul class="box-controls pull-right">
				  <li class="dropdown">
					<a data-toggle="dropdown" href="#" aria-expanded="false"><i class="ti-more-alt rotate-90"></i></a>
					<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-114px, 21px, 0px); top: 0px; left: 0px; will-change: transform;">
					  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
					  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
					  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
					</div>
				  </li>
				  <li><a class="box-btn-slide" href="#"></a></li>	
				  <li><a class="box-btn-fullscreen" href="#"></a></li>
				</ul>
			</div>
			<div class="box-body p-0">				
			  <!-- THE CALENDAR -->
			  <div id="calendar" class="dask"></div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
	</div>
		
		<div class="col-12 col-lg-8">			
          <div class="box box-solid box-info">
            <div class="box-header with-border">
              <h4 class="box-title">Kommende vagter</h4>

              <ul class="box-controls pull-right">
                  <li><a class="box-btn-slide" href="#"></a></li>	
                  <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th class="bb-2">Status</th>
								<th class="bb-2">Dato</th>
								<th class="bb-2">Uge dag</th>
								<th class="bb-2">Kunde / Venue</th>
								<th class="bb-2">Tidsreg.</th>
								<th class="bb-2">Start tid</th>
								<th class="bb-2">Slut tid</th>
								<th class="bb-2">Antal timer</th>
								<th class="bb-2">Vagtrapport</th>
								<th class="bb-2">Godkend</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span class="badge badge-success">Godkendt</span></td>
								<td>18-10-2019</td>
								<td>Fredag</td>
								<td><a href="#" data-toggle="modal" data-target="#result" class="text-info">ABC bar (Gothersgade)</a></td>
								<td><span class="badge badge-success">Låst</span></td>
								<td>22:00</td>
								<td>04:00</td>
								<td>6,0 timer</td>
				
								<td><a href="#" data-toggle="modal" data-target="#comment-dialog" class="text-info">Udfyld</a></td>
								<td><button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="false" autocomplete="off">
									<div class="handle"></div>
									</button>
								</td>
							</tr>
							<tr>
								<td><span class="badge badge-warning">Afventer</span></td>
								<td>19-10-2019</td>
								<td>Lørdag</td>
								<td><a href="#" data-toggle="modal" data-target="#result" class="text-info">Zulu bar (vestergade)</a></td>
								<td><span class="badge badge-warning">Åben</span></td>
								<td>23:00</td>
								<td>05:00</td>
								<td>...</td>
								
								<td><a href="#" data-toggle="modal" data-target="#comment-dialog" class="text-info">Udfyld</a></td>
								<td><button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
									<div class="handle"></div>
									</button>
								</td>
							</tr>
							<tr>
								<td><span class="badge badge-success">Godkendt</span></td>
								<td>18-10-2019</td>
								<td>Fredag</td>
								<td><a href="#" data-toggle="modal" data-target="#result" class="text-info">ABC bar (Gothersgade)</a></td>
								<td><span class="badge badge-success">Låst</span></td>
								<td>22:00</td>
								<td>04:00</td>
								<td>6,0 timer</td>
				
								<td><a href="#" data-toggle="modal" data-target="#comment-dialog" class="text-info">Udfyld</a></td>
								<td><button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="false" autocomplete="off">
									<div class="handle"></div>
									</button>
								</td>
							</tr>
							<tr>
								<td><span class="badge badge-warning">Afventer</span></td>
								<td>19-10-2019</td>
								<td>Lørdag</td>
								<td><a href="#" data-toggle="modal" data-target="#result" class="text-info">Zulu bar (vestergade)</a></td>
								<td><span class="badge badge-warning">Åben</span></td>
								<td>23:00</td>
								<td>05:00</td>
								<td>...</td>
								
								<td><a href="#" data-toggle="modal" data-target="#comment-dialog" class="text-info">Udfyld</a></td>
								<td><button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
									<div class="handle"></div>
									</button>
								</td>
							</tr>
							<tr>
								<td><span class="badge badge-success">Godkendt</span></td>
								<td>18-10-2019</td>
								<td>Fredag</td>
								<td><a href="#" data-toggle="modal" data-target="#result" class="text-info">ABC bar (Gothersgade)</a></td>
								<td><span class="badge badge-success">Låst</span></td>
								<td>22:00</td>
								<td>04:00</td>
								<td>6,0 timer</td>
				
								<td><a href="#" data-toggle="modal" data-target="#comment-dialog" class="text-info">Udfyld</a></td>
								<td><button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="false" autocomplete="off">
									<div class="handle"></div>
									</button>
								</td>
							</tr>
							<tr>
								<td><span class="badge badge-warning">Afventer</span></td>
								<td>19-10-2019</td>
								<td>Lørdag</td>
								<td><a href="#" data-toggle="modal" data-target="#result" class="text-info">Zulu bar (vestergade)</a></td>
								<td><span class="badge badge-warning">Åben</span></td>
								<td>23:00</td>
								<td>05:00</td>
								<td>...</td>
								
								<td><a href="#" data-toggle="modal" data-target="#comment-dialog" class="text-info">Udfyld</a></td>
								<td><button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
									<div class="handle"></div>
									</button>
								</td>
							</tr>

						</tbody>
					  </table>
				</div>	
				<!-- result modal content -->
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="result-popup" aria-hidden="true" style="display: none;" id="result">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="result-popup">Radiology Investigations - Result</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<div class="row justify-content-between">
									<div class="col-md-7 col-12">
									  <h4>Test Name - Full Neck Scan</h4>
									</div>
									<div class="col-md-5 col-12">
									  <h4 class="text-right">Lab Order Id : L0000002821</h4>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered">
									  <thead class="bg-secondary">
										<tr>
										  <th scope="col">Test</th>
										  <th scope="col">Result</th>
										  <th scope="col">Range</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
										  <td>Swelling Diameter</td>
										  <td>45 - 1000</td>
										  <td>&nbsp;</td>
										</tr>
										<tr>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										</tr>
									  </tbody>
									</table>
								</div>
								<div class="comment">
									<p><span class="font-weight-600">Comment</span> : <span class="comment-here text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span></p>
								</div>
								<div class="table-responsive">
									<table class="table">
									  <tbody>
										<tr>
										  <th colspan="2" class="b-0">Test By</th>
										  <th colspan="2" class="b-0">Signed By</th>
										</tr>
										<tr class="bg-secondary">
										  <td>Donald jr</td>
										  <td>Time : 11-8-2017   04:22</td>
										  <td>Lous Clark</td>
										  <td>Time : 11-8-2017   04:22</td>
										</tr>
									  </tbody>
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-info pull-right">Print</button>
								<button type="button" class="btn btn-success pull-right">Save</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->


				<!-- comment modal content -->
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="comment-popup" aria-hidden="true" style="display: none;" id="comment-dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="comment-popup">Radiology Investigations - Comment</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<div class="row justify-content-between">
									<div class="col-12">
									  <h4>Comment</h4>
									</div>
								</div>
								<form>
								  <div class="form-group">
									<textarea class="form-control" id="comment-area" rows="3"></textarea>
								  </div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-success pull-right mr-10">Save</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		</div>
		
	</div>
            
      <!-- /.row -->	      
	</section>
    <!-- /.content -->
  </div>
  

<?php 
//Including design footer
include_once('includes/design-footer.php'); 


//Including general javascripts
include_once('includes/design-bottom.php'); 

//Insert page specific Javascript below
?>

<!-- fullCalendar -->
<script src="/assets/vendor_components/fullcalendar/lib/moment.min.js"></script>
<script src="/assets/vendor_components/fullcalendar/fullcalendar.min.js"></script>

<!-- Fab Admin dashboard demo (This is only for demo purposes) -->
<script src="/js/pages/dashboard.js"></script>

<!-- Fab admin for calendar -->
<script src="/js/pages/calendar.js"></script>



</body>
</html>