/*****Frase e imagenes predeterminadas*****/
$(document).ready(function(){
    /*FRASE*/
    $("#input-1").keyup(function(){
        var bla = $(this).val();
        $('#linea-1').text(bla);
    });


    $("#input-2").keyup(function(){
        var bla = $(this).val();
        $('#linea-2').text(bla);
    });


    $("#input-3").keyup(function(){
        var bla = $(this).val();
        $('#linea-3').text(bla);
    });

    var id = 1;
    $("#newLine").click(function(){
        if(id==1){
            $('#input-2').css("display", "block");
            $('#linea-2').css("display", "block");
        }
        if(id==2){
            $('#input-3').css("display", "block");
            $('#linea-3').css("display", "block");
        }
        id++;
    });


    $("#color").change(function(){
        $(".escribir").css("color", $(this).val());
    });


    $("#size").change(function() {
        //alert($(this).val());
        $('.escribir').css("font-size", $(this).val() + "px");
    });


    $("#fuente").change(function(){
        $(".escribir").css("font-family", $(this).val());
    });


    /*
    $("#newLine").click(function(){
        $('#widget').append( "<div id='newLine'>9</div>");
        $('#newLines').append( "<input class='form-control' type='text' id='newInput' onkeyup='getNewInput()'>");
        $('#newInput').attr('id', 'newInput-'+id);
        $('#newLine').attr('id', 'newLine-'+id);
        id++;
    });
    */

    /*Posicion del texto.*/
    $("#posicion").change(function(){
        switch ($(this).val()){
            case "left":
                $(".frase-img").css("text-align", "left")
                break;
            case "center":
                $(".frase-img").css("text-align", "center");
                break;
            case "right":
                $(".frase-img").css("text-align", "right")
                break;
        }
    });


    //Controles para posicionar (X,Y) la frase.
    $("#input-1").click(function(){
        //Lo comentado es para obtener el ancho y alto de una imagen
        //var img = new Image();
        //img.src = $("#img-producto").attr('src');;
        /*No es necesario para que funcione
        img.onload = function() {
            alert(this.width + 'x' + this.height);
        }
        */

        //Obtener el ancho del div que contiene la img del producto.
        var marcoHorizonal = $("#img-producto-marco").width();
        var alineacionX = $("#alineacionX");

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        //alineacion.attr('max', (img.width));
        alineacionX.attr('max', (marcoHorizonal));

        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $(".frase-img").css("left", $(this).val() + "px")
    });


    $("#alineacionX").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $(".frase-img").css("left", $(this).val() + "px")
    });


    $("#input-1").click(function(){
        //Obtener el alto del div que contiene la img del producto.
        var marcoVertical = $("#img-producto-marco").height();
        var alineacionY = $("#alineacionY");

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        alineacionY.attr('max', (marcoVertical));

        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $(".frase-img").css("top", $(this).val() + "px")
    });


    $("#alineacionY").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $(".frase-img").css("top", $(this).val() + "px")
    });


    //Sin uso, se reemplazo con alineacionY
    $("#posicion").change(function(){
        var size = $("#size").val();
        switch ($(this).val()){
            case "0":
                $(".escribir").css("line-height", $(this).val()+size + "px");
                break;
            case "700":
                $(".escribir").css("line-height", $(this).val() + "px");
                break;
            case "1400":
                $(".escribir").css("line-height", $(this).val()-size + "px");
                break;
        }

        //Si la ubicacion de la frase es al fondo.
        /*
        if($(this).val()=="1400"){
            $(".escribir").css("line-height", $(this).val()-size + "px");
        }else if{
            $(".escribir").css("line-height", $(this).val() + "px");
        }*/

    });


    $("button").click(function(){
        var texto = $(".escribir").text();
        //$("#frase").html(texto);
    });


    //*****Controles para posicionar la imagen*****//
    //Set min y max horizontal.
    $("#imagenesPrecargadas").click(function(){
        //Obtener el alto del div que contiene la img del producto.
        var marcoHorizontal = $("#img-producto-marco").width();
        var alineacionX = $("#alineacionX-img");

        var img = new Image();
        img.src = $("#croppedImg").attr('src');
        var anchoImg = img.width;

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        alineacionX.attr('min', '160');
        alineacionX.attr('max', (marcoHorizontal-anchoImg-160));
    });


    //Movimiento horizontal
    $("#alineacionX-img").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $("#croppedImg").css("left", $(this).val() + "px")
    });


    //Set min y max vertical.
    $("#imagenesPrecargadas").click(function(){
        //Obtener el alto del div que contiene la img del producto.
        var marcoVertical = $("#img-producto-marco").height();
        var alineacionY = $("#alineacionY-img");

        var img = new Image();
        img.src = $("#croppedImg").attr('src');;
        var altoImg = img.height;

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        alineacionY.attr('min', '95');
        alineacionY.attr('max', marcoVertical-altoImg-95);
    });

    //Movimiento vertical.
    $("#alineacionY-img").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        //alert($(this).val());
        $("#croppedImg").css("top", $(this).val() + "px")
    });


    $("#borrarImagenPrecargada").click(function() {
        $("#croppedImg").attr("src","");
    });


    /*Html2canvas*/
    $("#btnSave").click(function() {
        html2canvas($("#widget"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                //document.body.appendChild(canvas);

                // Convert and download as image
                //Canvas2Image.saveAsPNG(canvas);
                Canvas2Image.convertToPNG(canvas);
                var url = canvas.toDataURL();

                //alert(url);
                $("#imagenFrase").val(url);
            }
        });
    });


    $("#saveDesign").click(function() {
        html2canvas($("#design"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                //document.body.appendChild(canvas);

                // Convert and download as image
                //Canvas2Image.saveAsPNG(canvas);
                Canvas2Image.convertToPNG(canvas);
                var url = canvas.toDataURL();

                //alert(url);
                $("#imgDesign").val(url);
                $("#continuar").css("display", "block");
            }
        });
    });

});


