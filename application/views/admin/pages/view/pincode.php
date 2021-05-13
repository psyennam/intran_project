
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                  <b style="font-size: 20px;"><?= __lang('Pincode Data');?></b>
                </div>
                <?php if(in_array('C',$this->session->userdata('privileges'))){?>
              <div class="col-sm-6 col-md-6 col-lg-6 ">
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><?= __lang('ID');?></th>
                  <th><?= __lang('Area');?></th>
                  <th><?= __lang('PinCode');?></th>
                  <th><?= __lang('City');?></th>
                  <th><?= __lang('CreateDate');?></th>
                  <th><?= __lang('Status');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pincodedetails as $key) { ?>
                  <tr>
                  <td><?php echo $key->id;?></td>
                  <td><?php echo $key->area; ?></td>
                  <td><?php echo $key->zip_code; ?></td>
                  <td><?php echo $key->city; ?></td> 
                  <td><?php echo is_status($key->status); ?></td>  
                  <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>  
                 </tr>  
                 <?php } ?>          
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    		<!-- Modal Start  -->
        	<div class="modal fade" id="mymodel">
        		<div class="modal-dialog modal-dialog-centered">
        			<div class="modal-content">
        				<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>	
        					<h3 class="text-center text-primary"><?= __lang('Pincode')?></h3>	
        				</div>
              <!-- Form Start  -->
             <form action="<?php echo base_url('Admin/pincodeinsert');?>" id="formone" class="form-group" method="post" enctype="multipart/form-data">   
            	<div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('City');?></label>
                      <select class="form-control" name="citycombo">
                      <?php foreach ($citydetails as $row) { ?>
                          <option value="<?php echo $row->city_code ?>"><?php echo $row->city; ?>
                          </option>
                      <?php } ?>
                      </select>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('Area');?></label>
                    <input type="text" class="form-control" placeholder="Enter Area Name" name="area">
                  </div>
		              <div class="col-sm-12 col-md-12 col-lg-12">
		                <label><?= __lang('PinCode');?></label>
		                <input type="text" class="form-control" placeholder="Enter PinCode" name="zipCode">
		              </div>
		            </div>
  				    </div>
      				<div class="modal-footer">
      					<div class="row">
			            <div class="col-md-12" style="margin-top: 10px;">
			               <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
                   </div>
			          </div>
      			</div>
          </form>
      	</div>
      </div>
    </div>
  </section>
<!-- /.content -->
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
