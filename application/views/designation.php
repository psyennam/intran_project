 <!-- Content Wrapper. Contains page content -->
  		
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Data
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
        <form action="/intran_project/Userpanel/designationinsert" id="formone" class="form-group" method="post" enctype="multipart/form-data">   
              	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
          		<!-- Modal Start  -->
              	<div class="modal fade" id="mymodel">
              		<div class="modal-dialog modal-dialog-centered">
              			<div class="modal-content">
              				<div class="modal-header">
              					<h3 class="text-center text-primary">Role</h3>	
              					<button type="button" class="close" data-dismiss="modal">&times;</button>	
              				</div>
              				<div class="modal-body">
                            <div class="row">
  							              <div class="col-sm-12 col-md-4 col-lg-4">
  							                <label>Designation Name</label>
  							                <input type="text" class="form-control" placeholder="Enter Designation Name" name="DesignationName">
  							              </div>
  							              <div class="col-sm-12 col-md-4 col-lg-4">
  							              	<label>Department Name</label>
  							                <select name="designationtcombo">
													<?php foreach($depts as $row)
															{
													?>
													<option value="<?php echo $row->department_code;?>"><?php echo $row->department_name;?></option>
													<?php
														}
													?>
												</select>
  							              </div>
  							              
  							              <div class="col-sm-12 col-md-12 col-lg-4">
  							                <label>ClientId</label>
  							                <input type="text" class="form-control" name="ClientId" value="<?php echo $this->session->userdata('clientid');?>" disabled>
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
					<th>Designation Name</th>
					<th>Designation Code</th>
					<th>Department Id</th>
					<th>Client ID</th>
					<th>Branch Code</th>
					<th>CreateDate</th>
					<th>Status</th>
					<th>IpAddress</th>
					<th>Update</th>
					<th>Delete</th>
			    </tr>
                </thead>
               <tbody>
              <?php
	foreach ($designationdetails as $key) {
	?>
	<tr>
		<td><?php echo $key->id;?></td>
		<td><?php echo $key->designation; ?></td>	
		<td><?php echo $key->designation_code; ?></td>
		<td><?php echo $key->department_code; ?></td>	
		<td><?php echo $key->org_code;?></td>	
		<td><?php echo $key->branch_code; ?></td>	
		<td><?php echo $key->created_at; ?></td>	
		<td><?php echo $key->status; ?></td>	
		<td><?php echo $key->ip_address; ?></td>	
		<td><a href="updatedesignation?id=<?php echo $key->designation_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>
		<td><a href="deletedesignation?id=<?php echo $key->designation_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>					
	</tr>	
	<?php
	}
		?>
                
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
					<th>Designation Name</th>
					<th>Designation Code</th>
					<th>Department Id</th>
					<th>Client ID</th>
					<th>Branch Code</th>
					<th>CreateDate</th>
					<th>Status</th>
					<th>IpAddress</th>
					<th>Update</th>
					<th>Delete</th>
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
