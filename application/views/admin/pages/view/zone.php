    <!-- Content Header (Page header) -->
    <section class="content-header text-center" >
      <h1 style="text-transform: capitalize;"><b>Zone Data</b></h1>
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
          					<th>Zone</th>
          					<th>Zone Code</th>
                    <th>Employee</th>
          					<th>CreateDate</th>
          					<th>Status</th>
          					<th>Update</th>
          					<th>Delete</th>
                    <th>Sub Zone</th>
          			 </tr>
                </thead>
                <tbody>
                  <?php if(!empty($zonedetails)){ foreach ($zonedetails as $key) { ?>
                  	<tr>
                  		<td><?php echo $key->id;?></td>
                  		<td><?php echo $key->zone; ?></td>	
                  		<td><?php echo $key->zone_code; ?></td>
                      <td><?php echo $key->employee; ?></td>		
                      <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>			
                  		<td><?php echo is_status($key->status); ?></td>  
                  		<td><a href="updaterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel">UPDATE</button></a></td>
                  		<td><a href="deleterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>
                      <td><button type="button" class="btn btn-success open_zone_modal" data-statecode="<?= $key->id;?>">Add</button></td>					
                  	</tr>	
                  <?php } } ?>
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
            <h3 class="text-center text-primary">Role</h3>  
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Admin/zoneinsert');?>" id="formone" class="form-group" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Zone Name</label>
                    <input type="text" class="form-control" placeholder="Enter Role Name" name="ZoneName">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>State</label>
                    <select name="State" id="state" class="form-control">
                    <option value="">Select</option>
                      <?php foreach ($state as $key) { ?>
                        <option value="<?= $key->state_code; ?>"><?= $key->state;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Employee</label>
                    <select name="Employee" class="form-control">
                      <?php foreach ($info as $key) { ?>
                        <option value="<?= $key->employee_code; ?>"><?= $key->employee;?></option>
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

<!-- page script -->
<script>
  $(document).ready(function(){
    $('#state').change(function(){
      var state_code =$('#state').val();
      if(state_code != "")
      {
        $.post("<?php echo base_url(); ?>Admin/fetch_city", function(res){
          console.log(res);
        })
      }
    })
  })
</script>	
