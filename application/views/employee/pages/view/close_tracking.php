<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;"><?= __lang('Close tracking'); ?></h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;"><?= __lang('Back'); ?></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><?= __lang('ID'); ?></th>
                <th><?= __lang('Assigned by'); ?></th>
                <th><?= __lang('Remark');?></th>
                <th><?= __lang('Complaint Completed Date'); ?></th>
                <th><?= __lang('Status'); ?></th>
              </tr>
            </thead>
             <?php foreach ($closedata as $key) { ?>
              <tr>
                  </td>
                  <td><?php echo $key->id;?></td>
                  <td><?= emp_name($key->assigned_by) ?></td>
                  <td><?= $key->remark;?></td>
                  <td><?= __date_format($key->created_at,'ddmmyyyy');?></td>
                  <td><?= complaint_status($key->status);?></td>
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