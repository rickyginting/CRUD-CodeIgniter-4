<?= $this->extend('/template/BaseView');?>
<?= $this->section('konten') ;?>
<div class="container mt-5">
	<div class="row">
		<div class="col">
		<h4 class="card-title"><?=$nameapp?></h4>
	<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, officiis debitis saepe odit ratione dolores accusamus nostrum repellendus dolor neque rem officia beatae esse iure commodi architecto eligendi voluptatem illo?</p>
	<hr>
	<a href="/mahasiswa" class="btn btn-primary">Data Mahasiswa (<?=$countmhs;?>)</a>
	<a href="/dosen" class="btn btn-primary">Data Dosen (<?=$countdosen;?>)</a>
		</div>
	</div>
</div>

<?= $this->endSection();?>