<!-- Content Header (Page header) -->
  <section class="content-header text-center">
    <h1 style="text-transform: capitalize;"><b><?= __lang('Employee Data');?></b></h1>
  </section>

  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
            </div>
      		  <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?= __lang('ID');?></th>
                    <th><?= __lang('Employee Name');?></th>
                    <th><?= __lang('Employee Code');?></th>
                    <th><?= __lang('Status');?></th>
                    <th><?= __lang('CreateDate');?></th>
                    <th><?= __lang('Update');?></th>
                    <th><?= __lang('Delete');?></th>
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
                      <td><a href="updateemployee?employee_code=<?php echo $key->employee_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('UPDATE');?></button></a></td>
                      <td><a href="deleteemployee?employee_code=<?php echo $key->employee_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>
                    </tr> 
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>  
        </div>  
      </div>
    </section>       
    <!-- Modal Start  -->
  	  <div class="modal fade" id="mymodel">
  		  <div class="modal-dialog modal-lg modal-dialog-centered">
  			  <div class="modal-content">
            <div class="modal-header">
  					  <button type="button" class="close" data-dismiss="modal">&times;</button>	
  					  <h3 class="text-center text-primary"><?= __lang('Employee');?></h3>	
  				  </div>
          <!-- Form Start  -->
            <form action="<?php echo base_url('Admin/employeeinsert');?>" id="formone" class="form-group" method="post">   
    				  <div class="modal-body">
                <div class="row" style="margin: 10px;">
			            <div class="col-sm-12 col-md-4 col-lg-4">
			              <label><?= __lang('Employee Name');?></label>
			              <input type="text" class="form-control" placeholder="Employee Name" name="employeeName">
			            </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Date of Birth');?></label>
                    <input type="date" class="form-control" placeholder="Date Of Birth" name="employeeDob">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Email');?></label>
                    <input type="text" class="form-control" placeholder="Employee Email" name="employeeEmail">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Employee Contact');?></label>
                    <input type="text" class="form-control" placeholder="Employee Contact" name="employeeContact">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Address');?></label>
                    <input type="text" class="form-control" placeholder="Employee Address" name="employeeAddress">
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-4">
                    <label><?= __lang('Department');?></label>
                    <select class="form-control" name="departmentcombo">
                      <?php foreach ($empdetails as $row) { ?>
                        <option value="<?php echo $row->department_code ?>"><?php echo $row->department; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-4">
                    <label><?= __lang('Designation');?></label>
                    <select class="form-control" name="designationcombo">
                      <?php foreach ($designatiodetails as $row) { ?>
                        <option value="<?php echo $row->designation_code ?>"><?php echo $row->designation; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-4">
                    <label><?= __lang('Designation');?></label>
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
		                <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
		              </div>
		            </div>
    				  </div>
            </form>
            <!-- End Form Start  -->
  			  </div>
  	    </div>
  	  </div>
	<!-- End Modal  -->