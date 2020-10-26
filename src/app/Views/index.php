<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<main role="main" class="container">
    <div class="row mb-4 mt-3">
        <div class="col text-center">
            <h1>¡Atrévete a dibujar a ciegas!</h1>
            <p class="bd-lead">Comparte el resultados con tus amigos :)</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 col-md-4 mb-2 mb-sm-0">
            <div id="imagenPokemon" class="embed-responsive border rounded">
                <img src="<?= base_url() . IMG; ?>logo.png" alt="logo" class="img-fluid" id="imgDibujo" data-id="2">
            </div>
        </div>
        <div class="col-6 col-md-4 mb-2 mb-sm-0">
            <div id="counter" class="rounded-circle h-100 p-2 counter-border counter-gradient">
                <div class="d-flex bg-white h-100 w-100 rounded-circle">
                    <span id="time" class="h1 text-secondary m-auto">10</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div id="canvasDiv" class="embed-responsive border rounded h-100">

            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 text-center">
            <input id="start-button" type="button" value="Comenzar" class="btn btn-primary btn-lg">
            <input id="restart-button" type="button" value="Reiniciar" class="btn btn-primary btn-lg">
        </div>
    </div>
    <div class="row d-none">
        <div class="col-12 text-center">
            <marquee behavior="2" direction="left">
                <?php if (isset($images)) : ?>
                    <?php foreach ($images as $image) : ?>
                        <img src="<?= base_url() . IMG; ?>users/<?= $image->ruta; ?>" width="100px" height="100px" class="img-thumbnail img-responsive" />
                    <?php endforeach ?>
                <?php endif ?>
            </marquee>
        </div>
    </div>
</main>

<?= $this->endSection() ?>