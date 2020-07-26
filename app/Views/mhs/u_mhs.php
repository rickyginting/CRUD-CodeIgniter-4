<?= $this->extend('/template/BaseView'); ?>
<?= $this->section('konten'); ?>
<a href="/mahasiswa" class="btn btn-primary mt-3 mb-2">Data Mahasiswa</a>
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Udate Mahasiswa</h4>
    <form action="/mahasiswa/prosesupdate/<?= $data['nim']; ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Nim</label>
        <input type="text" class="form-control" name="nim" value="<?= $data['nim']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_mhs')) ? 'is-invalid' : ''; ?>" name="nama_mhs" value="<?= $data['nama_mhs']; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Photo Mahasiswa</label>
        <div class="form-file">
          <input type="file" class="form-file-input" id="photo_mhs" name="photo_mhs" onchange="imgMhs()">
          <label class="form-file-label" for="customFile">
            <span class="form-file-text">Choose file...</span>
            <span class="form-file-button">Browse</span>
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Dosen</label>
        <select name="namaDosen" id="namaDosen" class="namaDosen form-control"></select>
        <input type="hidden" id="hasil" name="nip">
        <div class="invalid-feedback">
          <?= $validation->getError('namaDosen'); ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
</div>
<?= $this->endSection(); ?>