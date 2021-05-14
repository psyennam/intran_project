<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;">WarrantyType Data</b>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 ">
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel">Add</button>
            </div>
          </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>WarrantType</th>
                <th>CreatedDate</th>
                <th>Status</th>
                <th>IpAddress</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
             <tbody>
             <?php foreach ($warrantydetails as $key) { ?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><?php echo $key->title;?></td>
                  <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>
                  <td><?php echo is_status($key->status); ?></td>
                  <td><?php echo $key->ip_address; ?></td>  
                  <td><a href="<?php echo base_url('Warranty/updatewarranty_type/'.$key->warranty_type_code);?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>
                  <td><a href="<?php echo base_url('Warranty/deletewarranty_type/'.$key->warranty_type_code);?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>   
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
<!-- Modal Start  -->
    <div class="modal fade" id="mymodel">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="modal-title text-primary">Warranty Type</h3>  
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Warranty/warrantytype_insert');?>" id="formone" class="form-group" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12" >
                    <label>Warranty Type</label>
                    <input type="text" class="form-control" placeholder="Enter Warranty Type" name="WarrantyType">
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