<!-- Content Header (Page header) -->
    <!-- <section class="content-header text-center" >
      <h1 style="text-transform: capitalize;"><b><?= __lang('Company Data');?></b></h1>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?= __lang('ID');?></th>
                    <th>Visit Type</th>
                    <th>Customer Available/Not</th>
          					<th>Dealership name</th>
          					<th>Quotation Require</th>
          			 </tr>
                </thead>
                <tbody>
                  <?php if(!empty($followupdetails)){foreach ($followupdetails as $key) { ?>
                    	<tr>
                    		<td><?php echo $key->id;?></td>
                        <td><?= visit_type($key->visit_type);?></td>
                        <td><?= $key->customer_available ?></td>
                    		<td><?php echo client_name($key->lead_code); ?></td>
                        <td><?php echo $key->quotation_require;?></td>					
                    	</tr>	
                    	<?php } } ?>
                  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>