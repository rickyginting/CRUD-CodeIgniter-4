<?= $this->extend('/template/BaseView'); ?>
<?= $this->section('konten'); ?>
<a href="/dosen" class="btn btn-primary mt-3 mb-2">Data Dosen</a>
<div class="card text-left">
  <div class="card-body">
    <h4 class="card-title">Udate Dosen</h4>
    <form action="/dosen/prosesupdate/<?= $data['nip']; ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <?= $validation->listErrors(); ?>
      <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" class="form-control" name="nama_dosen" value="<?= $data['nip']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Dosen</label>
        <input type="text" class="form-control" name="nama_dosen" value="<?= $data['nama_dosen']; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Photo Dosen</label>
        <div class="form-file">
          <input type="file" class="form-file-input <?= ($validation->hasError('photo_dosen')) ? 'is-invalid' : ''; ?>" id="photo_dosen" name="photo_dosen" onchange="imgDosen()">
          <label class="form-file-label" for="customFile">
            <span class="form-file-text">Choose file...</span>
            <span class="form-file-button">Browse</span>
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<?= $this->endSection(); ?>