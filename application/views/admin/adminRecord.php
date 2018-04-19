    <!-- Main content -->
    <section class="content">
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
                  <th>Kasir</th>
                  <th>Tanggal</th>
                  <th>Jumlah Transaksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($record as $item) : ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $item->username; ?></td>
                      <td><?php echo $item->tanggal; ?></td>
                      <td><?php echo $item->jumlah_transaksi; ?></td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kasir</th>
                  <th>Tanggal</th>
                  <th>Jumlah Transaksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
  </div>
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-4">

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Cetak Rekap Transaksi</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" >

      <a href="<?php echo base_url('cetak');?>" type="button" class=" btn btn-block btn-info btn-sm" target="_blank">Cetak Transaksi</a>
    </div>
    <!-- /.box-body -->
  </div>
</div>
</div>

</section>
