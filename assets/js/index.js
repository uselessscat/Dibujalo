/* cronometro*/
var int;
var totaltime = 10;
/*cronometro*/

$(document).ready(function(e) {
	$("#btnReiniciar").hide();

	$(document).on('mousedown', '#canvas', function(e){
		var mouseX = e.pageX - this.offsetLeft;
		var mouseY = e.pageY - this.offsetTop;

		pulsado = true;
		addMovimiento(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
		//repinta();
		console.log(context);
	});

	$(document).on('mousemove', '#canvas', function(e){
		if(pulsado){
			addMovimiento(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
    		repinta();
    	}
    });

	$(document).on('mouseup','#canvas',function(e){
		pulsado = false;
	});

	$(document).on('mouseleave','#canvas',function(e){
		pulsado = false;
	});
});


function loadImageRandom(){
	$.ajax({
		url:"get-image",
		data:"1=1",
		type:"POST",
		async:false,
		dataType:"json",
		success: function(resp){
			if(resp.type==='ok'){
				$("#imgDibujo").prop("src",resp.ruta);
				$("#imgDibujo").prop("alt",resp.nombre);
				$("#imgDibujo").prop("title",resp.nombre);
				$("#imgDibujo").prop("data-id",resp.id);
			}
		}
	});
}

function comenzarDibujo(){
	loadImageRandom();
	$("#btnMostrar").hide();
	$("#btnReiniciar").show();
	
	initCanvas();
	comenzar();
}
function reiniciarDibujo(){
	terminarReloj();
	
	$("#imgDibujo").prop("src","assets/img/logo.png");
	$("#imgDibujo").prop("alt","Logo Dibujalo");
	$("#imgDibujo").prop("title","Logo Dibujalo");
	$("#imgDibujo").prop("data-id","");

	$('.pie').css('background-image','');
	$("#btnMostrar").show();
	$("#btnReiniciar").hide();
	
	$("#time").html("30");
	reset_click();
	$("#canvasDiv").html("");	
}

function upload() {
	var rel =$("#imgDibujo").prop('data-id');
	$.ajax({
		url:'upload-image',
		data:{
			rel : rel,
			img : canvas.toDataURL('image/png')
		},
		type:'POST',
		async:false,
		beforeSend:function(bf){
			
		},
		success:function(resp){
			console.log(resp);
			//window.location.href ="http://kronusteam.com/dibujalo/referido.php?base="+resp+"&rel="+rel+"/";
		}
	});
}

/********CRONOMETRO**********/
function comenzar(){
	var count = parseInt($('#time').text());
	int = setInterval(function () {
		count -= 1;
		$('#time').html(count);
		update(count);
		if (count == 0){
			terminarReloj();
			repinta();
			//upload();
		}
	}, 1000);
}

function terminarReloj(){
	int=window.clearInterval(int);  
}

function update(percent) {
	var deg;
	if (percent < (totaltime / 2)) {
		deg = 90 + (360 * percent / totaltime);
		$('.pie').css('background-image',
			'linear-gradient(' + deg + 'deg, transparent 50%, white 50%),linear-gradient(90deg, white 50%, transparent 50%)'
			);
	} else if (percent >= (totaltime / 2)) {
		deg = -90 + (360 * percent / totaltime);
		$('.pie').css('background-image',
			'linear-gradient(' + deg + 'deg, transparent 50%, #bf3e11 50%),linear-gradient(90deg, white 50%, transparent 50%)'
			);
	}
}
/*****FIN CRONOMETRO********/