<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->
<section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Lead-List Data</b></h1>
  </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header text-center">
          <a href="<?= base_url('admin/leadform');?>"><button type="button" class="btn btn-success">Add</button></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Check In</th>
                <th>Company</th>
                <th>Supplier Name</th>
                <th>Brand</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <!-- <tbody>
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
            </tbody>-->
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
 