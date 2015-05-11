<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="site" class="navbar-brand">
				<img src="<?=base_url().IMG;?>logo_completo.png" alt="logo dibujalo" width="130" height="30" class="img-responsive">
			</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li><a href="https://facebook.com/kronusteam" target="_blank">Facebook</a></li>
				<li><a href="https://twitter.com/kronusteam" target="_blank">Twitter</a></li>
				<li><a href="site/gallery">Galeria</a></li>
			</ul>
		</div>
	</div>
</div>


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
					<img src="<?=base_url().IMG;?>logo.png" alt="logo" class="img-responsive" id="imgDibujo" data-id="2">
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="pie degree">
					<span class="block"></span>
					<span id="time">45</span>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div id="canvasDiv" class="img-thumbnail img-responsive"></div>
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
					<?php if (isset($images)): ?>
						<?php foreach ($images as $image): ?>
							<img src="<?=base_url().IMG;?>users/<?=$image->ruta; ?>" width="100px" height="100px" class="img-thumbnail img-responsive"/>	
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
</div><!--FIN container-->