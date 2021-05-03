
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;">Quotation List</h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Total</th>
              </tr>
            </thead>
             <?php foreach ($details as $key) { ?>
              <tr>
                  <td><a href="<?php echo base_url('Client/update_quotation_form/'.$key->id);?>"><i class="fa fa-pencil-square-o"></i>Edit</a><a href="#" class="pull-right"><i class="fa fa fa-trash pull-right" style="margin: 2px;"></i>Delete</a></td>
                  <td><?= $key->id;?></td>
                  <td><?= product_name($key->product_code);?></td>
                  <td><?= $key->quantity;?></td>
                  <td><?= $key->price;?></td>
                  <td><?= $key->discount;?></td>
                  <td><?= $key->total;?></td>
              </tr>
              <?php } ?>
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
<script>
  function formBack()
  {
    parent.history.back();
    return false;
  }
</script>
