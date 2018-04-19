<section class="content">
  <div class="box" style="">
    <div class="box-header with border">
      <form role="form" method="post">
        <div class="box-body">
          <div class="form-group">
            <h1> Isi Detail Pembelian</h1>
          </div>
          <div class="form-group">
            <label >Pilihan Kue</label>
              <div>
                <select class="form-control" name="id_kue">
                  <?php $i=1; foreach ($menu as $item) : ?>
                  <option value="<?php echo $item->id_kue;?>"><?php echo $item->nama_kue; ?></option>
                    <?php $i++; endforeach; ?>
                </select>
            </div>
          </div>

          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" class="form-control"  name="jumlah_pesan" value="" placeholder="0">
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="tambahOrder" value="tambahOrder">Buat Data</button>
        </div>
      </form>
    </div>
  </div>

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Detail Transaksi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Kue</th>
            <th>harga</th>
            <th>Jumlah Pesan</th>
            <th>Total</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=1; $a=0; foreach ($detail as $item) : ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item->nama_kue; ?></td>
                <td><?php echo $item->harga; ?></td>
                <td><?php echo $item->jumlah_pesan; ?></td>
                <td><?php echo $item->total; ?></td>
              </tr>
              <?php $i++; $a=$a+$item->total; endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Kue</th>
              <th>harga</th>
              <th>Jumlah Pesan</th>
              <th>Total</th>
            </tr>
          </tfoot>
        </table>
        <?php echo $a; ?>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">SubTotal Transaksi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <?php echo "Rp.".$a; ?>
        </div>
        <!-- /.box-body -->
      </div>

</section>
