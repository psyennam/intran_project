<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->
<section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Supllier Data</b></h1>
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
                <th>client Name</th>
                <th>client Code</th>
                <th>Email</th>
                <th>dob</th>
                <th>Address</th>
                <th>contact</th>
                <th>zone</th>
                <th>sub-Zone</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientdetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><?php echo $key->client; ?></td>  
                  <td><?php echo $key->client_code; ?></td> 
                  <td><?php echo $key->email;?></td>
                  <td><?php echo $key->dob;?></td>
                  <td><?php echo $key->Address;?></td>
                  <td><?php echo $key->contact;?></td>
                  <td><?php echo get_zone($key->zone_code);?></td>  
                  <td><?php echo get_subzone($key->zone_code);?></td>  
                  <td><?php echo is_status($key->status); ?></td>

                  <td><a href="updateclient?client_code=<?php echo $key->client_code;?>"><button type="button" class="btn btn-primary">UPDATE</button></a></td>
                  <td><a href="deleteclient?client_code=<?php echo $key->client_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>      
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

    <!-- Modal 1 Start  -->
    <div class="modal fade" id="mymodel">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-center text-primary">Client</h3>  
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <!-- Form 1 Start  -->
          <form action="<?= base_url('Client/clientinsert');?>" id="formone" class="form-group" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <label>Client Name</label>
                  <input type="text" class="form-control" placeholder="Enter City Name" name="ClientName">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>email</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>dob</label>
                  <input type="date" class="form-control" name="dob">
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select State</label>
                    <select class="form-control state" name="state">
                      <option value=""> --- </option>
                      <?php foreach($zonedetails as $k){
                        echo '<option value="'.$k->code.'">'.$k->zone.'</option>';
                      }?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select City</label>
                    <select class="form-control" id="optcity" name="city"></select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select Zone</label>
                    <select class="form-control state" name="state">
                      <option value=""> --- </option>
                      <?php foreach($zonedetails as $k){
                        echo '<option value="'.$k->code.'">'.$k->zone.'</option>';
                      }?>
                    </select>
                </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select Sub-Zone</label>
                    <select class="form-control" id="optcity" name="city"></select>
                  </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>contact</label>
                  <input type="text" class="form-control" name="contact">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>Pincode</label>
                  <input type="text" class="form-control" name="address">
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
        </div>
      </div>
    </div>
    <!-- End Modal 1  -->

<!-- page script -->
<script>
  $(document).ready(function(){
    $('.state').change(function(){
      var state_code = $(this).val();
      if(state_code != "")
      {
        $.post(base_url+"/Client/opt_zone/"+state_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.zone+'</option>';
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