/*
/!*****Controles para imagen personalizada*****!/
$(document).ready(function(){
    //!*****Controles para posicionar la imagen*****!/
    //Set min y max horizontal.
    $("#image-preview").click(function(){
        //Obtener el alto del div que contiene la img del producto.
        var marcoHorizontal = $("#img-producto-marco").width();
        var alineacionX = $("#alineacionX-img-custom");

        var img = new Image();
        img.src = $("#image-preview").attr('src');
        var anchoImg = img.width;

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        alineacionX.attr('min', '0');
        alineacionX.attr('max', (marcoHorizontal-anchoImg));
    });

    //Movimiento horizontal
    $("#alineacionX-img-custom").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $("#image-preview").css("left", $(this).val() + "px")
    });

    //Set min y max vertical.
    $("#image-preview").click(function(){
        //Obtener el alto del div que contiene la img del producto.
        var marcoVertical = $("#img-producto-marco").height();
        var alineacionY = $("#alineacionY-img-custom");

        var img = new Image();
        img.src = $("#image-preview").attr('src');
        var altoImg = img.height;

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        alineacionY.attr('min', '0');
        alineacionY.attr('max', marcoVertical-altoImg);
    });

    //Movimiento vertical.
    $("#alineacionY-img-custom").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        //alert($(this).val());
        $("#image-preview").css("top", $(this).val() + "px")
    });
});
*/


/*****CROPPIE*****/
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$(function () {
    var $uploadCrop;

    $(document).ready(function() {
        //Oculto el preview hasta subir la imagen
        $(".croppie-container").css("display", "none");
        //Obtener el ancho del div que contiene la img del producto.
        var marcoVerticalPreview = $("#img-producto").height();
        //Asigna a la clase del preview (donde se muestran las fotos subidas) la altura de la imagen del producto.
        $(".cr-boundary").css("max-height", marcoVerticalPreview + "px");
    });


    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });

            }

            reader.readAsDataURL(input.files[0]);
        }
        else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }


    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200
        },
        enableExif: true
    });


    //Movimiento horizontal del area de recorte.
    $("#alineacionX-viewport").mousemove(function(){
        $(".cr-viewport").css("width", $(this).val() + "px")
    });


    //Movimiento vertical del area de recorte.
    $("#alineacionY-viewport").mousemove(function(){
        $(".cr-viewport").css("height", $(this).val() + "px")
    });


    $('#upload').on('change', function () {
        readFile(this);
        $(".croppie-container").css("display", "");
    });


    $('#upload').click(function () {
        $(".ver-viewport").css("display", "block");
    });


    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'base64',
            format: 'jpg'
        }).then(function(resp) {
            $('#image-preview').attr('src', resp);
            $('#imagenRecortada').val(resp);
            $(".croppie-container").css("display", "none");
        });
    });


    $("#borrarImagen").click(function () {
        /*$('#upload-demo').destroy();*/
        $('#image-preview').attr("src", "");
    });


    $('#recortar').click(function () {
        $(".ver-viewport").css("display", "none");
        $("#ctrl-cropped-img").css("display", "");
    });


    $( "#recortar").mouseleave(function() {
        var marcoHorizontal = $("#img-producto").width();
        var marcoVertical = $("#img-producto").height();
        var alineacionX = $("#alineacionX-img-custom");
        var alineacionY = $("#alineacionY-img-custom");

        var img = new Image();
        img.src = $("#image-preview").attr('src');
        var anchoImg = img.width;
        var altoImg = img.height;

        alineacionX.attr('min', '160');
        //alineacionX.attr('max', (marcoHorizontal-anchoImg-160));
        alineacionX.attr('max', (marcoHorizontal-anchoImg-160));
        alineacionY.attr('min', '95');
        alineacionY.attr('max', marcoVertical-altoImg-95);
    });


    //Movimiento horizontal de la imagen personalizada.
    $("#alineacionX-img-custom").mousemove(function(){
        //Toma la imagen y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $("#image-preview").css("left", $(this).val() + "px")
    });

    //Movimiento vertical de la imagen personalizada.
    $("#alineacionY-img-custom").mousemove(function(){
        //Toma la imagen y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $("#image-preview").css("top", $(this).val() + "px")
    });

});

/*************************************************************************************************/
/*
function getNewInput()
{
    var inputs = document.getElementsByTagName("input");
    var lines = new Array();
    var j = 0;
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].type.toLowerCase() == 'text') {
            //alert(inputs[i].value);
            lines[j]=inputs[i].value
            alert(lines[j])
            document.getElementById("newLine-"+j).innerHTML = valor;
            j++;
        }
    }
}
*/

function verImagenesPrecargadas()
{
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("imagenesPrecargadas").innerHTML = this.responseText;
        }
    };

    //En desarrollo
    //xhttp.open("GET", baseUrl + "/app/design/listarRelCatImg", true);

    //En produccion
    xhttp.open("GET", baseUrl + "/design/listarRelCatImg", true);
    xhttp.send();
}

/*IMAGENES PRECARGADAS*/
function elegirImagen(url, id)
{
    document.getElementById("croppedImg").src = url;
    document.getElementById("idImagenPrecargada").value = id;
    document.getElementById("urlImagenPrecargada").value = url;
    //document.getElementById("croppedImg").setAttribute("width", "250");
    //document.getElementById("croppedImg").setAttribute("height", "250");
}

