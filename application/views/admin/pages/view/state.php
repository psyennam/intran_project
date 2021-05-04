<!-- Content Header (Page header) -->
  <section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b><?= __lang('State Data');?></b></h1>
  </section>
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th><?= __lang('ID');?></th>
      					<th><?= __lang('Country Code');?></th>
                <th><?= __lang('State Code');?></th>
      					<th><?= __lang('State Name');?></th>
      					<th><?= __lang('Createdate');?></th>
      					<th><?= __lang('Status');?></th>
                <th><?= __lang('Update');?></th>
                <th><?= __lang('Delete');?></th>
      			    </tr>
                </thead>
                  <tbody>
                    <?php foreach ($statedetails as $key) { ?>
                      	<tr>
                      		<td><?php echo $key->id;?></td>
                      		<td><?php echo $key->country_code; ?></td>	
                          <td><?php echo $key->state_code; ?></td>  
                      		<td><?php echo $key->state; ?></td>	
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
          <h3 class="text-center text-primary"><?= __lang('State');?></h3> 
        </div>
            <!-- Form Start  -->
            <form action="<?php echo base_url('Admin/stateinsert');?>" id="formone" class="form-group" method="post">   
              <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-6">
                          <label><?= __lang('Country');?></label>
                          <select class="form-control" name="countrycombo">
                          <?php foreach ($countrydetails as $row) { ?>
                              <option value="<?php echo $row->country_code ?>"><?php echo $row->country; ?>
                              </option>
                          <?php } ?>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-4 col-lg-6">
                        <label><?= __lang('State Name');?></label>
                        <input type="text" class="form-control" placeholder="Enter State Name" name="StateName">
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
