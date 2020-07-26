<title><?=SITE_NAME;?> - Tambah Files</title>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <?php $this->load->view('dashboard/_part/sidebar');?>
  <!-- End of Sidebar -->
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <?php $this->load->view('dashboard/_part/nav');?>
      <!-- End of Topbar -->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah Files</h1>
        </div>
        <!-- Content Row -->
        <div class="card shadow mb-">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Files</h6>
          </div>
          <div class="card-body">
            <?=form_open('addfiles');?>
            <div class="form-group">
              <label>ID Files</label>
              <input type="text" class="form-control form-control-user" name="id_files" value="<?=random_string('numeric', 5);?>" readonly>
            </div>
            <div class="form-group">
              <label>Nama Files</label>
              <input type="text" class="form-control form-control-user" name="namafiles">
               <?=form_error('namafiles');?>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <input type="text" class="form-control form-control-user" name="kategori">
               <?=form_error('kategori');?>
            </div>
            <div class="form-group">
              <label>Demo</label>
              <input type="url" class="form-control form-control-user" name="demo">
            </div>
            <div class="form-group">
              <label>Link Download</label>
              <input type="url" class="form-control form-control-user" name="link">
            </div>
            <div class="form-group">
              <label>Hak Download</label>
              <select class="form-control" name="role">
                <option value="member">Member</option>
                <option value="free">Free</option>
              </select>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control form-control-user" name="password" value="<?=random_string('alnum', 16);?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
          </div>
          </div>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->