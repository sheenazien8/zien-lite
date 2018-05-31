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

<script src="<?= $GLOBALS['path'];?>../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= $GLOBALS['path'];?>../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= $GLOBALS['path'];?>../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= $GLOBALS['path'];?>../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= $GLOBALS['path'];?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $GLOBALS['path'];?>js/demo.js"></script>
<script src="<?= $GLOBALS['path'];?>js/Slides-SlidesJS-3/source/jquery.slides.min.js"></script>
<script>
  $(function() {
    $('#slides').slidesjs({
      height: 350,
      play: { auto : true,
            interval : 3000
          },
      navigation : false
    });
  });
</script>
</body>
</html>
