<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;"><?= __lang('Role Update Form');?></h1>
        <div class="container">
        <!-- Form Start  -->
        <?php foreach($zonedetails as $key) { ?>
          <form id="formone" class="form-group" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label><?= __lang('Zone Name');?></label>
                <input type="text" class="form-control" placeholder="Enter Role Name" name="ZoneName" value="<?php echo $key->zone;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label><?= __lang('Employee');?></label>
                <select name="Employee" class="form-control">
                  <?php foreach ($empdetails as $keyy) { ?>
                    <option value="<?= $keyy->employee_code;?>"<?php if($keyy->employee_code==$key->employee) echo "selected"; ?>><?= $keyy->employee;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
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
        <?php } ?>
        <!-- End Form Start  -->
        </div>
        <!-- End Container  -->
    </div>
  </div>
</div>

