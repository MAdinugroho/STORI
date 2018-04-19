<section class="content">

<div class="col-xs-12">
<form method="post">

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Jadwal</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Matakuliah</label>
          <div class="col-sm-6">
            <select class="form-control" name="matakuliah">
              <?php foreach ($matkul as $item): ?>
                <option value="<?php echo $item->id?>"><?php echo $item->nama_matkul ?></option>
              <?php endforeach; ?>
            </select>
        </div>
      </div>
      <br>
      <br>
      <div class="form-group">
        <label class="col-sm-2 control-label">Hari</label>
          <div class="col-sm-6">
            <select class="form-control" name="hari">
              <?php foreach ($hari as $item): ?>
                <option value="<?php echo $item->hari?>"><?php echo $item->hari ?></option>
              <?php endforeach; ?>
            </select>
        </div>
      </div>

      <br>
      <br>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ruangan</label>
          <div class="col-sm-6">
            <select class="form-control" name="ruangan">
                <option value="E201">D101</option>
                <option value="D205">C302</option>
                <option value="D304">C303</option>
            </select>
        </div>
      </div>

      <br>
      <br>
      <div class="form-group">
        <label class="col-sm-2 control-label">Jam Kuliah</label>
          <div class="col-sm-6">
            <select class="form-control" name="jam_kuliah">
              <?php foreach ($jam_kuliah as $item): ?>
                <option value="<?php echo $item->jam_kuliah?>"><?php echo "Jam Kuliah ke ".$item->jam_kuliah."   (".$item->waktu_mulai." - ".$item->waktu_selesai.")" ?></option>
              <?php endforeach; ?>
            </select>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-danger" name="delete" value="delete">Hapus Jadwal</button>
      <button type="submit" class="btn btn-info pull-right" name="setJadwal" value="setJadwal">Set Jadwal</button>
    </div>
  </form>
  </div>
</div>

<div class="col-xs-12">

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Jadwal Perkuliahan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Hari</th>
          <th>Jam Kuliah</th>
          <th>Mulai</th>
          <th>Selesai</th>
          <th>Ruang D101</th>
          <th>Ruang C302</th>
          <th>Ruang C303</th>
        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($jadwal as $item) : ?>
        <tr>
          <td><?php echo $item->hari; ?></td>
          <td><?php echo $item->jam_kuliah; ?></td>
          <td><?php echo $item->waktu_mulai; ?></td>
          <td><?php echo $item->waktu_selesai; ?></td>
          <td><?php echo $item->ruang_e201; ?></td>
          <td><?php echo $item->ruang_d205; ?></td>
          <td><?php echo $item->ruang_d304; ?></td>

        </tr>
        <?php $i++; endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Hari</th>
            <th>Jam Kuliah</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Ruang D101</th>
            <th>Ruang C302</th>
            <th>Ruang C303</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>

</section>
