<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><!-- <?= __lang('Admin')?> -->Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="">
            <a href="<?php echo base_url('User/logout');?>" class="btn btn-danger btn-flat" ><!-- <?= __lang('Sign out')?> -->Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>