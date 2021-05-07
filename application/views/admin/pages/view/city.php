<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;text-transform: capitalize;"><?= __lang('City Data'); ?></b>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 ">
          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add')?></button>
        </div>
        </div>
      </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><?= __lang('id');?></th>
      					<th><?= __lang('City Name');?></th>
                <th><?= __lang('City Code');?></th>
                <th><?= __lang('State Code');?></th>
      					<th><?= __lang('Country Code');?></th>
      					<th><?= __lang('createdate');?></th>
      					<th><?= __lang('Status');?></th>
      					<th><?= __lang('Add Pincode');?></th>
                <th><?= __lang('update');?></th>
      			  </tr>
            </thead>
            <tbody>
              <?php if(!empty($citydetails)) { $i=1; foreach($citydetails as $key) { ?>
              	<tr>
              		<td><?php echo $i++;?></td>
              		<td><?php echo $key->city; ?></td>
                  <td><?php echo $key->city_code; ?></td>  
                  <td><?php echo $key->state_code; ?></td>  
              		<td><?php echo $key->country_code; ?></td>	
              		<td><?php echo __date_format($key->created_at, 'ddmmyyyy'); ?></td>	
              		<td><?php echo is_status($key->status); ?></td>
              		<td><button type="button" class="btn btn-success open_pincode_modal" data-citycode="<?= $key->city_code;?>"><?= __lang('Add');?></button></td>
              		<td><a href="updatecity?id=<?php echo $key->city_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('UPDATE');?></button></a></td>		
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

    <!-- Modal 1 Start  -->
    <div class="modal fade" id="mymodel">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="text-center text-primary"><?= __lang('City');?></h3>  
          </div>
          <!-- Form 1 Start  -->
          <form action="<?= base_url('Admin/cityinsert');?>" id="formone" class="form-group" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('Country');?></label>
                    <select class="form-control" name="countrycombo">
                    <?php 
                    foreach ($countrydetails as $row) {
                    ?>
                        <option value="<?php echo $row->country_code ?>"><?php echo $row->country; ?>
                        </option>
                    <?php
                  } ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('State');?></label>
                    <select class="form-control" name="statecombo">
                    <?php 
                    foreach ($statedetails as $row) {
                    ?>
                        <option value="<?php echo $row->state_code; ?>"><?php echo $row->state; ?>
                        </option>
                    <?php
                  } ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-12">
                  <label><?= __lang('City Name');?></label>
                  <input type="text" class="form-control" placeholder="Enter City Name" name="CityName">
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
        </div>
      </div>
    </div>
    <!-- End Modal 1  -->

    <!-- Modal 2 Start  -->
    <div class="modal fade" id="pincode_modal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h4 class="modal-title"><?= __lang('Pincode');?></h4>  
          </div>
          <!-- Form 2 Start  -->
          <form action="<?php echo base_url('Admin/pincodeinsert');?>" id="formone" class="form-group" method="post" enctype="multipart/form-data">   
            <div class="modal-body">
              <input type="text" name="city" id="h_city_code">
              <div class="row">
                <div class="col-sm-5 col-md-5 col-lg-5">
                  <label><?= __lang('area');?></label>
                  <input type="text" class="form-control" placeholder="Enter Area Name" name="area[]">
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5">
                  <label><?= __lang('Pincode');?></label>
                  <input type="text" class="form-control" placeholder="Enter Pincode" name="zipCode[]">
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                  <button type="button" class="btn btn-primary add_row" style="margin-top: 25px;"><i class="fa fa-plus"></i></button>
                </div>
              </div>
              <div class="rows"></div>
            </div>
            <div class="modal-footer">
              <div class="row">
                <div class="col-md-12 text-center" style="margin-top: 10px;">
                  <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
                </div>
              </div>
            </div>
          </form>
          <!-- End Form 2 Start  -->
        </div>
      </div>
    </div>
    <!-- End Modal 2  -->
  <!-- /.content-wrapper -->

<script>
$('.open_pincode_modal').click(function(){ 
  $('#h_city_code').val($(this).data('citycode'));
  $('#pincode_modal').modal('toggle');
});

  var i = 1;
$('.add_row').click(function(){ 
  var html ='<div class="row" id="row_'+(i)+'"><div class="col-sm-5 col-md-5 col-lg-5"><input type="text" class="form-control" placeholder="Enter Area Name" name="area[]"></div><div class="col-sm-5 col-md-5 col-lg-5"><input type="text" class="form-control" placeholder="Enter Role Name" name="zipCode[]"></div><div class="col-sm-2 col-md-2 col-lg-2"><a href="javascript:remove_row('+(i++)+');" class="btn btn-danger"><i class="fa fa-trash"></i></a></div></div>';
  $('.rows').append(html);
});
function remove_row(row_id){
  $('#row_'+row_id).remove();
}
</script>