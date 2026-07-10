<!--Ruang data user-->
<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project UAS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Penjualan
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>

          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <h3 class="card-title">
                  Data User
              </h3>

              <div class="float-right">

                  <button
                  class="btn btn-primary btn-sm"
                  data-toggle="modal"
                  data-target="#modalTambah">

                  + Tambah User

                  </button>

              </div>

          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">

              <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
                <?php

                $no = 1;

                $query = mysqli_query($koneksi, "SELECT * FROM user");

                while($row = mysqli_fetch_array($query))
                {
                ?>

                <tr>

                <td><?php echo $no++; ?></td>

                <td><?php echo $row['nama_lengkap']; ?></td>

                <td><?php echo $row['username']; ?></td>

                <td><?php echo $row['password']; ?></td>

                <td><?php echo $row['status']; ?></td>

                <td>

                <button
                type="button"
                class="btn btn-warning btn-sm"
                data-toggle="modal"
                data-target="#myModal<?php echo $row['id']; ?>">
                    Edit
                </button>

                <a href="hapususer.php?id=<?php echo $row['id']; ?>"
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('Yakin ingin menghapus data ini?')">

                  Hapus

                </a>

                </td>

                </tr>

                <div class="modal fade" id="myModal<?php echo $row['id']; ?>">

                <div class="modal-dialog">

                <div class="modal-content">

                <div class="modal-header">

                <h5 class="modal-title">

                Update Data User

                </h5>

                <button type="button" class="close" data-dismiss="modal">

                ×

                </button>

                </div>

                <div class="modal-body">

                <form action="edituser.php" method="POST">

                <input type="hidden"
                      name="id"
                      value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text"
                          name="nama_lengkap"
                          class="form-control"
                          value="<?php echo $row['nama_lengkap']; ?>">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text"
                          name="username"
                          class="form-control"
                          value="<?php echo $row['username']; ?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password"
                          name="password"
                          class="form-control"
                          value="<?php echo $row['password']; ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text"
                          name="status"
                          class="form-control"
                          value="<?php echo $row['status']; ?>">
                </div>

                </div>

                <div class="modal-footer">

                <button type="submit"
                        class="btn btn-success">
                    Simpan Perubahan
                </button>

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Batal
                </button>

                </form>

                Close

                </button>

                </div>

                </div>

                </div>

                </div>
                <?php
                }
                ?>

              </table>   
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modalTambah">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">

Tambah Data User

</h5>

<button
type="button"
class="close"
data-dismiss="modal">

×

</button>

</div>

<div class="modal-body">

<form
action="tambahuser.php"
method="POST">

<div class="form-group">

<label>Nama Lengkap</label>

<input
type="text"
name="nama_lengkap"
class="form-control">

</div>

<div class="form-group">

<label>Username</label>

<input
type="text"
name="username"
class="form-control">

</div>

<div class="form-group">

<label>Password</label>

<input
type="password"
name="password"
class="form-control">

</div>

<div class="form-group">

<label>Status</label>

<input
type="text"
name="status"
class="form-control">

</div>

<button
type="submit"
class="btn btn-success">

Simpan

</button>

</form>

</div>

</div>

</div>

</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
