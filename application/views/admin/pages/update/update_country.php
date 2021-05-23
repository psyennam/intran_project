<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;"><?= __lang('Country Update Form');?></h1>
      
        <!-- Container  -->
        <div class="container">
        <!-- Form Start  -->
        <?php foreach($row as $key) { ?>
          <form id="formone" class="form-group" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label><?= __lang('Country Name');?></label>
                <input type="text" class="form-control" placeholder="Enter Country Name" name="CountryName" value="<?php echo $key->country;?>">
                <span style="color:red;"><?= form_error('CountryName'); ?></span>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4 ">
                  <label><?= __lang('Status');?></label>
                  <select class="form-control" name="statuscombo">
                    <option value="0" <?php if($key->status == 0) {echo "selected";} ?>>Active</option>
                    <option value="1" <?php if($key->status == 1) {echo "selected";} ?>>Hold</option>
                  </select>
              </div> 
            </div>
            <div class="row">
              <div class="col-md-12 text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
              </div>
            </div>
          </form>
        <?php  } ?>
        <!-- End Form Start  -->
        </div>
        <!-- End Container  -->
    </div>
  </div>
</div>

