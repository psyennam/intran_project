<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;">Client Update Form</h1>
      
        <!-- Container  -->
        <div class="container">
        <!-- Form Start  -->
        
          <form id="formone" class="form-group" method="post">
            <?php foreach($row as $key) { ?>
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label>Client Name</label>
                <input type="text" class="form-control" placeholder="Enter Client Name" name="ClientName" value="<?php echo $key->client;?>">
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label>Client Email</label>
                <input type="text" class="form-control" placeholder="Enter Client Email" name="Email" value="<?php echo $key->email;?>">
              </div> 
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label>Client Contact</label>
                <input type="text" class="form-control" placeholder="Enter Client Conatact" name="Conatact"
                value="<?php echo $key->contact;?>">
              </div> 
              <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>dob</label>
                  <input type="date" class="form-control" name="dob" value="<?php echo $key->dob;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                  <label>Address</label>
                  <input type="text" class="form-control" name="Address" value="<?php echo $key->Address;?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          <?php } ;?>
          </form>
        <!-- End Form Start  -->
        </div>
        <!-- End Container  -->
    </div>
  </div>
</div>

