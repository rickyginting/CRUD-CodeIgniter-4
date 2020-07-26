<?= $this->extend('/template/BaseView'); ?>
<?= $this->section('konten'); ?>
<a href="/mahasiswa" class="btn btn-primary mt-3 mb-2">Data Mahasiswa</a>
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Tambah Mahasiswa</h4>
    <form action="/mahasiswa/simpan" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Nim</label>
        <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" name="nim" value="<?= old('nim'); ?>" autofocus>
        <div class="invalid-feedback">
          <?= $validation->getError('nim'); ?>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_mhs')) ? 'is-invalid' : ''; ?>" name="nama_mhs" value="<?= old('nama_mhs'); ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('nama_mhs'); ?>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Photo Mahasiswa</label>
        <div class="form-file">
          <input type="file" class="form-file-input <?= ($validation->hasError('photo_mhs')) ? 'is-invalid' : ''; ?>" id="photo_mhs" name="photo_mhs" onchange="imgMhs()">
          <label class="form-file-label" for="customFile">
            <span class="form-file-text">Choose file...</span>
            <span class="form-file-button">Browse</span>
          </label>
          <div class="invalid-feedback">
            <?= $validation->getError('photo_mhs'); ?>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Dosen</label>
        <select name="namaDosen" id="namaDosen" class="namaDosen form-control"></select>
        <input type="hidden" id="hasil" name="nip">
        <div class="invalid-feedback">
          <?= $validation->getError('nip'); ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<?= $this->endSection(); ?>