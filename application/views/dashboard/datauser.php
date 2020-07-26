<title><?=SITE_NAME;?> - Data User</title>
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
          <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
        </div>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Users</h6>

            </div>

      <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                         <th>ID Telegram</th>
                      <th>Nama</th>
                      <th>Role</th>
                      <th>Tgl Daftar</th>
                      <th>Tgl Upgrade</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                          <th>ID Telegram</th>
                      <th>Nama</th>
                      <th>Role</th>
                      <th>Tgl Daftar</th>
                      <th>Tgl Upgrade</th>

                    </tr>
                  </tfoot>
                  <tbody>
                      <?php foreach ($datauser as $i) {
    echo '<tr><td>' . $i->id_telegram . '</td>
                                    <td><a href="https://t.me/' . $i->username . '">' . $i->nama . '</a></td>';
    if ($i->role == 'member') {
        echo '<td><span class="badge badge-info">Member</span></td>';
    } elseif($i->role == 'free') {
        echo '<td><span class="badge badge-success">Free</span></td>';
    } else{
      echo '<td><span class="badge badge-success">Admin Bot</span></td>';
    }
    
    echo '<td>' . $i->tgl_daftar . '</td>';
    if ($i->role == 'member') {
        echo '<td><span class="badge badge-info">' . $i->tgl_upgrade . '</span></td>';
    } else {
        echo '<td><span class="badge badge-success">Belum di Upgrade</span></td>';
    }
}?>

                            </tr>
                    </tbody>
                </table>
              </div>
            </div>
</div>
    </div>
  </div>

    <!-- End of Main Content -->