<div class="row">
  <div class="col-md-12">
    <div class="box">
      <h1 style="text-align: center;"><?= __lang('Client Update Form');?></h1>
      
        <!-- Container  -->
        <div class="container">
        <!-- Form Start  -->
        
          <form id="formone" class="form-group" method="post">
            <?php foreach($row as $key) { ?>
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label><?= __lang('Client Name');?></label>
                <input type="text" class="form-control" placeholder="Enter Client Name" name="ClientName" value="<?php echo $key->client;?>">
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label><?= __lang('Email');?></label>
                <input type="text" class="form-control" placeholder="Enter Client Email" name="Email" value="<?php echo $key->email;?>">
              </div> 
              <div class="col-sm-12 col-md-4 col-lg-4">
                <label><?= __lang('Contact');?></label>
                <input type="text" class="form-control" placeholder="Enter Client Conatact" name="Conatact"
                value="<?php echo $key->contact;?>">
              </div> 
              <div class="col-sm-12 col-md-12 col-lg-4">
                  <label><?= __lang('dob');?></label>
                  <input type="date" class="form-control" name="dob" value="<?php echo $key->dob;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4">
                  <label><?= __lang('Address');?></label>
                  <input type="text" class="form-control" name="Address" value="<?php echo $key->Address;?>">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4 ">
                  <label><?= __lang('Status');?></label>
                  <select class="form-control" name="status">
                    <option value="0" <?php if($key->status == 0) {echo "selected";} ?>>Active</option>
                    <option value="1" <?php if($key->status == 1) {echo "selected";} ?>>In-Active</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary"><?= __lang('Submit');?></button>
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

