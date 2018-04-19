<section class="content">
  <div class="box" style="">
    <div class="box-header with border">
      <form role="form" method="post">
        <div class="box-body">
          <div class="form-group">
            <h1> Detail Menu <?php echo $stok->nama_kue; ?>  </h1>
          </div>
          <div class="form-group">
            <label for="">Nama Menu</label>
            <input type="text" class="form-control"  name="nama_kue" value="<?php echo $stok->nama_kue; ?>">
          </div>
          <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control"  name="harga" value="<?php echo $stok->harga; ?>">
          </div>
          <div class="form-group">
            <label for="">Stok</label>
            <input type="text" class="form-control"  name="stok_awal" value="<?php echo $stok->stok_awal;?>">
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="updateStok" value="updateStok">Perbaharui Data</button>
          <button type="submit" class="btn btn-warning" name="back" value="back">Kembali</button>
          <button type="submit" class="btn btn-danger" name="deleteStok" value="deleteStok">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</section>
              <!-- /.box-body -->
