<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Dibujalo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() . BOOTSTRAP; ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() . CSS; ?>def.css">
	<?php
	if (isset($include_css)) {
		foreach ($include_css as $css) {
	?>
			<link rel="stylesheet" type="text/css" href="<?= base_url() . CSS . $css; ?>">
	<?php
		}
	}
	?>
</head>

<body>
	<?= $this->load->view('common/menu', null, true); ?>