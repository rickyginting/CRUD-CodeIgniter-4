<?= $this->extend('/template/BaseView'); ?>
<?= $this->section('konten'); ?>
<a href="/dosen" class="btn btn-primary mt-3 mb-2">Data Dosen</a>
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Tambah Dosen</h4>
    <form action="/dosen/simpan" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Nip</label>
        <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" name="nip" value="<?= old('nip'); ?>" autofocus>
        <div class="invalid-feedback">
          <?= $validation->getError('nip'); ?>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Dosen</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_dosen')) ? 'is-invalid' : ''; ?>" name="nama_dosen" value="<?= old('nama_dosen'); ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('nama_dosen'); ?>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Photo Dosen</label>
        <div class="form-file">
          <input type="file" class="form-file-input <?= ($validation->hasError('photo_dosen')) ? 'is-invalid' : ''; ?>" id="photo_dosen" name="photo_dosen" onchange="imgDosen()">
          <label class="form-file-label" for="customFile">
            <span class="form-file-text">Choose file...</span>
            <span class="form-file-button">Browse</span>
          </label>
          <div class="invalid-feedback">
            <?= $validation->getError('photo_dosen'); ?>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
</div>
<?= $this->endSection(); ?>