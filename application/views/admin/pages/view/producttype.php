
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                  <b style="font-size: 20px;"><?= __lang('Product Type Data');?></b>
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
          					<th><?= __lang('Company Name');?></th>
                    <th><?= __lang('Product Name');?></th>
          					<th><?= __lang('CreateDate');?></th>
          					<th><?= __lang('Status');?></th>
          					<th><?= __lang('Update');?></th>
          					<th><?= __lang('Delete');?></th>
          			 </tr>
                </thead>
                <tbody>
                  <?php if(!empty($producttypedetails)){foreach ($producttypedetails as $key) { ?>
                    	<tr>
                    		<td><?php echo $key->id;?></td>
                    		<td><?php echo company_name($key->company_code); ?></td>	
                        <td><?php echo $key->product_type; ?></td> 
                        <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>			
                    		<td><?php echo is_status($key->status); ?></td>  
                    		<td><a href="<?php echo base_url('Admin/updateproducttype/'.$key->id);?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel"><?= __lang('UPDATE');?></button></a></td>
                    		<td><a href="deletecompany?id=<?php echo $key->company_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>					
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
            <h3 class="text-center text-primary"><?= __lang('Product Type');?></h3>  
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Admin/producttypeinsert');?>" id="formone" class="form-group" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-4">
                      <label><?= __lang('Company');?></label>
                        <select class="form-control" name="companycombo">
                          <?php foreach ($companydetails as $row) { ?>
                              <option value="<?php echo $row->company_code ?>"><?php echo $row->company; ?>
                              </option>
                          <?php } ?>
                        </select>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label><?= __lang('Product Type Name');?></label>
                    <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName">
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
