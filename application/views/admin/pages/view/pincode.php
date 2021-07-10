
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;"><?= __lang('Pincode Data');?></b>
            </div>
            <?php if(in_array('C',$this->session->userdata('privileges'))){?>
          <div class="col-sm-6 col-md-6 col-lg-6 ">
          <!-- <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button> -->
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="box-body" style="overflow-x:auto;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th><?= __lang('ID');?></th>
              <th><?= __lang('Area');?></th>
              <th><?= __lang('PinCode');?></th>
              <th><?= __lang('City');?></th>
              <th><?= __lang('CreateDate');?></th>
              <th><?= __lang('Status');?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; foreach ($pincodedetails as $key) { $i++; ?>
              <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $key->area; ?></td>
              <td><?php echo $key->zip_code; ?></td>
              <td><?php echo $key->city; ?></td> 
              <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>  
              <td><?php echo is_status($key->status); ?></td>  
             </tr>  
             <?php } ?>          
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
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
</script>