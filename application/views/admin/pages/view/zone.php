    <!-- Content Header (Page header) -->
    <section class="content-header text-center" >
      <h1 style="text-transform: capitalize;"><b>Zone Data</b></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
          					<th>Zone</th>
          					<!-- <th>Zone Code</th> -->
                    <th>Employee</th>
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
                  		<!-- <td><?php echo $key->zone_code; ?></td> -->
                      <td><?php echo $key->employee; ?></td>					
                  		<td><?php echo is_status($key->status); ?></td>  
                  		<td><a href="updaterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel">UPDATE</button></a></td>
                  		<td><a href="deleterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>
                      <td><button type="button" class="btn btn-success open_zone_modal" data-zonecode = "<?= $key->zone_code?>">Add</button></td>					
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sub-Zone Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>SUb-Zone</th>
                  <th>city</th>
                  <th>Employee</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($subzonedetails)){ foreach ($subzonedetails as $key) { ?>
                    <tr>
                      <td><?php echo $key->id;?></td>
                      <td><?php echo $key->zone; ?></td>
                       <td><?php echo (get_title($key->state_code)); ?></td>
                       <td><?php echo $key->employee; ?></td>      
                      <td><a href="updaterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel">UPDATE</button></a></td>
                      <td><a href="deleterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>
                      <!-- <td><button type="button" class="btn btn-success open_zone_modal" data-zonecode = "<?= $key->zone_code ;?>">Add</button></td> -->          
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

    <!-- Modal Start  -->
    <div class="modal fade" id="submodel">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-center text-primary">Add Area</h3>  
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Admin/subzoneinsert');?>" id="formone" class="form-group" method="post">
              <input type="text" name="zonecode" id="zonecode">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Zone Name</label>
                    <input type="text" class="form-control" placeholder="Enter Sub-Zone Name" name="SubZoneName">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select State</label>
                    <select class="form-control state" name="state">
                      <option value=""> --- </option>
                      <?php foreach($state as $k){
                        echo '<option value="'.$k->code.'">'.$k->state.'</option>';
                      }?>
                    </select>
                    <select class="form-control" id="optcity" name="city[]" multiple>
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
    $('.state').change(function(){
      var state_code = $(this).val();
      if(state_code != "")
      {
        $.post(base_url+"/admin/opt_city/"+state_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.city+'</option>';
            });
            $('#optcity').html(html);
          }
        })
      }
    });

    $('.open_zone_modal').click(function(){
      $('#zonecode').val($(this).data('zonecode'));
      $('#submodel').modal('toggle');
    })
  })
</script>	
