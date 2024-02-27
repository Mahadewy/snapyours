<?= $this->extend('template/navbar_beranda');?>
<?= $this->section('content');?>


<link rel="stylesheet" href="<?= base_url(); ?>/css/editprofile.css">
<div class="border-form">
<form action="/update/<?= $user['user_id']; ?>" enctype="multipart/form-data" method="post" class="was-validated">
  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Username</label>
    <textarea class="form-control" name="username" id="validationTextarea" placeholder="Tulis nama disini" required></textarea>
    <div class="invalid-feedback">
      Ganti nama.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Nama Lengkap</label>
    <textarea class="form-control" name="nama_lengkap" id="validationTextarea" placeholder="Tulis username disini" required></textarea>
    <div class="invalid-feedback">
      Ganti username.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Email</label>
    <textarea class="form-control" name="email" id="validationTextarea" placeholder="Tulis username disini" required></textarea>
    <div class="invalid-feedback">
      Ganti username.
    </div>
  </div>

  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Alamat</label>
    <textarea class="form-control" name="alamat" id="validationTextarea" placeholder="Tulis username disini" required></textarea>
    <div class="invalid-feedback">
      Ganti username.
    </div>
  </div>

  
  <div class="mb-3">
    <input type="file" class="form-control" name="foto" aria-label="file example" required>
    <div class="invalid-feedback">Pilih file</div>
  </div>

  <div class="mb-3">
    <button class="btn btn-dark" type="submit">Edit Profile</button>
  </div>
</form>
</div>

<?= $this->endSection();?>