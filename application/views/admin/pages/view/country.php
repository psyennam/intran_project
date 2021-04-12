<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header)kjl -->
<section class="content-header">
  <h1>Country Data</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mymodel">Add</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Country Name</th>
                <th>Country Code</th>
                <th>Created_at</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($countrydetails)) { $i=1; foreach($countrydetails as $key) { ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $key->country; ?></td>  
                  <td><?php echo $key->country_code; ?></td>  
                  <td><?php echo __date_format($key->created_at, 'ddmmyyyy'); ?></td> 
                  <td><?php echo is_status($key->status); ?></td>
                  <td><a href="updatecountry?id=<?php echo $key->country_code;?>"><button type="button" class="btn btn-block btn-primary">UPDATE</button></a></td>  
                  <td><a href="deletecountry?id=<?php echo $key->country_code;?>"><button type="button" class="btn btn-block btn-primary">DELETE</button></a></td>    
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
            <h3 class="text-center text-primary">country</h3>  
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <!-- Form 1 Start  -->
          <form action="<?= base_url('Admin/countryinsert');?>" id="formone" class="form-group" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4"></div>
                <div class="col-sm-12 col-md-12 col-lg-4 text-center">
                    <label>Country</label>
                    <input type="text" class="form-control" name="CountryName">
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

    