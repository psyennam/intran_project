
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
                <th>Action</th>
                <th>Id</th>
                <th>DealerShip Name</th>
                <th>Issue Date</th>
              </tr>
            </thead>
          <tbody>
              <?php if(!empty($pendingdetails)) { foreach($pendingdetails as $key) {?>
                <tr>
                  <td><a href="pendingupdate?quotation_code=<?php echo $key->quotation_code;?>"><i class="fa fa-pencil-square-o"></i>Edit</a><a href="pendingdelete?quotation_code=<?php echo $key->quotation_code;?>"><i class="fa fa fa-trash" style="margin:3px;"></i>Delete</a></td>
                  <td><?php echo $key->id;?></td>
                  <td><?php echo client_name($key->lead_code);?></td>
                  <td><?php echo __date_format($key->created_at,'ddmmyyyy');?></td>
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
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  function formBack()
  {
    parent.history.back();
    return false;
  }
</script>
 