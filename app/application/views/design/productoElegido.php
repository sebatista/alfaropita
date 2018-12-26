<div id="imagenesPrecargadas"></div>

<div class="container">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="inputLabel" data-toggle="modal" data-target="#myModal">
                <label for="upphoto"> Subi tu foto </label>
            </div>
            <input type="file" id="upphoto" style="display:none;" />
        </div>

        <div class="col-md-4">
            <div class="inputLabel" onclick="verImagenesPrecargadas()">
                <label> Elegi una imagen </label>
            </div>
            <input type="file" id="upphoto" style="display:none;" />
        </div>

        <div class="col-md-4">
            <div class="inputLabel" data-toggle="modal" data-target="#texto">
                <label> Escribi una frase </label>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-12">
            <form method="POST" action="<?php echo base_url(); ?>guardarEstampado" name="grilla">
                <input type="hidden" name="grilla[idProducto]" value="<?php echo $producto["id_producto"]; ?>">
                <input type="hidden" name="grilla[nombre_producto]" value="<?php echo $producto["nombre_producto"]; ?>">
                <input type="hidden" name="grilla[sku]" value="<?php echo $producto["sku"]; ?>">
                <!--Id de imagen del producto -->
                <input type="hidden" name="grilla[idImagen]" value="<?php echo $producto["id_imagen"]; ?>">
                <!--Imagen del producto -->
                <input type="hidden" name="grilla[urlImagen]" value="<?php echo base_url(); ?>wp-content/uploads/<?php echo $producto["url_imagen"]; ?>">
                <!--Imagen de la frase -->
                <input type="hidden" name="grilla[urlImagenFrase]" id="imagenFrase" value="">
                <input type="hidden" name="grilla[id_categoria]" value="<?php echo $producto["id_categoria"]; ?>">
                <input type="hidden" name="grilla[nombre_categoria]" value="">
                <!--Base64 de la imagen recortada -->
                <input type="hidden" name="grilla[imagenRecortada]" id="imagenRecortada" value="">
                <!--Id de la imagen precargada -->
                <input type="hidden" name="grilla[idImagenPrecargada]" id="idImagenPrecargada" value="">
                <!--URL de la imagen precargada -->
                <input type="hidden" name="grilla[urlImagenPrecargada]" id="urlImagenPrecargada" value="">
                <button type="submit" class="inputLabel continuar"><strong>Continuar</strong></button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <img class="back-img" src="<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>" height="700" width="700">
            <img class="front-img" id="croppedImg">
            <div id="widget" class="escribir frase-img" style="max-height: 700px; max-width: 700px;">

            </div>
        </div>
    </div>


    <!-- Modal frase-->
    <div class="modal fade" id="texto" role="dialog">
        <div class="modal-dialog" >
            <!-- Modal content-->
            <div class="modal-content row" style="height: 800px;">
                <div class="col-md-2">
                </div>
                <div class="col-md-6 text-center">
                    <!--p class="escribir" id="mostrarFrase"></p-->
                    <div class="modal-frase escribir" style="border-style: solid; border-width: 2px; height: 700px; width: 700px; ">

                    </div>
                </div>

                <div class="col-md-2">
                    <div style="margin: 15% 1%;">
                        <label>Escribi tu frase:</label>
                        <input class="form-control" type="text" id="texto" required><br>

                        <!--textarea class="form-control" type="text" id="area" required></textarea><br-->

                        <label>Elegi tu color:</label>
                        <input class="form-control" type="color" id="color" value="#ff0000"><br>

                        <label>Elegi el tipo de letra:</label>
                        <select class="form-control" id="fuente">
                            <option value="Arial">Arial</option>
                            <option value="Verdana ">Verdana </option>
                            <option value="Impact ">Impact </option>
                            <option value="Comic Sans MS">Comic Sans MS</option>
                        </select><br>

                        <label>Elegi el tama&ntilde;o:</label>
                        <select class="form-control" id="size">
                            <?php for($i=7; $i<77; $i+=2){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select><br>

                        <label>Elegi la alineacion de la frase:</label>
                        <select class="form-control" id="alineacion" required>
                            <option value="">Elija una alineacion</option>
                            <option value="left">Izquierda</option>
                            <option value="center">Centrado</option>
                            <option value="right">Derecha</option>
                        </select><br>

                        <label>Elegi la posicion de la frase:</label>
                        <select class="form-control" id="posicion" required>
                            <option value="">Elija una posicion</option>
                            <option value="0">Arriba</option>
                            <option value="700">Medio</option>
                            <option value="1400">Abajo</option>
                        </select><br>

                        <button id="btnSave" class="btn btn-primary" data-dismiss="modal" type="button"> Terminar </button>
                    </div>
                </div>

                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal foto-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content row">
                <div class="cropHolder">
                    <div id="cropWrapper" class="cropInputs col-md-10">
                        <img id="inputImage" src="<?php echo base_url(); ?>scripts/crop/images/face.jpg" style="display: block; margin: auto;">
                    </div>
                    <div class="cropInputs col-md-2">
                        <div class="inputtools">
                            <p>
                              <span>
                                  <img src="<?php echo base_url(); ?>scripts/crop/images/horizontal.png">
                              </span>
                              <span>horizontal movement</span>
                            </p>
                            <input type="range" class="cropRange" name="xmove" id="xmove" min="0" value="0">
                        </div>
                        <div class="inputtools">
                            <p>
                              <span>
                                  <img src="<?php echo base_url(); ?>scripts/crop/images/vertical.png">
                              </span>
                              <span>vertical movement</span>
                            </p>
                            <input type="range" class="cropRange" name="ymove" id="ymove" min="0" value="0">
                        </div>
                        <br>
                        <button class="cropButtons" id="zplus">
                            <img src="<?php echo base_url(); ?>scripts/crop/images/add.png">
                        </button>
                        <button class="cropButtons" id="zminus">
                            <img src="<?php echo base_url(); ?>scripts/crop/images/minus.png">
                        </button>
                        <br>
                        <button id="cropSubmit" data-dismiss="modal">Submit</button>
                        <button id="closeCrop">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $("#upphoto").finecrop({
        viewHeight: 500,
        cropWidth: 200,
        cropHeight: 200,
        cropInput: 'inputImage',
        cropOutput: 'croppedImg',
        zoomValue: 50
    });
</script>
