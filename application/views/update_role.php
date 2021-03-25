<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;">Role Update Form</h1>
      
        <!-- Container  -->
        <div class="container">
        <!-- Form Start  -->
        <?php foreach($row as $key)
                  {
        ?>
          <form id="formone" class="form-group" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label>Role Name</label>
                <input type="text" class="form-control" placeholder="Enter Role Name" name="RoleName" value="<?php echo $key->rolename;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>Role Code</label>
                <input type="text" class="form-control" placeholder="Enter your Url" name="Url" value="<?php echo $key->rolecode;?>"> 
              </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <label>Status</label>
                <select class="form-control" name="statuscombo">
                  <option value="active" <?php if($key->status == "active") {echo "selected";} ?>>Active</option>
                  <option value="hold" <?php if($key->status == "hold") {echo "selected";} ?>>Hold</option>
                  <option value="terminate" <?php if($key->status == "terminate") {echo "selected";} ?>>Terminate</option>
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

