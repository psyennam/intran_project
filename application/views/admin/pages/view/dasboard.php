<section class="content">
  <!-- row -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">TOTAL VISIT</span>
                <span class="info-box-number"><?php echo totalvisit();?></span>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-bag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">TODAY VISIT</span>
              <span class="info-box-number"><?php echo todayvisit();?></span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number"><?php echo totalsales();?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">TOTAL EXPENSE</span>
              <span class="info-box-number"><?php echo totalexpense();?></span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- row -->
    </section>