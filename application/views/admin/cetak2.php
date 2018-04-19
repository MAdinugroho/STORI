<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/dist/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> CETAK LAPORAN </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>">





</head>
  <body onload="window.print()">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Record Pembelian</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Kue</th>
                <th>Harga</th>
                <th>Stok Awal</th>
                <th>Dibeli</th>
                <th>Sisa Stok</th>
              </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($stok as $item) : ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $item->nama_kue; ?></td>
                    <td><?php echo "Rp.".$item->harga; ?></td>
                    <td><?php echo $item->stok_awal; ?></td>
                    <td><?php echo $item->dibeli; ?></td>
                    <td><?php echo $item->sisa; ?></td>
                  </tr>
                  <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Kue</th>
                <th>Harga</th>
                <th>Stok Awal</th>
                <th>Dibeli</th>
                <th>Sisa Stok</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box-body -->
</div>
</div>


    <!-- jQuery 2.2.3 -->
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js'); ?>" ></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
    <!-- DataTables -->
   <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>



   <!-- Page script -->

     <script>
     $(function () {
       $("#example1").DataTable();
       $('#example2').DataTable({
         "paging": false,
         "lengthChange": false,
         "searching": false,
         "ordering": false,
         "info": false,
         "autoWidth": false
       });
     });
   </script>
  </body>
</html>
