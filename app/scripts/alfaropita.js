
$(document).ready(function(){
    /*FRASE*/
    $("input").keyup(function(){
        var bla = $(this).val();
        $('.escribir').text(bla);
    });

/*
    $("#area").keyup(function(){
        var bla = $(this).val();
        $('#mostrarFrase').text(bla);
    });
*/

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


    $("#alineacion").change(function(){
        $(".escribir").css("text-align", $(this).val());
    });


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
    document.getElementById("croppedImg").setAttribute("width", "250");
    document.getElementById("croppedImg").setAttribute("height", "250");
}

