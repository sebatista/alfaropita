
$(document).ready(function(){
    /*FRASE*/
    $("input").keyup(function(){
        var bla = $(this).val();
        $('#widget').text(bla);
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


    //Controles para posicionar (X,Y) la frase.
    $("#texto").click(function(){
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

        /*Posicions absolutas, fijas.
        switch ($(this).val()){
            case "left":
                $(".frase-img").css("left", "0px")
                $(".frase-img").css("right", "")
                break;
            case "700":
                $(".escribir").css("line-height", $(this).val() + "px");
                break;
            case "right":
                $(".frase-img").css("right", "0px")
                $(".frase-img").css("left", "")
                break;
        }
        if($(this).val()=="right")
        {
            $(".frase-img").css("right", "0px")
            $(".frase-img").css("left", "")

        }
        */
    });


    $("#alineacionX").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        $(".frase-img").css("left", $(this).val() + "px")
    });


    $("#texto").click(function(){
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
        img.src = $("#croppedImg").attr('src');;
        var anchoImg = img.width;

        //Asignacion del atributo max a la barra de desplazamiento. (Pone el limite)
        alineacionX.attr('min', '0');
        alineacionX.attr('max', (marcoHorizontal-anchoImg));
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
        alineacionY.attr('min', '0');
        alineacionY.attr('max', marcoVertical-altoImg);
    });

    //Movimiento vertical.
    $("#alineacionY-img").mousemove(function(){
        //Toma la frase y le va asignando los valores recibidos por la barra para desplazar la frase horizonalmente.
        //alert($(this).val());
        $("#croppedImg").css("top", $(this).val() + "px")
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



    /*****CROPPIE*****/
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    /*
    var basic = $('#cropper').croppie({
            viewport: {
                width: 150,
                height: 200
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

    basic.croppie('bind', {
        url: baseUrl + '/app/scripts/croppie/demo/demo-1.jpg',
        points: [77,469,280,739]
    });

    basic.croppie('result', 'html').then(function(html) {
        // html is div (overflow hidden)
        // with img positioned inside.
    });
    */


});



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

    xhttp.open("GET", baseUrl + "/app/design/listarImagenesPrecargadas", true);
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

