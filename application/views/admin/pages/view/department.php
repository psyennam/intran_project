<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;"><?= __lang('Department Data');?></b>
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
                <th><?= __lang('Department Name');?></th>
                <!-- <th><?= __lang('Department Code');?></th> -->
                <th><?= __lang('CreateDate');?></th>
                <th><?= __lang('Status');?></th>
                <th><?= __lang('Update');?></th>
                <th><?= __lang('Delete');?></th>
              </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach ($departmentdetails as $key) { $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $key->department; ?></td>  
                <!-- <td><?php echo $key->department_code; ?></td>  -->
                <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>  
                <td><?php echo is_status($key->status); ?></td>  
                <td><a href="updatedepartment?id=<?php echo $key->department_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('UPDATE');?></button></a></td>
                <td><a href="deletedepartment?id=<?php echo $key->department_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>          
              </tr> 
            <?php } ?>  
            </tbody>
          </table>
          <!-- /.box-body -->
        </div>
        <!-- Form Start  -->
      	<!-- Modal Start  -->
          <div class="modal fade" id="mymodel">
            <div class="modal-dialog modal-sm modal-dialog-centered">
          		<div class="modal-content">
                <div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>	
          				<h3 class="modal-title text-primary"><?= __lang('Department');?></h3>	
          			</div>
                <form action="<?php echo base_url('Admin/departmentinsert');?>" id="formone" class="form-group" method="post">   
            			<div class="modal-body">
                    <div class="row">
  						        <div class="col-sm-12 col-md-12 col-lg-12">
    		                <label><?= __lang('Department Name');?></label>
    		                <input type="text" class="form-control" placeholder="Department Name" id="DepartmentName" name="DepartmentName">
  			              </div>
			              </div>
                    <div id="alert-msg"></div>
          			  </div>
          			  <div class="modal-footer">
          				  <div class="row">
					            <div class="col-md-12 text-center" style="margin-top: 10px;">
                        <input class="btn btn-primary" id="submit" name="submit" type="button" value="<?= __lang('Submit');?>"/>
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
    $('#submit').click(function() {
    var form_data = {
        DepartmentName: $('#DepartmentName').val(),
    };
    $.ajax({
        url: "<?php echo base_url('Admin/departmentinsert'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "Yes")
             window.location.href="<?php echo base_url('Admin/department'); ?>";
            else if (msg == 'NO')
                alert("Data is not inserted into database");
            else
               $('#alert-msg').html('<div style="color:red;">' + msg + '</div>');
        }
    });
    return false;
});
</script>