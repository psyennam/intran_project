
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;">Quotation Close List</h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>PDF</th>
                <th>Invoice Number</th>
                <th>DealerShip Name</th>
                <th>Quotation Date</th>
              </tr>
            </thead>
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
 