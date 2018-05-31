<!DOCTYPE html>
<html>
<head>
	<title>Belajar MVC</title>
	<link rel="stylesheet" type="text/css" href=" <?= $GLOBALS['path']; ?>css/style.css">
</head>
<body>
	<?php foreach ($data['users'] as $user): ?>
		<p><?= $user['nama'] ?></p>
	<?php endforeach ?>
</body>
</html>
