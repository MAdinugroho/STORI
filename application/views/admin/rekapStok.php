    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rekap Stok</h3>
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

<div class="row">
  <!-- left column -->
  <div class="col-md-4">

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Cetak Rekap Stok</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" >

      <a href="<?php echo base_url('cetak2');?>" type="button" class=" btn btn-block btn-info btn-sm" target="_blank">Cetak Stok</a>
    </div>
    <!-- /.box-body -->
  </div>
</div>
</div>

</section>
