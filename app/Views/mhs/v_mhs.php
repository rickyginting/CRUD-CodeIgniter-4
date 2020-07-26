<?= $this->extend('/template/BaseView');?>
<?= $this->section('konten') ;?>
<a href="/mahasiswa/tambah" class="btn btn-primary mt-3 mb-2">Tambah Mahasiswa</a>
<div class="card text-left">
<div class="card-body">
<h4 class="card-title">Data Mahasiswa</h4>
	<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, officiis debitis saepe odit ratione dolores accusamus nostrum repellendus dolor neque rem officia beatae esse iure commodi architecto eligendi voluptatem illo?</p>
    <hr>
    <?php if (session()->getFlashdata('pesan')) {?>
        <div class="alert alert-primary" role="alert">
        <?= session()->getFlashdata('pesan');?>
    </div>
    <?php } ?>
  
	<table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach($data as $i){?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$i['nama_mhs'];?></td>
                <td><?=$i['nim'];?></td>
                <td><a href="/mahasiswa/<?=$i['slug_mhs'];?>" class="btn btn-info">Detail</a></td>
            </tr>
            <?php $no++; }?>
        </tbody>
    </table>
    <?= $pager->links('','bootstrap'); ?>
</div>
</div>
<?= $this->endSection();?>