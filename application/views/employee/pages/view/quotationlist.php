
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="col-md-12">
            <div class="box-header with-border" style="text-align:center;">
              <h3 class="box-title" style="font-size:25px !important;"><?= __lang('Quotation List'); ?></h3>
            </div>
            <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;"><?= __lang('Back'); ?></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><?= __lang('Action'); ?></th>
                <th><?= __lang('ID'); ?></th>
                <th><?= __lang('PDF'); ?></th>
                <th><?= __lang('DealerShip Name'); ?></th>
                <th><?= __lang('Issue Date'); ?></th>
              </tr>
            </thead>
             <?php $i=1; foreach ($quotationdetails as $key) { ?>
              <tr>
                  <td><?php if($key->status==1) {
                   if(in_array('U',$this->session->userdata('privileges'))){ ?>
                    <a href="<?php echo base_url('Client/update_quotation/'.$key->quotation_code);?>">Edit</a>
                  <?php } } if(in_array('D',$this->session->userdata('privileges'))){ ?>
                  <a href="<?php echo base_url('Client/delete_quotation/'.$key->quotation_code);?>" class="pull-right"><i class="fa fa fa-trash pull-right" style="margin: 2px;"></i>Delete</a>
                <?php } ?>
                  </td>
                  <td><?php echo $i++;?></td>
                  <td><a href="<?php echo base_url('Test/index/'.$key->quotation_code);?>"><button type="button" class="btn btn-primary">PDF</button></a></td>
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