<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                <b style="font-size: 20px;">Employee Data</b>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 ">
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel">Add</button>
              </div>
            </div>
          </div>
      		  <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Employee Code</th>
                    <th>Status</th>
                    <th>Create date</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($employeedetails as $key) { ?>
                    <tr>
                      <td><?php echo $key->id;?></td>
                      <td><?php echo $key->employee; ?></td>  
                      <td><?php echo $key->employee_code; ?></td>   
                      <td><?php echo is_status($key->status); ?></td>
                      <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>  
                      <td><a href="updateemployee?employee_code=<?php echo $key->employee_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>
                      <td><a href="deleteemployee?employee_code=<?php echo $key->employee_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>
                    </tr> 
                  <?php } ?>
                </tbody>
              </table>
            </div>  
            <!-- Modal Start  -->
          	  <div class="modal fade" id="mymodel">
          		  <div class="modal-dialog modal-lg modal-dialog-centered">
          			  <div class="modal-content">
                    <div class="modal-header">
          					  <button type="button" class="close" data-dismiss="modal">&times;</button>	
          					  <h3 class="modal-title text-primary">Employee</h3>	
          				  </div>
                  <!-- Form Start  -->
                    <form action="<?php echo base_url('Admin/employeeinsert');?>" id="formone" class="form-group" method="post" autocomplete="off">   
            				  <div class="modal-body">
                        <div class="row">
							            <div class="col-sm-12 col-md-4 col-lg-4">
							              <label>Name</label>
							              <input type="text" class="form-control" placeholder="Enter Name" name="employeeName">
							            </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label>Date Of Birth</label>
                            <input type="date" class="form-control" name="employeeDob">
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="employeeEmail">
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" placeholder="10 digit mobile no." name="employeeContact">
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="employeeAddress">
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Department</label>
                            <select class="form-control" name="departmentcombo">
                              <?php foreach ($empdetails as $row) { ?>
                                <option value="<?php echo $row->department_code ?>"><?php echo $row->department; ?>
                                </option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Designation</label>
                            <select class="form-control" name="designationcombo">
                              <?php foreach ($designatiodetails as $row) { ?>
                                <option value="<?php echo $row->designation_code ?>"><?php echo $row->designation; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Designation</label>
                            <select class="form-control" name="rolecombo">
                              <?php foreach ($roledetails as $row) { ?>
                                  <option value="<?php echo $row->role_code ?>"><?php echo $row->role; ?></option>
                              <?php } ?>
                            </select>
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>