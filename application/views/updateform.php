
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;">Organisation Update Form</h1>
      
        <!-- Container  -->
        <div class="container">
        <!-- Form Start  -->
        <?php foreach($row as $key)
                  {
        ?>
          <form id="formone" class="form-group" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label>Client Name</label>
                <input type="text" class="form-control" placeholder="Enter Client Name" name="ClientName" value="<?php echo $key->clientname;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your Address" name="Address" value="<?php echo $key->address;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>ContactPersonName</label>
                <input type="text" class="form-control" placeholder="Enter Contact PersonName" name="ContactPersonName" value="<?php echo $key->contactpersonname;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>ContactPersonEmailId</label>
                <input type="text" class="form-control" placeholder="Enter ContactPersonEmailId" name="ContactPersonEmailId" value="<?php echo $key->contactpersonemailid;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>ContactPersonMobileNo</label>
                <input type="text" class="form-control" placeholder="Enter ContactPersonMobileNo" name="ContactPersonMobileNo" value="<?php echo $key->contactpersonmobileno;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>ContactPersonEmergencyNo</label>
                <input type="text" class="form-control" placeholder="Enter ContactPersonEmergencyNo" name="ContactPersonEmergencyNo" value="<?php echo $key->contactpersonemergencycontactno;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>NoofBranches</label>
                <input type="text" class="form-control" placeholder="Enter NoofBranches" name="NoofBranches" value="<?php echo $key->noofbranches;?>">
              </div>

              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>RegistrationDate</label>
                <input type="date" class="form-control" placeholder="Enter your RegistrationDate" name="RegistrationDate" value="<?php echo $key->regdate;?>">    
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>ValidityDate</label>
                <input type="date" class="form-control" placeholder="Enter ValidityDate" name="ValidityDate" value="<?php echo $key->validity;?>">
              </div>
              
              <div class="col-sm-12 col-md-12 col-lg-4">
                <label>URL</label>
                <input type="text" class="form-control" placeholder="Enter your Url" name="Url" value="<?php echo $key->url;?>"> 
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

