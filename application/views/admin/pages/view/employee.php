<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                <b style="font-size: 20px;"><?= __lang('Employee Data'); ?></b>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 ">
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add'); ?></button>
              </div>
            </div>
          </div>
      		  <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?= __lang('ID'); ?></th>
                    <th><?= __lang('Employee Name'); ?></th>
                    <!-- <th><?= __lang('Employee Code'); ?></th> -->
                    <th><?= __lang('Createdate'); ?></th>
                    <th><?= __lang('Status'); ?></th>
                    <th><?= __lang('Update'); ?></th>
                    <th><?= __lang('Delete'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($employeedetails as $key) { $i++; ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $key->employee; ?></td>  
                      <!-- <td><?php echo $key->employee_code; ?></td>-->
                      <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>  
                      <td><?php echo is_status($key->status); ?></td>
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
          					  <h3 class="modal-title text-primary"><?= __lang('Employee'); ?></h3>	
          				  </div>
                  <!-- Form Start  -->
                    <form action="<?php echo base_url('Admin/employeeinsert');?>" id="formone" class="form-group" method="post" autocomplete="off">   
            				  <div class="modal-body">
                        <div class="row">
							            <div class="col-sm-12 col-md-4 col-lg-4">
							              <label><?= __lang('Name'); ?></label>
							              <input type="text" class="form-control" placeholder="Enter Name" name="employeeName">
							            </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label><?= __lang('Date Of Birth'); ?></label>
                            <input type="date" class="form-control" name="employeeDob">
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label><?= __lang('Email'); ?></label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="employeeEmail">
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label><?= __lang('Contact'); ?></label>
                            <input type="text" class="form-control" placeholder="10 digit mobile no." name="employeeContact">
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label><?= __lang('Address'); ?></label>
                            <input type="text" class="form-control" placeholder="Address" name="employeeAddress">
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-4">
                            <label><?= __lang('Department'); ?></label>
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
                            <label><?= __lang('Designation'); ?></label>
                            <select class="form-control" name="rolecombo">
                              <?php foreach ($roledetails as $row) { ?>
                                  <option value="<?php echo $row->role_code ?>"><?php echo $row->role; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-4">
                            <!-- <label><?= __lang('Privileges'); ?></label> -->
                            <input type="checkbox" name="privilege[]" value="C,">
                              <label>C</label>
                              <input type="checkbox" name="privilege[]" value="U,">
                              <label>R</label>
                              <input type="checkbox" name="privilege[]" value="R,">
                              <label>U</label>
                              <input type="checkbox" name="privilege[]" value="D">
                              <label>D</label>
                          </div>  							            
                        </div>
            				  </div>
            				  <div class="modal-footer">
            					  <div class="row">
						              <div class="col-md-12 text-center" style="margin-top: 10px;">
						                <button type="submit" class="btn btn-primary"><?= __lang('Submit'); ?></button>
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