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
    <link rel="stylesheet" href="<?= $GLOBALS['path'];?>../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $GLOBALS['path'];?>../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="<?= $GLOBALS['path'];?>../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="<?= $GLOBALS['path'];?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= $GLOBALS['path'];?>css/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $GLOBALS['path'];?>/css/banner.css">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper" style="height: auto; min-height: 100%;">
	<header class="main-header">
    	<nav class="navbar navbar-static-top">
        <div class="container">
        	<div class="navbar-header">
        		<a href="<?= $GLOBALS['path']; ?>Home/" class="navbar-brand"><b>Toko</b>KU</a>
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?= $GLOBALS['path']; ?>Pesanan/">Dasboard <span class="sr-only">(current)</span></a></li>
              <li><a href="">Link</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
              </div>
            </form>
          </div>
        </div>
    	</nav>
  </header>
