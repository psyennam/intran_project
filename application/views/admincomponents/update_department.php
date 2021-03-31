<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;">Department Update Form</h1>
      
        <!-- Container  -->
        <div class="container">
        <!-- Form Start  -->
        <?php foreach($row as $key)
                  {
        ?>
          <form id="formone" class="form-group" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label>Department Name</label>
                <input type="text" class="form-control" placeholder="Enter Department Name" name="DepartmentName" value="<?php echo $key->department;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>Department Code</label>
                <input type="text" class="form-control" value="<?php echo $key->department_code;?>"> 
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4 ">
                  <label>Status</label>
                  <select class="form-control" name="statuscombo">
                    <option value="0" <?php if($key->status == 0) {echo "selected";} ?>>Active</option>
                    <option value="1" <?php if($key->status == 1) {echo "selected";} ?>>Hold</option>
                  </select>
              </div>
               
            </div>

            <div class="row">
              <div class="col-md-12 text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        <?php 
              }
        ?>
        <!-- End Form Start  -->
        </div>
        <!-- End Container  -->
    </div>
  </div>
</div>

