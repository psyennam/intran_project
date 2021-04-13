<!-- Content Header (Page header) -->
<section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Dipartment Data</b></h1>
  </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header text-center">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
        </div>
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Department Code</th>
                <th>Status</th>
                <th>CreateDate</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($departmentdetails as $key) { ?>
              <tr>
                <td><?php echo $key->id;?></td>
                <td><?php echo $key->department; ?></td>  
                <td><?php echo $key->department_code; ?></td> 
                <td><?php echo is_status($key->status); ?></td>  
                <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>  
                <td><a href="updatedepartment?id=<?php echo $key->department_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>
                <td><a href="deletedepartment?id=<?php echo $key->department_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>          
              </tr> 
            <?php } ?>  
            </tbody>
          </table>
          <!-- /.box-body -->
        </div>
        <!-- Form Start  -->
      	<!-- Modal Start  -->
          <div class="modal fade" id="mymodel">
            <div class="modal-dialog modal-dialog-centered">
          		<div class="modal-content">
                <div class="modal-header">
          				<h3 class="text-center text-primary">Role</h3>	
          				<button type="button" class="close" data-dismiss="modal">&times;</button>	
          			</div>
                <form action="<?php echo base_url('Admin/departmentinsert');?>" id="formone" class="form-group" method="post">   
            			<div class="modal-body">
                    <div class="row">
  						        <div class="col-sm-12 col-md-4 col-lg-4">
    		                <label>Department Name</label>
    		                <input type="text" class="form-control" placeholder="Enter Department Name" name="DepartmentName">
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
                </form>
                <!-- End Form Start  -->
          		</div>
          	</div>
          </div>
        <!-- End Modal  -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->