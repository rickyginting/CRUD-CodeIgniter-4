<?= $this->extend('/template/BaseView');?>
<?= $this->section('konten') ;?>
<a href="/dosen/tambah" class="btn btn-primary mt-3 mb-2">Tambah Dosen</a>
<div class="card text-left">
<div class="card-body">
<h4 class="card-title">Data Dosen</h4>
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
                <th>Nip</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach($data as $i){?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$i['nama_dosen'];?></td>
                <td><?=$i['nip'];?></td>
                <td><a href="/dosen/<?=$i['slug_dosen'];?>" class="btn btn-info">Detail</a></td>
            </tr>
            <?php $no++; }?>
        </tbody>
    </table>
    <?= $pager->links('','bootstrap'); ?>
</div>
</div>
<?= $this->endSection();?>