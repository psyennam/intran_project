<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main content -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
                <b style="font-size: 20px;"><?= __lang('Role Data');?></b>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 ">
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#mymodel"><?= __lang('Add');?></button>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="overflow-x:auto;">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th><?= __lang('ID');?></th>
        					<th><?= __lang('Role Name');?></th>
        					<th><?= __lang('Role Code');?></th>
        					<th><?= __lang('CreateDate');?></th>
        					<th><?= __lang('Status');?></th>
        					<th><?= __lang('Update');?></th>
        					<th><?= __lang('Delete');?></th>
        			 </tr>
              </thead>
              <tbody>
                <?php foreach ($roledetails as $key) { ?>
                  	<tr>
                  		<td><?php echo $key->id;?></td>
                  		<td><?php echo $key->role; ?></td>	
                  		<td><?php echo $key->role_code; ?></td>		
                  		<td><?php echo is_status($key->status); ?></td>  
                      <td><?php echo __date_format($key->created_at,'ddmmyyyy'); ?></td>			
                  		<td><a href="updaterole?id=<?php echo $key->role_code;?>"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#updatemodel"><?= __lang('UPDATE');?></button></a></td>
                  		<td><a href="deleterole?id=<?php echo $key->role_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE');?></button></a></td>					
                  	</tr>	
                  	<?php } ?>
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
    <!-- Modal Start  -->
    <div class="modal fade" id="mymodel">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="modal-title text-primary"><?= __lang('Role');?></h3>  
          </div>
          <!-- Form Start  -->
            <form action="<?= base_url('Admin/roleinsert');?>" id="formone" class="form-group" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12" >
                    <label><?= __lang('Role Name');?></label>
                    <input type="text" class="form-control" placeholder="Create Role" name="RoleName">
                  </div>
                </div>
              </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 10px;">
                      <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
                    </div>
                  </div>
                </div>
              </form>
            <!-- End Form Start  -->
        </div>
      </div>
    </div>
    <!-- End Modal  -->
<!-- page script -->
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
</script>	
