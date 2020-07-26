<?= $this->extend('/template/BaseView');?>
<?= $this->section('konten') ;?>
<a href="/dosen" class="btn btn-primary mt-3 mb-2">Data Dosen</a>
<div class="card text-left">
<div class="card-body">
<h4 class="card-title"><?= $data['nama_dosen'];?></h4>
	<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, officiis debitis saepe odit ratione dolores accusamus nostrum repellendus dolor neque rem officia beatae esse iure commodi architecto eligendi voluptatem illo?</p>
    <hr>
<div class="row">
<div class="col-5">
<img src="/img/dosen/<?= $data['photo_dosen'];?>" alt="" class="img-thumbnail" width="200px" hight="200px">
</div>
<div class="col-7">
<table class=table>
<tr>
<td>Nip : </td>
<th><?= $data['nip'];?></th>
<tr>
<td>Nama : </td>
<th><?= $data['nama_dosen'];?></th>
</tr>
<tr>
</tr>
</table>
<a href="/dosen/update/<?=$data['slug_dosen'];?>" class="btn btn-warning">Update</a>
<form action="/dosen/<?=$data['nip'];?>" method="post" class=d-inline>
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
</div>
</div>
</div>
</div>
<?= $this->endSection();?>