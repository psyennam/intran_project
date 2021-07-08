
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;"><?= __lang('Pending-QuotationList'); ?></h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;"><?= __lang('Back'); ?></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><?= __lang('Action'); ?></th>
                <th><?= __lang('Id'); ?></th>
                <th><?= __lang('DealerShip Name'); ?></th>
                <th><?= __lang('Issue Date'); ?></th>
              </tr>
            </thead>
          <tbody>
              <?php $i=1; if(!empty($pendingdetails)) { foreach($pendingdetails as $key) {?>
                <tr>
                  <td>
                    <?php if(in_array('U',$this->session->userdata('privileges'))){ ?>
                    <a href="pendingupdate?quotation_code=<?php echo $key->quotation_code;?>"><i class="fa fa-pencil-square-o"></i>Edit</a>
                  <?php } ?>
                  <?php if(in_array('D',$this->session->userdata('privileges'))){ ?>
                    <a href="pendingdelete?quotation_code=<?php echo $key->quotation_code;?>"><i class="fa fa fa-trash" style="margin:3px;"></i>Delete</a>
                  <?php } ?>
                  </td>
                  <td><?php echo $i++;?></td>
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
<script>
  function formBack()
  {
    parent.history.back();
    return false;
  }
</script>
 