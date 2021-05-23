  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                  <b style="font-size: 20px;"><?= __lang('Designation Data');?></b>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 ">
                  <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
                </div>
              </div>     	
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?= __lang('ID');?></th>
                    <th><?= __lang('Designation');?></th>
                    <th><?= __lang('Designation Code');?></th>
                    <th><?= __lang('Department Code');?></th>
                    <th><?= __lang('CreateDate');?></th>
                    <th><?= __lang('Status');?></th>
                    <th><?= __lang('Update');?></th>
                    <th><?= __lang('Delete');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($designationdetails as $key) { ?>
                  <tr>
                    <td><?php echo $key->id;?></td>
                    <td><?php echo $key->designation; ?></td> 
                    <td><?php echo $key->designation_code; ?></td>
                    <td><?php echo $key->department_code; ?></td> 
                    <td><?php echo is_status($key->status); ?></td>  
                    <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td> 
                    <td><a href="updatedesignation?id=<?php echo $key->designation_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('UPDATE');?></button></a></td>
                    <td><a href="deletedesignation?id=<?php echo $key->designation_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>          
                  </tr> 
                  <?php } ?>         
                </tbody>
              </table>
            </div>
          	<!-- Modal Start  -->
            	<div class="modal fade" id="mymodel">
            		<div class="modal-dialog modal-dialog-centered">
            			<div class="modal-content">
            				<div class="modal-header">
            					<button type="button" class="close" data-dismiss="modal">&times;</button>	
            					<h3 class="modal-title text-primary"><?= __lang('Designation');?></h3>	
            				</div>
                    <!-- Form Start  -->
                    <form action="<?= base_url('Admin/designationinsert');?>" id="formone" class="form-group" method="post" enctype="multipart/form-data">   
              				<div class="modal-body">
                        <div class="row">
  							          <div class="col-sm-12 col-md-4 col-lg-4">
  							            <label><?= __lang('Designation');?></label>
  							            <input type="text" class="form-control" placeholder="Enter Designation" id="DesignationName" name="DesignationName">
                          <div id="alert-msg"></div>
  							          </div>
  							          <div class="col-sm-12 col-md-4 col-lg-4">
    							          <label><?= __lang('Department Name');?></label>
    							          <select class="form-control" id="departmentcombo" name="departmentcombo">
  													  <?php foreach($depts as $row) { ?>
  													    <option value="<?php echo $row->department_code;?>"><?php echo $row->department;?></option>
  													  <?php } ?>
  												  </select>
    							        </div>
  							        </div>
              				</div>
              				<div class="modal-footer">
              					<div class="row">
							              <div class="col-md-12 text-center" style="margin-top: 10px;">
                              <input class="btn btn-default" id="submit" name="submit" type="button" value="<?= __lang('Submit');?>"/>
                            </div>
							         </div>
              				</div>
                    </form>
                    <!-- Form End -->
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

<!-- page script -->
<script  type="text/javascript">
   $('#submit').click(function() {
    //alert("hii");
    var form_data = {
        DesignationName: $('#DesignationName').val(),
        departmentcombo: $('#departmentcombo').val(),
    };
        // alert(form_data['DepartmentCode']);
    //alert(form_data);
    $.ajax({
        url: "<?php echo base_url('Admin/designationinsert'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "Yes")
             window.location.href="<?php echo base_url('Admin/designation'); ?>";
            else if (msg == 'NO')
                alert("Data is not inserted into database");
            else
               $('#alert-msg').html('<div style="color:red;">' + msg + '</div>');
        }
    });
    return false;
});
</script>	
