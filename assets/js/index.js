// JavaScript Document
var tamPicel	= 3;
var movimientos = new Array();
var pulsado;
/* cronometro*/
var int;

var totaltime = 45;

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

$(document).ready(function(e) {
	$("#btnReiniciar").hide();

	$(document).on('mousedown','#canvas',function(e){
		pulsado = true;
		movimientos.push([e.pageX - this.offsetLeft,
			e.pageY - this.offsetTop,
		false]);
	});

	$(document).on('mousemove','#canvas',function(e){
		if(pulsado){
			movimientos.push([e.pageX - this.offsetLeft,
				e.pageY - this.offsetTop,
				true]);
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
		url:"Site/getRndImage",
		data:"1=1",
		type:"POST",
		async:false,
		dataType:"json",
		success: function(resp){
			if(resp.type==='ok'){
				$("#imgDibujo").prop("src","../assets/img/default/"+resp.ruta);
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
	
	$("#imgDibujo").prop("src","../assets/img/logo.png");
	$("#imgDibujo").prop("alt","Logo Dibujalo");
	$("#imgDibujo").prop("title","Logo Dibujalo");
	$("#imgDibujo").prop("data-id","");
			
	$('.pie').css('background-image','');
	$("#btnMostrar").show();
	$("#btnReiniciar").hide();
	
	$("#time").html("30");
	movimientos = new Array();
	$("#canvasDiv").html("");	
}

function initCanvas() {
	
	var canvasDiv = document.getElementById('canvasDiv');
	canvas = document.createElement('canvas');
	canvas.setAttribute('width', 350);
	canvas.setAttribute('height', 350);
	canvas.setAttribute('id', 'canvas');
	canvasDiv.appendChild(canvas);
	if(typeof G_vmlCanvasManager != 'undefined') {
		canvas = G_vmlCanvasManager.initElement(canvas);
	}
	context = canvas.getContext("2d");		
}
	
function repinta(){
	canvas.width = canvas.width; // Limpia el lienzo

	context.strokeStyle = "#999";//Color Pincel
	context.lineJoin = "round"; // Estilo
	context.lineWidth = tamPicel; //Tamaño Pincel
				
	for(var i=0; i < movimientos.length; i++)
	{     
		context.beginPath();
		if(movimientos[i][2] && i){
			context.moveTo(movimientos[i-1][0], movimientos[i-1][1]);
		}else{
			context.moveTo(movimientos[i][0], movimientos[i][1]);
		}
		context.lineTo(movimientos[i][0], movimientos[i][1]);
		context.closePath();
		context.stroke();
	}
}

function upload() {
	var rel =$("#imgDibujo").prop('data-id');
	$.ajax({
		url:'Site/upload-image',
		data:{
			rel : rel,
			img : canvas.toDataURL()
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
			upload();
		}
	}, 1000);
}

function terminarReloj(){
	int=window.clearInterval(int);  
}
/*****FIN CRONOMETRO********/