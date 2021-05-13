<!-- <section class="content-header text-center" >
    <h1 style="text-transform: capitalize;"><b>Product List</b></h1>
  </section> -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;">Product Data</b>
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
                <th>Name</th>
                <th>Code</th>
                <th>HSN Code</th>
                <th>Tax</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($productdetails)) { $i=1; foreach($productdetails as $key) { ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $key->product; ?></td>
                  <td><?php echo $key->product_code;?></td>  
                  <td><?php echo $key->HSN_code; ?></td>  
                  <td><?php echo $key->GST; ?></td>  
                  <td><?php echo is_status($key->status); ?></td>
                  <td><a href="updateproduct?id=<?php echo $key->product_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>   
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
<!-- /.content -->
<script>
  function formBack()
  {
    parent.history.back();
    return false;
  }
</script>
 