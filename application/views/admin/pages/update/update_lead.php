<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Update Lead Information</h3>
    </div>
          <!-- /.box-header -->
      <div class="box-body">
        <form method="post" enctype="multipart/form-data">
        <?php foreach($leadinfo as $key) { ?>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col-md-3">
                <label>Select Zone<span style="color:red">*</span></label>
                  <select class="form-control zone" name="zone">
                    <option value=""> --- </option>
                    <?php foreach($zone as $k){
                    echo '<option value="'.$k->code.'">'.$k->zone.'</option>';
                    }?>
                   </select>
                  <span style="color: red;"><?= form_error('zone');?></span>
              </div>
              <div class="form-group col-md-3">
                <label>Select Sub-Zone</label>
                <select class="form-control subzone" id="optzone" name="optzone"></select>
                <span style="color: red;"><?= form_error('optzone');?></span>
              </div>
              <div class="form-group col-md-3">
                <label>City</label>
                <select class="form-control subcity" id="optcity" name="optcity">
                </select>
                <span style="color: red;"><?= form_error('optcity');?></span>
              </div>
              <div class="form-group col-md-3">
                <label>Pincode</label>
                <select class="form-control subpin" id="optpin" name="optpin">
                </select>
                <span style="color: red;"><?= form_error('optpin');?></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col-md-3">
                <label>Supplier Name<span style="color:red">*</span></label>
                <select class="form-control" id="optsupplier" name="supplier"></select>
                </select>
                <span style="color: red;"><?= form_error('supplier');?></span>
              </div>
              <div class="form-group col-md-3">
                <label>Brand<span style="color:red">*</span></label>
                <select id="brand" name="brand" class="form-control">
                  <option value=''>Select</option>
                  <option value='Lincoln Electric'>Lincoln Electric</option>
                  <option value='AMADA WELD TECH'>AMADA WELD TECH</option>
                  <option value='CEBORA'>CEBORA</option>
                </select>
                <span style="color: red;"><?= form_error('brand');?></span>
              </div>
              <div class="form-group col-md-3">
                <label>Company Name</label>
                <input type="text" id="company_name" name="company_name" class="form-control" value="<?php echo $key->company_name;?>">
                <span style="color: red;"><?= form_error('company_name');?></span>
              </div>
              <div class="form-group col-md-3">
                <label>GST</label>
                <input type="number" id="gst" name="gst" class="form-control" value="<?php echo $key->gst;?>">
                <span style="color: red;"><?= form_error('gst');?></span>
              </div>
              <div class="form-group col-md-3">
                  <label><?= __lang('Status');?></label>
                  <select class="form-control" name="statuscombo">
                    <option value="0" <?php if($key->status == 0) {echo "selected";} ?>>Active</option>
                    <option value="1" <?php if($key->status == 1) {echo "selected";} ?>>Hold</option>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label>Address<span style="color:red">*</span></label>
                <textarea id="address" name="address" class="form-control"></textarea>
                <span style="color: red;"><?= form_error('address');?></span>
              </div>
              
            </div>
          </div>
          <div class="box-header with-border">
            <h3 class="box-title">Contact Person</h3>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="sample_data" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th class="span2" width="10%">Option</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Mobile</th>
                      <th>Email id</th>
                    </tr>
                  </thead>
                  <tbody id="product_table_body">
                  <?php $cnt=0; foreach($mappingleadinfo as $row){ ?>
                  <tr>
                    <td style="text-align:center !important;">
                    <?php if($cnt==0){ ?><a href="javascript:void(0);" class="addCF"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <?php }else{ ?> <a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a> <?php } $cnt++; ?>
                    </td>
                   <td><input type="text" id="cp_name0" name="cp_name[]" value="<?php echo $row->person_name;?>"><span style="color: red;"><?= form_error('cp_name[]');?></span></td>
                        <td><input type="text" id="cp_designation0" name="cp_designation[]" value="<?php echo $row->designation;?>"><span style="color: red;"><?= form_error('cp_designation[]');?></span></td>
                        <td><input type="number" id="cp_mobile0" name="cp_mobile[]" value="<?php echo $row->mobile_no;?>"><span style="color: red;"><?= form_error('cp_mobile[]');?></span></td>
                        <td><input type="text" id="cp_email0" name="cp_email[]" value="<?php echo $row->email;?>"><span style="color: red;"><?= form_error('cp_email[]');?></span></td>  
                  </tr>
                <?php } ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col-md-4">
                <input type="submit" class="btn btn-primary" value="Submit" id="btnSubmit" onclick="formsubmit();">
                 <a href="#!" onclick="formBack();" class="btn btn-default btn-flat" style="margin-top: 8px;margin-right: 15px;">Back</a>
              </div>
            </div>
          </div>
        <?php  } ?>
        </form>
      </div>
    </div>
</section>
<script>
  var count=0;
  var totalrows=0;
  $(".addCF").click(function(){
  count++;
  totalrows++;
  $("#product_table_body").append('<tr id="newrow"><td style="text-align:center !important;"><span class="xyza'+count+'"></span></td><td><input type="text" id="cp_name'+count+'"></td><td><input type="text" id="cp_designation'+count+'"></td><td><input type="text" id="cp_mobile'+count+'"></td><td><input type="text" id="cp_email'+count+'"></td></tr>');
  
  var z = '<a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a>';
  $('.xyza'+count).html('');
  for(var n=1; n <= count; n++){
    if(n == count){
      $('.xyza'+n).html(z);
    }else{
      $('.xyza'+n).html('');
    }
  }
});
  $("#product_table_body").on('click','.remCF',function(){
  count--;
  totalrows--;
  var z = '<a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a>';
  $('.xyza'+count).html('');
  for(var n=1; n <= count; n++){
    if(n == count){
      $('.xyza'+n).html(z);
    }else{
      $('.xyza'+n).html('');
    }
  }
  $('#product_table_body tr:last').remove();
});

function formBack()
  {
    parent.history.back();
    return false;
  }
/* Zone dependent combo */
  $(document).ready(function(){
    $('.zone').change(function(){
      var zone_code = $(this).val();
      alert(zone_code);
      if(zone_code != "")
      {
        $.post(base_url+"/Admin/opt_zone/"+zone_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.zone+'</option>';
            });
            $('#optzone').html(html);
          }
        })

      }
    })
});

  /* City dependent combo */
  $(document).ready(function(){
    $('.subzone').change(function(){
      var sub_code = $(this).val();
      alert(sub_code);
      if(sub_code!="")
      {
        $.post(base_url+"/Admin/sub_city/"+sub_code,function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.city+'</option>';
            });
            $('#optcity').html(html);
          }
        })
      }
    })
});

  /* Pincode dependent combo */
  $(document).ready(function(){
    $('.subcity').change(function(){
      var city_code = $(this).val();
      alert(city_code);
      if(city_code!="")
      {
        $.post(base_url+"/Admin/opt_pincode/"+city_code,function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.code+'</option>';
            });
            $('#optpin').html(html);
          }
        })

      }
    })
});

  /* Supplier dependent combo */
  $(document).ready(function(){
    $('.subpin').change(function(){
      var pin_code = $(this).val();
      
      if(pin_code!="")
      {
        $.post(base_url+"/Admin/opt_supplier/"+pin_code,function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.client+'</option>';
            });
            $('#optsupplier').html(html);
          }
        })

      }
    })
});
</script>

