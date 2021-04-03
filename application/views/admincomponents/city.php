<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <!-- Content Wrapper. Contains page content -->
  		<!-- Form Start  -->
        
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        City Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- Form Start  -->
        <form action="/intran_project/Userpanel/cityinsert" id="formone" class="form-group" method="post" enctype="multipart/form-data">   
              	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
          		<!-- Modal Start  -->
              	<div class="modal fade" id="mymodel">
              		<div class="modal-dialog modal-dialog-centered">
              			<div class="modal-content">
              				<div class="modal-header">
              					<h3 class="text-center text-primary">City</h3>	
              					<button type="button" class="close" data-dismiss="modal">&times;</button>	
              				</div>
              				<div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-4">
                                  <label>Country</label>
                                  <select class="form-control" name="countrycombo">
                                  <?php 
                                  foreach ($countrydetails as $row) {
                                  ?>
                                      <option value="<?php echo $row->country_code ?>"><?php echo $row->country; ?>
                                      </option>
                                  <?php
                                } ?>
                                  </select>
                              </div>
                              <div class="col-sm-12 col-md-12 col-lg-4">
                                  <label>State</label>
                                  <select class="form-control" name="statecombo">
                                  <?php 
                                  foreach ($statedetails as $row) {
                                  ?>
                                      <option value="<?php echo $row->state_code ?>"><?php echo $row->state; ?>
                                      </option>
                                  <?php
                                } ?>
                                  </select>
                              </div>
  							              <div class="col-sm-12 col-md-4 col-lg-4">
  							                <label>City Name</label>
  							                <input type="text" class="form-control" placeholder="Enter City Name" name="CityName">
  							              </div>
  							              <div class="col-sm-12 col-md-12 col-lg-4">
  							                <label>Organization Id</label>
  							                <input type="text" class="form-control" name="ClientId" value="<?php echo $this->session->userdata('org_code');?>" disabled>
  							              </div>
  							            </div>
							       
              				</div>
              				<div class="modal-footer">
              					<div class="row">
							              <div class="col-md-12 text-center" style="margin-top: 10px;">
							               <button type="submit" class="btn btn-primary">Submit</button>
							              </div>
							    </div>
              				</div>
              			</div>
              		</div>
              	</div>
            	<!-- End Modal  -->
        </form>
         <!-- End Form Start  -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
          <th>ID</th>
					<th>Country Code</th>
          <th>State Code</th>
          <th>City Code</th>
					<th>City Name</th>
					<th>Organization Code</th>
					<th>Created_at</th>
					<th>Status</th>
					<th>IpAddress</th>
					<th>Branch Code</th>
<!-- 					<th>Update</th>
					<th>Delete</th> -->
			    </tr>
                </thead>
               <tbody>
              <?php
	foreach ($citydetails as $key) {
	?>
	<tr>
		<td><?php echo $key->id;?></td>
		<td><?php echo $key->country_code; ?></td>	
    <td><?php echo $key->state_code; ?></td>  
    <td><?php echo $key->city_code; ?></td>  
		<td><?php echo $key->city; ?></td>	
		<td><?php echo $key->org_code;?></td>	
		<td><?php echo $key->created_at; ?></td>	
		<td><?php echo $key->status; ?></td>	
		<td><?php echo $key->ip_address; ?></td>	
		<td><?php echo $key->branch_code; ?></td>	
		<!-- <td><a href="updaterole?id=<?php echo $key->role_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel">UPDATE</button></a></td>
		<td><a href="deleterole?id=<?php echo $key->role_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>	 -->				
	</tr>	
	<?php
	}
		?>
                
                </tbody>
                <tfoot>
                <tr>
					<th>ID</th>
          <th>Country Code</th>
          <th>State Code</th>
          <th>City Code</th>
          <th>City Name</th>
          <th>Organization Code</th>
          <th>Created_at</th>
          <th>Status</th>
          <th>IpAddress</th>
          <th>Branch Code</th>
			<!-- 		<th>Update</th>
					<th>Delete</th> -->
			    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>	
