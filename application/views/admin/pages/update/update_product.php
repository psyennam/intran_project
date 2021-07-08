<?php if(!empty($error)) echo $error; ?>
<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><?= __lang('Product Information');?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" enctype="multipart/form-data">    
        <?php foreach($value as $key) {?>
        <div class="row">
          <div class="col-md-12">
            <div class="col-sm-12 col-md-4 col-lg-3">
              <label><?= __lang('Select Company');?></label>
              <select value="<?php echo set_value('companycombo');?>" class="form-control state" name="companycombo">
                  <option value=""> --- </option>
                  <?php foreach($companydetails as $k){
                    ?>
                      <option value="<?= $k->company_code; ?>" <?php if($k->company_code==$key->company){echo "selected"; } ?>> <?= $k->company;?></option>
                    <?php 
                  }?>
              </select>
              <span style="color: red;"><?= form_error('companycombo');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Product Type');?></label>
              <select class="form-control" id="optcity" name="producttype">
              </select>
              <span style="color: red;"><?= form_error('producttype');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Name');?><span style="color:red">*</span></label>
              <input type="text" class="form-control" name="name" id="name" value="<?= $key->product; ?>">
              <span style="color: red;"><?= form_error('name');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Product Code');?><span style="color:red">*</span></label>
              <input type="text" id="code" name="productcode" class="form-control" value="<?= $key->product_code; ?>" readonly>
              <span style="color: red;"><?= form_error('productcode');?></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group col-md-3">
              <label><?= __lang('Description');?><span style="color:red">*</span></label>
              <textarea id="description" name="description" class="form-control"><?= $key->description; ?></textarea>
              <span style="color: red;"><?= form_error('description');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Price')?><span style="color:red;">*</span></label>
              <input type="number" id="customerprice" name="customerprice" class="form-control" value="<?= $key->price; ?>">
              <span style="color: red;"><?= form_error('customerprice');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Distributor Price');?><span style="color:red;">*</span></label>
              <input type="number" id="distributorprice" name="distributorprice" class="form-control" value="<?= $key->distributor_price; ?>">
              <span style="color: red;"><?= form_error('distributorprice');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('HSNCode');?></label>
              <input type="number" id="hsncode" name="hsncode" class="form-control" value="<?= $key->HSN_code;?>" readonly>
              <span style="color: red;"><?= form_error('hsncode');?></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group col-md-3">
              <label><?= __lang('Weight');?></label>
              <input type="number" id="weight" name="weight" class="form-control" value="<?= $key->weight; ?>">
              <span style="color: red;"><?= form_error('weight');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('GST');?></label>
              <input type="number" id="tax" name="tax" class="form-control" value="<?= $key->GST; ?>">
              <span style="color: red;"><?= form_error('tax');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Information');?></label>
              <textarea id="information" name="information" class="form-control"><?= $key->product_code; ?></textarea>
              <span style="color: red;"><?= form_error('information');?></span>
            </div>
            <div class="form-group col-md-3">
              <label><?= __lang('Status');?></label>
              <select name="status" class="form-control">
                <option value="0" <?php if($key->status==0){echo "selected";} ?>>Active</option>
                <option value="1" <?php if($key->status==1){echo "selected";} ?>>In Active</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __lang('Approved Price');?></h3>
            </div>
          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <table id="sample_data" class="table table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th class="span2" width="10%"><?= __lang('Option');?></th>
                    <th><?= __lang('Company Name');?></th>
                    <th><?= __lang('Price');?></th>
                  </tr>
                </thead>
                <tbody id="product_table_body">
                  <?php $cnt=0; foreach($approvedprice as $ap){ ?>
                  <tr>
                    <td style="text-align:center !important;">
                    <?php if($cnt==0){ ?><a href="javascript:void(0);" class="addCF"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <?php }else{ ?> <a href="javascript:void(0);" class="remCF"><i class="fa fa-minus" aria-hidden="true" style="color:red;"></i></a> <?php } $cnt++; ?>
                    </td>
                    <td><input type="text" id="c_name0" name="c_name[]" value="<?= $ap->company_code;?>"><span style="color: red;"><?= form_error('c_name[]');?></span></td>
                    
                    <td><input type="number" id="c_price0" name="c_price[]" value="<?= $ap->price;?>"><span style="color: red;"><?= form_error('c_price[]');?></span></td>   
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-3">
              <!-- <input type="submit" class="btn btn-primary" value="Submit" id="btnSubmit" onclick="formsubmit();"> -->
              <button type="submit" class="btn btn-primary"><?= __lang('Update');?></button>
            </div>
          </div>
        <?php }  ?>
      </form>
    </div>
  </div>
</section>
<script>
$("#procatg").change(function() {
  readURL1(this);
});
var count=0;
var totalrows=0;
$(".addCF").click(function(){
  count++;
  totalrows++;
  $("#product_table_body").append('<tr id="newrow"><td style="text-align:center !important;"><span class="xyza'+count+'"></span></td><td><input type="text" name="c_name[]" id="c_name'+count+'"></td><td><input type="text" name="c_price[]" id="c_price'+count+'"></td></tr>');
  
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
  //$(this).parent().parent().remove();
  $('#product_table_body tr:last').remove();
});

  $(document).ready(function(){
    $('.state').change(function(){
      var state_code = $(this).val();
      if(state_code != "")
      {
        $.post(base_url+"/admin/opt_producttype/"+state_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value=""> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.product_type+'</option>';
            });
            $('#optcity').html(html);
          }
        })
      }
    });
  })

</script>