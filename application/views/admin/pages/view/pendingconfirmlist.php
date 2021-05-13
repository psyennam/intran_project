
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;">Pending-QuotationList</h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <!-- <th>Action</th> -->
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Total</th>  
                </tr>
            </thead>
          <tbody>
              <?php  if(!empty($pendingdetails)) { foreach($pendingdetails as $key) {?>
                <tr>
                  <td><?php echo $key->id;?></td>
                  <td><?php echo $key->product_code;?></td>
                  <td><?php echo $key->quantity;?></td>
                  <td><?php echo $key->price;?></td>
                  <td><?php echo $key->discount;?></td>
                  <td><?php echo $key->total;?></td>
                </tr> 
              <?php } } ?>
          </tbody>
          </table>
          <div class="col-md-12" style="text-align:right !important;">
          <a href="<?= base_url('Client/pendingconfirm/'.$quotation_code); ?>"><input type="submit" class="btn btn-primary" value="Confirm" id="btnConfirm"></a>
          </div>
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
 