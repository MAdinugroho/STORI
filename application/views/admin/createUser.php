<section class="content">
  <div class="box" style="">
    <div class="box-header with border">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <h1> Form Tambah User Baru</h1>
          </div>
          <div class="form-group">
            <label for="">username</label>
            <input type="text" class="form-control"  name="username"  >
          </div>
          <div class="form-group">
            <label for="">password</label>
            <input type="password" class="form-control"  name="password"  >
          </div>
          <div class="form-group">
            <label for="">fullname</label>
            <input type="text" class="form-control"  name="fullname"  >
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control"  name="address"  >
          </div>
          <div class="form-group">
            <label >Tipe User</label>
              <div>
                <select class="form-control" name="previlleges">
                  <option value="admin">admin</option>
                  <option value="user">user</option>
                </select>
            </div>
          </div>
          <div class="form-group">
        <label for="bukti" class="col-sm-4 control-label">Upload Foto</label>
        <div class="col-sm-10">
          <input type="file" name="foto" required>
        </div>
</div>
        </div>
        <div class="form-group">
          <button type="submit" name="createUser" value="createUser" class="btn btn-success">Buat Akun</button>
        </div>

              <!-- /.box-body -->
            </form>
          </div>
        </div>
      </section>
