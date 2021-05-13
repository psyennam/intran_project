<!-- Content Wrapper. Contains page content -->           
    <!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-left">
              <b style="font-size: 20px;">Country Data</b>
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
                <th><?= __lang('Country Name');?></th>
                <th><?= __lang('Country Code');?></th>
                <th><?= __lang('Createdate');?></th>
                <th><?= __lang('Status');?></th>
                <th><?= __lang('Update');?></th>
                <th><?= __lang('Delete');?></th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($countrydetails)) { $i=1; foreach($countrydetails as $key) { ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $key->country; ?></td>  
                  <td><?php echo $key->country_code; ?></td>  
                  <td><?php echo __date_format($key->created_at, 'ddmmyyyy'); ?></td> 
                  <td><?php echo is_status($key->status); ?></td>
                  <td><a href="updatecountry?id=<?php echo $key->country_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('UPDATE')?></button></a></td>  
                  <td><a href="deletecountry?id=<?php echo $key->country_code;?>"><button type="button" class="btn btn-block btn-primary"><?= __lang('DELETE')?></button></a></td>    
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

    <!-- Modal 1 Start  -->
    <div class="modal fade" id="mymodel">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h3 class="text-center text-primary"><?= __lang('country');?></h3>  
          </div>
          <!-- Form 1 Start  -->
          <form action="<?= base_url('Admin/countryinsert');?>" id="formone" class="form-group" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label><?= __lang('Country');?></label>
                    <input type="text" class="form-control" name="CountryName">
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
        </div>
      </div>
    </div>
    <!-- End Modal 1  -->

    