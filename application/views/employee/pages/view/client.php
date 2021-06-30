  <!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;">Supllier Data</b>
            </div>
            <?php if(in_array('C',$this->session->userdata('privileges'))){?>
            <div class="col-sm-6 col-md-6 col-lg-6 ">
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel">Add</button>
            </div>
            <?php } ?>
          </div>
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
                <?php if(in_array('U',$this->session->userdata('privileges'))){?>
                <th>Update</th>
              <?php } 
              if(in_array('D',$this->session->userdata('privileges'))){
              ?>
                <th>Delete</th>
              <?php } ?>
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
                  <!-- <?php if(in_array('U',$this->session->userdata('privileges'))){?>
                <td><a href="updateclient?client_code=<?php echo $key->client_code;?>"><button type="button" class="btn btn-primary">UPDATE</button></a></td>
              <?php } if(in_array('D',$this->session->userdata('privileges'))){?>
                  <td><a href="deleteclient?client_code=<?php echo $key->client_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>
                  <?php } ?>     -->  
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
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="modal-title text-primary">Client</h3>  
          </div>
          <!-- Form 1 Start  -->
          <form action="<?= base_url('Client/clientinsert');?>" id="formone" class="form-group" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <label>Client Name</label>
                  <input type="text" class="form-control" placeholder="Enter City Name" id="ClientName" name="ClientName">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>email</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>dob</label>
                  <input type="date" class="form-control" id="dob" name="dob">
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select Zone</label>
                    <select class="form-control Mainzone" id="zone" name="zone">
                      <option value=""> --- </option>
                      <?php foreach($zonedetails as $k){
                        echo '<option value="'.$k->code.'">'.$k->zone.'</option>';
                      }?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select Sub-Zone</label>
                    <select class="form-control optsubzone" id="optsubzone" name="subzone"></select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <label>Select City</label>
                    <select class="form-control" id="optcity" name="city"></select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>Address</label>
                  <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>contact</label>
                  <input type="text" class="form-control" id="contact" name="contact">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>Pincode</label>
                  <input type="text" class="form-control" id="Pincode" name="Pincode">
                </div>
                <div id="alert-msg"></div>
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
        </div>
      </div>
    </div>
    <!-- End Modal 1  -->

<!-- page script -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
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

$(document).ready(function(){
    $('.Mainzone').change(function(){
      var zone_code = $(this).val();
      alert(zone_code);
      if(zone_code != "")
      {
        $.post(base_url+"/Client/opt_subzone/"+zone_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.zone+'</option>';
            });
            $('#optsubzone').html(html);
          }
        })
      }
    })
  });
$(document).ready(function(){
    $('.optsubzone').change(function(){
      var subzone_code = $(this).val();
      alert(subzone_code);
      if(subzone_code != "")
      {
        $.post(base_url+"/Client/opt_cityy/"+subzone_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.city+ '</option>';
            });
            $('#optcity').html(html);
          }
        })
      }
    })
  });

 $('#submit').click(function() {
var form_data = {
    ClientName: $('#ClientName').val(),
    email: $('#email').val(),
    dob: $('#dob').val(),
    zone: $('#zone').val(),
    subzone: $('#optsubzone').val(),
    city: $('#optcity').val(),
    address: $('#address').val(),
    contact: $('#contact').val(),
    Pincode: $('#Pincode').val(),
};
$.ajax({
    url: "<?php echo base_url('Client/clientinsert'); ?>",
    type: 'POST',
    data: form_data,
    success: function(msg) {
        if (msg == "Yes")
         window.location.href="<?php echo base_url('Client/client'); ?>";
        else if (msg == 'NO')
            alert("Data is not inserted into database");
        else
           $('#alert-msg').html('<div style="color:red;">' + msg + '</div>');
    }
});
return false;
});
</script> 
