/*Dibujo*/
var pulsado;
var context;
var canvas;
var canvasDiv;

var clickX = new Array();
var clickY = new Array();
var clickDrag = new Array();
var clickColor = new Array();

var colorPurple = '#cb3594';
var colorGreen = '#659b41';
var colorYellow = '#ffcf33';
var colorBrown = '#986928';

var curColor = colorPurple;

function initCanvas() {
	canvasDiv = document.getElementById('canvasDiv');
	canvas = document.createElement('canvas');

	canvas.setAttribute('width', 350);
	canvas.setAttribute('height', 350);
	canvas.setAttribute('id', 'canvas');

	canvasDiv.appendChild(canvas);

	if (typeof G_vmlCanvasManager != 'undefined') {
		canvas = G_vmlCanvasManager.initElement(canvas);
	}

	context = canvas.getContext('2d');
}

function repinta() {
	clearCanvas();

	context.strokeStyle = '#df4b26';
	context.lineJoin = 'round';
	context.lineWidth = 5;

	for (var i = 0; i < clickX.length; i++) {
		context.beginPath();

		if (clickDrag[i] && i) {
			context.moveTo(clickX[i - 1], clickY[i - 1]);
		} else {
			context.moveTo(clickX[i] - 1, clickY[i]);
		}

		context.lineTo(clickX[i], clickY[i]);
		context.closePath();
		context.strokeStyle = clickColor[i];
		context.stroke();
	}
}

function addMovimiento(x, y, dragging) {
	clickX.push(x);
	clickY.push(y);
	clickDrag.push(dragging);
	clickColor.push(curColor);
}

function resetMovimiento() {
	clickX = new Array();
	clickY = new Array();
	clickDrag = new Array();
	clickColor = new Array();
}

function clearCanvas() {
	context.fillStyle = '#ffffff';

	context.clearRect(0, 0, context.canvas.width, context.canvas.height);
	canvas.width = canvas.width;
}