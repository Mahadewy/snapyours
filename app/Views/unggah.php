<?= $this->extend('template/navbar_beranda'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/unggah.css">
<div class="border-form">
  <form class="was-validated" action="/unggahfoto" enctype="multipart/form-data" method="post">
    <div class="mb-3">
      <label for="validationTextarea" class="form-label">Judul foto</label>
      <textarea class="form-control" name="JudulFoto" id="validationTextarea" placeholder="judul foto" required></textarea>
      <div class="invalid-feedback">
        Tuliskan judul foto yang akan diunggah.
      </div>
    </div>

    <div class="mb-3">
      <label for="validationTextarea" class="form-label">Deskripsi foto</label>
      <textarea class="form-control" name="DeskripsiFoto" id="validationTextarea" placeholder="Deskripsi foto" required></textarea>
      <div class="invalid-feedback">
        Tuliskan deskripsi dari foto yang akan diunggah.
      </div>
    </div>

    <div class="mb-3">
      <select class="form-select" name="kategori" required aria-label="select example">
        <option value="">Album</option>
        <option value="1">Pemandangan Alam</option>
        <option value="2">Hewan</option>
        <option value="3">Makanan</option>
        <option value="4">Outfit</option>
        <option value="5">Seni Rupa</option>
        <option value="6">Nails</option>
      </select>
      <div class="invalid-feedback">Piih Jenis Album</div>
    </div>

    <div class="mb-3">
      <input type="file" name="foto" class="form-control" aria-label="file example" required>
      <div class="invalid-feedback">Pilih foto</div>
    </div>

    <div class="mb-3">
      <button class="btn btn-dark" type="submit">Unggah</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>