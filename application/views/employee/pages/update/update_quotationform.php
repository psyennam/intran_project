<section class="content">
        <div class="box box-default">
      <div class="row">
        <div class="col-md-12">
            <div class="box-header with-border">
              <div class="box-body">
                <div class="row">
                  <!-- Div For Product Description Table Start -->
                    <div class="row">
                      <div class="col-sm-12 form-group">
                        <div class="box-header with-border">
                          <h3 class="box-title">Add Quotation</h3>
                        </div>
                      </div>
                      <form method="post">
                        <?php foreach($details as $key) {?>

                      <div class="col-sm-12" id="productdiv">
                        <div class="col-md-3 form-group"> 
                          <label>Company Name</label>
                          <select class="form-control companyname" id="companyname" name="companyname">
                            <option value="">---</option>
                          <?php foreach ($companydetails as $keyy) {?>
                            <option value="<?= $keyy->company_code; ?>"><?= $keyy->company;?></option>  
                          <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Product Type</label>
                          <select class="form-control producttype" id="opt_producttype" name="producttype"> 
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Product Name</label>
                          <select class="form-control productname" id="opt_productname" name="productname"> 
                            <?php foreach($productdetails as $keyy){?>
                            <option value="<?= $keyy->product_code?>"<?php if($keyy->product_code==$key->product_code){ echo "selected";} ?>><?php echo $keyy->product; ?></option>
                          <?php }?>
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Quantity</label>
                          <input type="text" id="qty" name="qty" class="form-control" value="<?= $key->quantity;?>">
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Price</label>
                          <input type="text" id="opt_productprice" value="<?= $key->price;?>" name="Productprice" class="form-control" readonly>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Approved Price List</label>
                          <select id="opt_approvedprice" name="approvedprice" class="form-control approvedprice">       
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Rate</label>
                          <input type="text" id="rate" class="form-control" name="rate">
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Discount Type</label>
                          <select id="discounttype" name="discounttype" class="form-control discounttype" onchange="discount_type();">
                            <option value="">Select</option>
                            <option value="amount">In Amount</option>
                            <option value="percent">In Percent</option>
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Discount</label>
                          <input type="text" id="discount" name="discount" class="form-control" onkeyup="get_calculation()" readonly><span id="hiddenvalueamt" class="pull-right" style="color:red;">
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Total</label>
                          <input type="text" id="total" name="total" class="form-control" value="<?= $key->total;?>" readonly>
                        </div>
                      </div>
                    <?php };?>
                    </div>
                    <div class="col-sm-12" id="productdivs">
                    <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" >
                    </div>
                    </form>
                  <!-- Div For Product Description Table End -->
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
<script type="text/javascript">
  $('#hiddenvalueamt').html(0);

/* ProductType dependent combo */
  $(document).ready(function(){
    $('.companyname').change(function(){
      var company_code = $(this).val();
      // alert(company_code);
      if(company_code != "")
      {

        $.post(base_url+"/Client/opt_producttype/"+company_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.product_type+'</option>';
            });
            $('#opt_producttype').html(html);
          }
        })

      }
    });
  })
  /* ProductName dependent combo */
  $(document).ready(function(){
    $('.producttype').change(function(){
      var producttype_code = $(this).val();
      // alert(producttype_code);
      if(producttype_code != "")
      {

        $.post(base_url+"/Client/opt_productname/"+producttype_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.code+'">'+value.product+'</option>';
                
            });
            $('#opt_productname').html(html);
          }
        })

      }
    });
  })

    /* Price box */
  $(document).ready(function(){
    $('.productname').change(function(){
      var product_code = $(this).val();
      // alert(product_code);
      if(product_code != "")
      {
        $.post(base_url+"/Client/opt_price/"+product_code, function(res){
          res = $.parseJSON(res);
          var html;
          if(res.status == 200){
            $.each(res.data, function(index,value){
              $('#opt_productprice').val(value.price); 
              $('#total').val(value.price);   
            });
          }
        })

      }
    });
  })
  /* ApprovedPrice dependent combo */
  $(document).ready(function(){
    $('.productname').change(function(){
      var product_code = $(this).val();
      // alert(product_code);
      if(product_code != "")
      {
        $.post(base_url+"/Client/opt_approvedprice/"+product_code, function(res){
          res = $.parseJSON(res);
          var html = '<option value="" multiple> --- </option>';
          if(res.status == 200){
            $.each(res.data, function(index, value){
                html += '<option value="'+value.price+'">'+value.code+'-'+value.price+'</option>';
            });
            $('#opt_approvedprice').html(html);

          }
        })

      }
    });
  })
   /* Rate box */
  $(document).ready(function(){
    $('.approvedprice').change(function(){
      var approvedprice= $(this).val();
      var Quantity=$("#qty").val();
      // alert(approvedprice);
      if(approvedprice != "")
      {
        $('#rate').val(approvedprice);
        $('#total').val(approvedprice*Quantity); 
      }
    });
  })

function discount_type(){
  var discounttype=$('#discounttype').val();
  // alert(discounttype);
  if (discounttype!="") 
  {
    $("#discount").attr("readonly",false);
  }
  else
  {
    $("#discount").attr("readonly", true);
  }
}

function get_amount()
{ 
  var qty=$("#qty").val();
  var approved_price=$(".approvedprice").val();
  $('#total').val(qty*approved_price);  
}


function get_calculation()
{
  // var total=$("#total").val();
  var qty=$("#qty").val();
  var rate=$("#rate").val();
  var discount=$("#discount").val();
  

  if($("#discounttype").val()=="amount")
  {
    if($("#discount").val() !="")
    {
      $("#total").val((qty*rate)-discount);
    }
    else{
      $('#total').val(qty*rate);
    }
    $('#hiddenvalueamt').html(discount);
  }
  if($("#discounttype").val() =="percent")
  {
    var per=((qty*rate)*discount)/100;
    if($("#discount").val() !="")
    {
      $("#total").val((qty*rate)-per);
    }
    else{
      $('#total').val(qty*rate);
    }
    $('#hiddenvalueamt').html(per);
  }
}

  </script>