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
                      <div class="col-sm-12" id="productdiv">
                        <div class="col-md-3 form-group"> 
                          <label>Product Name</label>
                          <select class="form-control" id="productname" onchange="myfunction2();">
                            
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Quantity</label>
                          <input type="text" id="qty" class="form-control" onkeyup="gethiddenamt();">
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Price</label>
                          <input type="text" id="price" class="form-control" disabled>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Approved Price List</label>
                          <select id="approvedprice" class="form-control" onchange="getrate();">
                            <option value=''>Select</option>                     
                          </select>
                        </div>
                        <div class="col-md-3 form-group"> 
                          <label>Rate</label>
                          <input type="text" id="rate" class="form-control">
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
                          <input type="text" id="total" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12" id="productdivs">
                      <input type="submit" id="btnSubmit" class="btn btn-primary" value="Edit" >
                    </div>
                  <!-- Div For Product Description Table End -->
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>