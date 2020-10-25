<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="container" id="divMain">
		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>¡Atrévete a dibujar a ciegas!</h1>
					<p class="lead">Comparte el resultados con tus amigos :)</p>
				</div>
			</div>
		</div>
		<!-- ZONA DIBUJO -->
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<div id="imagenPokemon" class="img-thumbnail">
					<img src="<?= base_url() . IMG; ?>logo.png" alt="logo" class="img-responsive" id="imgDibujo" data-id="2">
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="pie degree">
					<span class="block"></span>
					<span id="time">10</span>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div id="canvasDiv" class="img-thumbnail img-responsive">

				</div>
			</div>
		</div>
		<!-- FIN ZONA DIBUJO -->
		<div class="row">
			<div class="col-xs-12 text-center">
				<input id="btnMostrar" name="mostrar" type="button" value="Comenzar" onClick="comenzarDibujo();" class="btn btn-primary btn-lg">
				<input id="btnReiniciar" name="mostrar" type="button" value="Reiniciar" onClick="reiniciarDibujo();" class="btn btn-primary btn-lg">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<marquee behavior="2" direction="left">
					<?php if (isset($images)) : ?>
						<?php foreach ($images as $image) : ?>
							<img src="<?= base_url() . IMG; ?>users/<?= $image->ruta; ?>" width="100px" height="100px" class="img-thumbnail img-responsive" />
						<?php endforeach ?>
					<?php endif ?>
				</marquee>
			</div>
		</div>
	</div>
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<br>
				<p>Desarrollado por <a href="http://kronusteam.com" target="_blank">KronusTeam</a>. Contactanos a <a href="mailto:blog@kronusteam.com">blog@kronusteam.com</a>.</p>
			</div>
		</div>
	</footer>
</div>

<?= $this->endSection() ?>