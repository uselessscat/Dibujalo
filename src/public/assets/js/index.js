class App {
    constructor() {
        this.countDownTimer = new CountDownTimer({
            seconds: 10,
            listeners: {
                onChange: this.onTimerChange.bind(this),
                onStop: this.onTimerStop.bind(this)
            }
        });

        $('#btnReiniciar').hide();

        this.addEventListeners();
    }

    addEventListeners() {
        $('#start-button').click(this.onStart.bind(this));
        $('#restart-button').click(this.onRestart.bind(this));

        $(document).on('mousedown', '#canvas', function (e) {
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            pulsado = true;
            addMovimiento(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
            //repinta();
        });

        $(document).on('mousemove', '#canvas', function (e) {
            if (pulsado) {
                addMovimiento(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                repinta();
            }
        });

        $(document).on('mouseup', '#canvas', function (e) {
            pulsado = false;
        });

        $(document).on('mouseleave', '#canvas', function (e) {
            pulsado = false;
        });
    }

    onStart() { // comenzarDibujo
        // loadImageRandom();

        $('#btnMostrar').hide();
        $('#btnReiniciar').show();

        //initCanvas();
        this.countDownTimer.start();
    }

    onRestart() { // reiniciarDibujo
        terminarReloj();

        $('#imgDibujo').prop('src', 'assets/img/logo.png');
        $('#imgDibujo').prop('alt', 'Logo Dibujalo');
        $('#imgDibujo').prop('title', 'Logo Dibujalo');
        $('#imgDibujo').prop('data-id', '');

        $('.counter-gradient').css('--degrees', '360deg');
        $('#btnMostrar').show();
        $('#btnReiniciar').hide();

        $('#time').html('30');

        resetMovimiento();
        $('#canvasDiv').html('');

    }

    onTimerChange(millisLeft) {
        $('#time').html(Math.ceil(millisLeft / 1000));

        const deg = 360 * millisLeft / this.countDownTimer.millis;

        $('.counter-gradient').css('--degrees', `${deg}deg`);
    }

    onTimerStop() {
        repinta();
        //upload();
    }
}

let app;

$(document).ready(function (e) {
    app = new App();
});

function upload() {
    var rel = $('#imgDibujo')
        .prop('data-id');

    $.ajax({
        url: 'upload-image',
        data: {
            rel: rel,
            img: canvas.toDataURL('image/png')
        },
        type: 'POST',
        async: false,
        beforeSend: function (bf) {

        },
        success: function (resp) {
            console.log(resp);
            //window.location.href ='http://kronusteam.com/dibujalo/referido.php?base='+resp+'&rel='+rel+'/';
        }
    });
}