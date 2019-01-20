<!--div id="move-stats" style="position:absolute;left:2%;top:250px;padding:10px;box-shadow:0 0 8px 2px rgba(100, 100, 100, .4);font-family:tahoma;"></div-->
<!--div id="contain" style="position:absolute;width:50%;height:60%;left:40%;top:250px;box-shadow:0 0 8px 2px rgba(100, 100, 100, .4);"></div-->
<!--button class="resize-done">Done</button-->


<div id="demo-basic">
    <img src="/alfaropita/app/scripts/croppie/demo/demo-1.jpg" />
</div>
<button class="basic-result">Recortar</button>


<div class="container-fluid">

    <div class="row">
        <div class="col-md-4">
            <!--div class="inputLabel">
                <label for="upphoto"> Subi tu foto </label>
                <input type="file" id="upphoto" style="display:none;">
            </div>

            <div class="cropHolder">
                <div id="cropWrapper">
                    <img id="inputImage" src="<?php echo base_url(); ?>scripts/crop/images/face.jpg" style="display: block; margin: auto;">
                </div>
                <div class="cropInputs">
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
            </div-->


            <h3>Categorias</h3>
            <div id="imagenesPrecargadas" class="img-precargadas"></div>

            <!--Controles para el movimiento de la imagen-->
            <label>Alineacion horizonal de la imagen:</label>
            <input type="range" id="alineacionX-img" name="alineacionX-img">
            <label>Alineacion vertical de la imagen:</label>
            <input type="range" id="alineacionY-img" name="alineacionY-img">
        </div>

        <!--div style="background-image: url(<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>); height: 800px; width: 1000px;"-->
        <div id="img-producto-marco" class="col-md-4 marco">
            <img id="img-producto" class="back-img" src="<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>">

            <img class="front-img" id="croppedImg" >

            <div id="widget" class="escribir frase-img"> </div>
        </div>

        <div class="col-md-4">
            <label>Escribi tu frase:</label>
            <input class="form-control" type="text" id="texto" required><br>

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

            <label>Alineacion horizonal de la frase:</label>
            <input type="range" id="alineacionX" name="alineacionX" min="0" value="0">
            <!--select class="form-control"  required>
                <option value="">Elija una alineacion</option>
                <option value="left">Izquierda</option>
                <option value="center">Centrado</option>
                <option value="right">Derecha</option>
            </select--><br>

            <label>Alineacion vertical de la frase:</label>
            <input type="range" id="alineacionY" name="alineacionY" min="0" value="0">
            <!--select class="form-control" id="posicion" required>
                <option value="">Elija una posicion</option>
                <option value="0">Arriba</option>
                <option value="700">Medio</option>
                <option value="1400">Abajo</option>
            </select--><br>

            <button id="btnSave" class="btn btn-primary" data-dismiss="modal" type="button"> Terminar </button>

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



