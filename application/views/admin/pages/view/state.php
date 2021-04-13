<!-- Content Header (Page header) -->
  <section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>State Data</b></h1>
  </section>
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>ID</th>
      					<th>Country Code</th>
                <th>State Code</th>
      					<th>State Name</th>
      					<th>Created_at</th>
      					<th>Status</th>
                <th>Update</th>
                <th>Delete</th>
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
                          <td><a href="updatestate?id=<?php echo $key->state_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>  
                          <td><a href="deletestate?id=<?php echo $key->state_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>
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
          <h3 class="text-center text-primary">State</h3> 
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>
            <!-- Form Start  -->
            <form action="<?php echo base_url('Admin/stateinsert');?>" id="formone" class="form-group" method="post">   
              <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-4">
                          <label>Country</label>
                          <select class="form-control" name="countrycombo">
                          <?php foreach ($countrydetails as $row) { ?>
                              <option value="<?php echo $row->country_code ?>"><?php echo $row->country; ?>
                              </option>
                          <?php } ?>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-4 col-lg-4">
                        <label>State Name</label>
                        <input type="text" class="form-control" placeholder="Enter State Name" name="StateName">
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
