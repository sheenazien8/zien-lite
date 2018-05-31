<!DOCTYPE html>
<html>
<head>
	<title>Side Project</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="../../public/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../public/css/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper" style="height: auto; min-height: 100%;">
	<header class="main-header">
    	<nav class="navbar navbar-static-top">
      <div class="container">
      	<div class="navbar-header">
      		<a href="../content" class="navbar-brand"><b>Toko</b>KU</a>
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../pesanan/">Dasboard <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="../keranjang/">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-warning">10</span>
            </a>
          </li>
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../../public/images/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Sheena</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../../public/images/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">

                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
        </ul>
        </div>

      </div>
    	</nav>
  </header>

	<div class="content-wrapper">
		<div class="container">
		<!-- Content Header (Page header) -->
  		<section class="content">
        <div class="row">
          <div class="col-lg-3">
            <div class="list-group">
              <a href="../kategori/" class="active list-group-item">Kategori</a>
              <a href="../barang/" class="list-group-item">Barang</a>
              <a href="../pesanan/" class="list-group-item">Pesanan</a>
              <a href="../user/" class="list-group-item">User</a>
            </div>

          </div>
          <div class="col-lg-9">
          <a href="create.php" class="btn btn-primary">Tambah Kategori +</a>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Kategori</th>
                  <th style="width: 10px;">Status</th>
                  <th class="text-center">Action</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Smartphone</td>
                  <td>On</td>
                  <td class="text-center">
                    <a href="#" data-target="#modal-default" data-toggle="modal" class="btn">
                      <i class="fa fa-pencil"></i>
                      <span class="pull-right-container">
                      </span>
                    </a>
                    <a href="#" data-target="#modal-default" data-toggle="modal" class="btn">
                      <i class="fa fa-trash-o"></i>
                      <span class="pull-right-container">
                      </span>
                    </a>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
      </section>
		<!-- /.content -->
		</div>
	<!--/.container -->
	</div>

	<footer class="main-footer">
		<div class="container">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.0
			</div>
			<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights reserved.
		</div>
		<!-- /.container -->
	</footer>
</div>


<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../public/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/js/demo.js"></script>
</body>
</html>
