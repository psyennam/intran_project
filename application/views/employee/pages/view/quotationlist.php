
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
                <th>DealerShip Name</th>
                <th>Issue Date</th>
              </tr>
            </thead>
             <?php foreach ($quotationdetails as $key) { ?>
              <tr>
                  <td><a href=""><i class="fa fa-pencil-square-o"></i>Edit</a><a href="#" class="pull-right"><i class="fa fa fa-trash pull-right" style="margin: 2px;"></i>Delete</a></td>
                  <td><?php echo $key->id;?></td>
                  <td><?= client_name($key->lead_code)?></td>
                  <td><?= __date_format($key->created_at,'ddmmyyyy');?></td>
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
 