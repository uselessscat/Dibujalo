<!DOCTYPE html>
<html lang="es">

<head>
	<title>Dibujalo</title>

	<!-- meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- css imports -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="<?= base_url() . '/' . CSS; ?>main.css">

	<!-- additional injected css files -->
	<?php if (isset($include_css)) foreach ($include_css as $css) : ?>
		<link rel="stylesheet" type="text/css" href="<?= base_url() . CSS . $css; ?>">
	<?php endforeach; ?>
</head>

<body>
	<!-- site contents -->
	<?= $this->include('partials/menu') ?>
	<?= $this->renderSection('content') ?>
	<?= $this->include('partials/footer') ?>

	<!-- scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

	<script src="<?= base_url() . JS; ?>/gcPlugin.js"></script>

	<?php if (isset($include_js)) foreach ($include_js as $js) : ?>
		<script type="text/javascript" src="<?= base_url() . JS . $js; ?>"></script>
	<?php endforeach; ?>
</body>

</html>