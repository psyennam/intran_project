 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                  <b style="font-size: 20px;"><?= __lang('State Data');?></b>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 ">
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th><?= __lang('ID');?></th>
                <!-- <th><?= __lang('State Code');?></th> -->
      					<th><?= __lang('State Name');?></th>
      					<!-- <th><?= __lang('Country');?></th>  -->
      					<th><?= __lang('Createdate');?></th>
      					<th><?= __lang('Status');?></th>
                <th><?= __lang('Update');?></th>
                <th><?= __lang('Delete');?></th>
      			    </tr>
                </thead>
                  <tbody>
                    <?php $i=0; foreach ($statedetails as $key) { $i++; ?>
                      	<tr>
                      		<td><?php echo $i;?></td>
                          <!-- <td><?php echo $key->state_code; ?></td>   -->
                      		<td><?php echo $key->state; ?></td>	
                      		<!-- <td><?php echo get_country($key->country_code); ?></td>	 -->
                      		<td><?php echo __date_format($key->created_at, 'ddmmyyyy'); ?></td>	
                      		<td><?php echo is_status($key->status); ?></td>
                          <td><a href="updatestate?id=<?php echo $key->state_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('UPDATE');?></button></a></td>  
                          <td><a href="deletestate?id=<?php echo $key->state_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>
                      	</tr>	
                      	<?php } ?>     
                  </tbody>
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

<!-- Modal Start  -->
  <div class="modal fade" id="mymodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h3 class="modal-title text-primary"><?= __lang('State');?></h3> 
        </div>
            <!-- Form Start  -->
            <form action="<?php echo base_url('Admin/stateinsert');?>" id="formone" class="form-group" method="post">   
              <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-6">
                          <label><?= __lang('Country');?></label>
                          <select class="form-control" id="countrycombo" name="countrycombo">
                          <?php foreach ($countrydetails as $row) { ?>
                              <option value="<?php echo $row->country_code ?>"><?php echo $row->country; ?>
                              </option>
                          <?php } ?>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-4 col-lg-6">
                        <label><?= __lang('State Name');?></label>
                        <input type="text" class="form-control" placeholder="Enter State Name" id="StateName" name="StateName">
                    <div id="alert-msg"></div>
                      </div>
                    </div>
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
<!-- page script -->
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
        StateName: $('#StateName').val(),
        countrycombo:$('#countrycombo').val(),
    };
    $.ajax({
        url: "<?php echo base_url('Admin/stateinsert'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "Yes")
             window.location.href="<?php echo base_url('Admin/state'); ?>";
            else if (msg == 'NO')
                alert("Data is not inserted into database");
            else
               $('#alert-msg').html('<div style="color:red;">' + msg + '</div>');
        }
    });
    return false;
});
</script> 
