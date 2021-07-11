<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                <b style="font-size: 20px;"><?= __lang('Zone Data');?></b>
              </div>
              <?php if(in_array('C',$this->session->userdata('privileges'))){?>
              <div class="col-sm-6 col-md-6 col-lg-6 ">
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
              </div>
              <?php } ?>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="overflow-x:auto;">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th><?= __lang('ID');?></th>
        					<th><?= __lang('Zone');?></th>
        					<!-- <th>Zone Code</th> -->
                  <th><?= __lang('Employee');?></th>
        					<th><?= __lang('Status');?></th>
        					<th><?= __lang('Update');?></th>
        					<th><?= __lang('Delete');?></th>
                  <th><?= __lang('Sub Zone');?></th>
        			 </tr>
              </thead>
              <tbody>
                <?php $i=0; if(!empty($zonedetails)){ foreach ($zonedetails as $key) { $i++; ?>
                	<tr>
                		<td><?php echo $i;?></td>
                		<td><?php echo $key->zone; ?></td>	
                		<!-- <td><?php echo $key->zone_code; ?></td> -->
                    <td><?php echo $key->employee; ?></td>					
                		<td><?php echo is_status($key->status); ?></td>  
                		<td><a href="updatezone?zone_code=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel"><?= __lang('UPDATE');?></button></a></td>
                		<td><a href="deletezone?zone_code=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>
                    <td><button type="button" class="btn btn-block btn-success open_zone_modal" data-zonecode = "<?= $key->zone_code?>"><?= __lang('Add');?></button></td>					
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
            <h3 class="box-title"><?= __lang('Sub-Zone Data Table');?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example3" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th><?= __lang('ID');?></th>
                <th><?= __lang('SUb Zone');?></th>
                <th><?= __lang('city');?></th>
                <th><?= __lang('Employee');?></th>
                <th><?= __lang('Update');?></th>
                <th><?= __lang('Delete');?></th>
              </tr>
              </thead>
              <tbody>
                <?php $i=0; if(!empty($subzonedetails)){ foreach ($subzonedetails as $key) { $i++;?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $key->zone; ?></td>
                     <td><?php echo (get_title($key->state_code)); ?></td>
                     <td><?php echo $key->employee; ?></td>      
                    <td><a href="updatesubzone?zone_code=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel"><?= __lang('UPDATE');?></button></a></td>
                    <td><a href="deleterole?id=<?php echo $key->zone_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>
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
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="modal-title text-primary"><?= __lang('Zone');?></h3>  
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Admin/zoneinsert');?>" id="formone" class="form-group" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('Zone Name');?></label>
                    <input type="text" class="form-control" placeholder="Enter Role Name" id="ZoneName" name="ZoneName">
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('Employee');?></label>
                    <select name="Employee" class="form-control" id="Employee">
                      <option value="">---Select Employee----</option>
                      <?php foreach ($info as $key) { ?>
                        <option value="<?= $key->employee_code; ?>"><?= $key->employee;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div id="alert-msg"></div> 
              </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 10px;">
                      <input class="btn btn-primary" id="zoneinsert" name="submit" type="button" value="<?= __lang('Submit');?>"/>
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
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="modal-title text-primary"><?= __lang('Area');?></h3>  
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Admin/subzoneinsert');?>" id="formone" class="form-group" method="post">
              <input type="hidden" name="zonecode" id="zonecode">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Zone Name');?></label>
                    <input type="text" class="form-control" placeholder="Enter Sub-Zone Name" name="SubZoneName" id="SubZoneName">
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Employee');?></label>
                    <select name="emp" class="form-control" id="emp">
                      <option value="">---Select Employee---</option>
                      <?php foreach ($info as $key) { ?>
                        <option value="<?= $key->employee_code; ?>"><?= $key->employee;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Select State');?></label>
                    <select class="form-control state" name="state" id="state">
                      <option value=""> --- </option>
                      <?php foreach($state as $k){
                        echo '<option value="'.$k->code.'">'.$k->state.'</option>';
                      }?>
                    </select>
                    <select class="form-control" id="optcity" name="city[]" multiple>
                    </select>
                  </div>
                  
                </div>
                <div id="subalert-msg"></div> 
              </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 10px;">
                      <input class="btn btn-primary" id="subzoneinsert" name="submit" type="submit" value="<?= __lang('Submit');?>"/>
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
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  $(document).ready(function(){
    $('.state').change(function(){
      var state_code = $(this).val();
      if(state_code != "")
      {
        $.post(base_url+"/Admin/opt_city/"+state_code, function(res){
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
/**
  Zone Insert Validation
***/
$('#zoneinsert').click(function() {
    var form_data = {
        ZoneName: $('#ZoneName').val(),
        Employee: $('#Employee').val(),
    };
    $.ajax({
        url: "<?php echo base_url('Admin/zoneinsert'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "Yes")
             window.location.href="<?php echo base_url('Admin/zone'); ?>";
            else if (msg == 'NO')
                alert("Data is not inserted into database");
            else
               $('#alert-msg').html('<div style="color:red;">' + msg + '</div>');
        }
    });
    return false;
});
/**
  Sub-Zone Insert Validation
***/
$('#subzoneinsert').click(function() {
    var form_data = {
        SubZoneName: $('#SubZoneName').val(),
        emp: $('#emp').val(),
        state: $('#optcity').val(),
        zonecode: $('#zonecode').val(),
    };
    $.ajax({
        url: "<?php echo base_url('Admin/subzoneinsert'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "Yes")
             window.location.href="<?php echo base_url('Admin/zone'); ?>";
            else if (msg == 'NO')
                alert("Data is not inserted into database");
            else
               $('#subalert-msg').html('<div style="color:red;">' + msg + '</div>');
        }
    });
    return false;
});
</script>	
