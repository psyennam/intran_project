<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('role');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><!-- <?= __lang('mainnavigation')?> -->MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><!-- <?= __lang('dashboard')?> -->Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
<!--          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Userpanel/role');?>"><i class="fa fa-circle-o"></i>Role</a></li>
           <li class="active"><a href="<?php echo base_url('Userpanel/department');?>"><i class="fa fa-circle-o"></i>Department</a>
            <li class="active"><a href="<?php echo base_url('Userpanel/employee');?>"><i class="fa fa-circle-o"></i>Employee</a>
            <li class="active"><a href="<?php echo base_url('Userpanel/designation');?>"><i class="fa fa-circle-o"></i>Designation</a>
           </li>
          </ul> -->
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span><!-- <?= __lang('master')?> -->Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Admin/role');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('role')?> -->Role</a></li>
           <li class="active"><a href="<?php echo base_url('Admin/department');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('department')?> -->Department</a>
            <li class="active"><a href="<?php echo base_url('Admin/employee');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('employee')?> -->Employee</a>
            <li class="active"><a href="<?php echo base_url('Admin/designation');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('designation')?> -->Designation</a>
           </li>
                  <li class="treeview">
                      <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span><!-- <?= __lang('management')?> -->Management</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                        <ul class="treeview-menu">
                        <li class="active"><a href="<?php echo base_url('Admin/productmanagement');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('productmanagement')?> -->Product management</a>
                        <li class="active"><a href="<?php echo base_url('Admin/company');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('company')?> -->Company</a></li>
                        <li class="active"><a href="<?php echo base_url('Admin/producttype');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('producttype')?> -->ProductType</a></li>  
                      </ul>
                  </li>
           </li>  
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span><!-- <?= __lang('menu')?> -->Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Admin/country');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('country')?> -->Country</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/state');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('state')?> -->State</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/city');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('city')?> -->City</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/pincode');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('pincode')?> -->Pincode</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/zone');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('zone')?> -->Zone</a></li>  
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span><!-- <?= __lang('client')?> -->Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Client/client');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('client')?> -->Client</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/dealerlist');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('dealerlist')?> -->Dealer List</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/quotationlist');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('quotationlist')?> -->Quotation List</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/quotationcloselist');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('quotationcloselist')?> -->Quotation Close List</a></li>
            <li class="active"><a href="<?php echo base_url('Admin/pendingquotationlist');?>"><i class="fa fa-circle-o"></i><!-- <?= __lang('pendingquotationlist')?> -->Pending Quotation List</a></li>  
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>