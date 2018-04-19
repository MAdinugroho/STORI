<section class="content">
  <div class="box" style="">
    <div class="box-header with border">
      <form role="form" method="post">
        <div class="box-body">
          <div class="form-group">
            <h1> Isi Data Pembeli</h1>
          </div>
          <div class="form-group">
            <label for="">Nama Pembeli</label>
            <input type="text" class="form-control"  name="nama_pelanggan" value="">
          </div>
          <div class="form-group">
            <label for="">Kasir</label>
            <input type="text" class="form-control"  name="kasir" value="<?php echo $this->session->userdata['username']; ?>" disabled>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="createpembeli" value="createpembeli">Buat Data</button>
        </div>
      </form>
    </div>
  </div>

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Transaksi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama</th>
            <th>Tanggal</th>

            <th>SubTotal</th>
            <th>Opsi</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($beli as $item) : ?>
              <tr>
                <td><?php echo $item->nama_pelanggan; ?></td>
                <td><?php echo $item->tanggal; ?></td>

                <td><?php echo "Rp.".$item->subtotal; ?></td>
                <td><a href="<?php echo base_url('kasirDetail/'.$item->id_beli);?>" type="button" class="btn btn-block btn-info btn-sm">Detail</a></td>
              </tr>
              <?php $i++; endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>

              <th>SubTotal</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

</section>
