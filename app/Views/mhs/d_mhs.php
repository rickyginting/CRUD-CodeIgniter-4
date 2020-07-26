<?= $this->extend('/template/BaseView'); ?>
<?= $this->section('konten'); ?>
<a href="/mahasiswa/tambah" class="btn btn-primary mt-3 mb-2">Tambah Mahasiswa</a>
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title"><?= $data['nama_mhs']; ?></h4>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, officiis debitis saepe odit ratione dolores accusamus nostrum repellendus dolor neque rem officia beatae esse iure commodi architecto eligendi voluptatem illo?</p>
        <hr>
        <div class="row">
            <div class="col-5">
                <img src="/img/mhs/<?= $data['photo_mhs']; ?>" alt="" class="img-thumbnail" width="200px" hight="200px">
            </div>
            <div class="col-7">
                <table class=table>
                    <tr>
                        <td>Nim : </td>
                        <th><?= $data['nim']; ?></th>
                    <tr>
                        <td>Nama : </td>
                        <th><?= $data['nama_mhs']; ?></th>
                    </tr>
                    <tr>
                        <td>Dosen Pendamping : </td>
                        <th><a href="/dosen/<?= $data['slug_dosen']; ?>" target="_blank"><?= $data['nama_dosen']; ?></a></th>
                    </tr>
                </table>
                <a href="/mahasiswa/update/<?= $data['slug_mhs']; ?>" class="btn btn-warning">Edit</a>
                <form action="/mahasiswa/<?= $data['nim']; ?>" method="post" class=d-inline>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>