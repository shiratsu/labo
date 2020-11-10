// simple.js

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

// Asynchronous download of PDF
var loadingTask = pdfjsLib.getDocument("https://labo.test/base_pdf");
loadingTask.promise.then(function(pdf) {
  console.log('PDF loaded');
  
  // Fetch the first page
  var pageNumber = 1;
  pdf.getPage(pageNumber).then(function(page) {
    console.log('Page loaded');
    
    var scale = 1.5;
    var viewport = page.getViewport({scale: scale});

    // Prepare canvas using PDF page dimensions
    var canvas = document.getElementById('the-canvas');
    var context = canvas.getContext('2d');
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: context,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);
    renderTask.promise.then(function () {
      console.log('Page rendered');
    });
    // startup();
    // make_base(context);
  });
}, function (reason) {
  // PDF loading error
  console.error(reason);
});



function startup() {
    
    var el = document.getElementById("the-canvas");
    el.addEventListener( "mousedown", onDown, false );
    el.addEventListener( "mouseup", onUp, false );
    el.addEventListener( "touchstart", onDown, false );
    el.addEventListener( "touchend", onUp, false );
    // el.addEventListener("touchend", handleEnd, false);
    // el.addEventListener("touchcancel", handleCancel, false);
    // el.addEventListener("touchmove", handleMove, false);
}

function onDown ( e ) {
    var x = e.pageX,
        y = e.pageY;
 
    // x -= el.offsetLeft;
    // y -= el.offsetTop;

    console.log("taptap");
    console.log("x:"+x);
    console.log("y:"+y);

    put_hanko(x-10,y-10);
}
 
function onUp () {
 
}

document.addEventListener("DOMContentLoaded", startup);




function make_base(context){
    base_image = new Image();
    base_image.src = 'http://localhost:8000/image_composite.php';
    

    base_image.onload = function(){
        base_image.width = 40;
        base_image.height = 40;
        context.drawImage(base_image, 490, 620,40,40);
    }
}

function put_hanko(x,y){
    base_image = new Image();
    base_image.src = 'http://localhost:8000/image_composite.php';

    var canvas = document.getElementById('the-canvas');
    var context = canvas.getContext('2d');
    

    base_image.onload = function(){
        base_image.width = 40;
        base_image.height = 40;
        context.drawImage(base_image, x, y,40,40);
    }
}