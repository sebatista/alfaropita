
<div class="container-fluid" style="margin: 2% 2% 0 2%;">
    <div class="row">
        <div class="col-md-3">
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <label for="upload" class="btn btn-primary btn-block" style="margin: 1% 0%;">Subi tu foto</label>
                    <input id="upload" class="btn btn-primary" type="file" value="Choose a file" accept="image/*" style="margin: 1% 0%;"/>
                </div>
                <div class="btn-group">
                    <button id="recortar" class="upload-result btn btn-primary">Recortar</button>
                </div>
                <div class="btn-group">
                    <button id="borrarImagen" class="btn btn-primary"> Borrar </button>
                </div>
            </div>
            <br>

            <!--Controles para el movimiento de la imagen personalizada-->
            <div id="ctrl-cropped-img" style="display: none;">
                <label>Alineacion horizonal de tu imagen:</label>
                <input type="range" class="cr-slider" id="alineacionX-img-custom" name="alineacionX-img-custom"><br>
                <label>Alineacion vertical de tu imagen:</label>
                <input type="range" class="cr-slider" id="alineacionY-img-custom" name="alineacionY-img-custom">
            </div>

            <div class="ver-viewport">
                <br>
                <label >Alineacion horizonal del area de corte:</label>
                <input type="range" class="cr-slider" id="alineacionX-viewport" name="alineacionX-viewport" max="450"><br>
                <label>Alineacion vertical del area de corte:</label>
                <input type="range" class="cr-slider" id="alineacionY-viewport" name="alineacionY-viewport" max="450"><br>
            </div>


            <h3>Categorias</h3>
            <div id="imagenesPrecargadas" class="img-precargadas"></div>
            <button id="borrarImagenPrecargada" class="btn btn-primary btn-block" <!--style="color: #fff; background-color: #B1D895;"--> Borrar </button>
            <br>

            <!--Controles para el movimiento de la imagen predeterminada-->
            <label>Alineacion horizonal de la imagen:</label>
            <input type="range" class="cr-slider" id="alineacionX-img" name="alineacionX-img"><br>
            <label>Alineacion vertical de la imagen:</label>
            <input type="range" class="cr-slider" id="alineacionY-img" name="alineacionY-img"><br>

            <!--Boton para guardar el diseño y que aparezca en el boton continuar -->
            <button type="submit" id="saveDesign" style="margin: 1% 0%;" class="continuar btn btn-primary btn-block"><strong>Guardar dise&ntilde;o</strong></button>
        </div>

        <!--div style="background-image: url(<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>); height: 800px; width: 1000px;"-->
        <div id="img-producto-marco" class="col-md-6 marco">
            <div id="design">
                <!--img id="img-producto" class="back-img" src="<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>"-->
                <img id="img-producto" class="back-img" src="<?php echo '../../wp-content/uploads/'.$producto["url_imagen"]; ?>" height="600" width="600">

                <!--Imagen personalizada-->
                <img id="image-preview" class="custom-img">

                <!--Imagen predeterminada-->
                <img id="croppedImg" class="front-img">

                <!--Frase personalizada-->
                <div class="frase-img">
                    <p id="linea-1" class="escribir"> </p>
                    <p id="linea-2" class="escribir" style="display: none;"> </p>
                    <p id="linea-3" class="escribir" style="display: none;"> </p>
                </div>

                <!--En este div se cargan los elementos del plugin-->
                <div id="upload-demo">
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <label>Escribi tu frase:</label>
            <input class="form-control" type="text" id="input-1" required>
            <input class="form-control" style="display: none;" type="text" id="input-2">
            <input class="form-control" style="display: none;" type="text" id="input-3">
            <br>
            <button id="newLine" class="btn btn-primary btn-block"> Nueva linea </button>

            <label>Elegi tu color:</label>
            <input class="form-control" type="color" id="color" value="#ff0000"><br>

            <label>Elegi el tipo de letra:</label>
            <select class="form-control" id="fuente">
                <option value="Arial">Arial</option>
                <option value="Sans Serif">Sans-serif</option>
                <option value="Arial Black">Arial Black</option>
                <option value="Gadget">Gadget</option>
                <option value="Bookman Old Style">Bookman Old Style</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Courier">Courier</option>
                <option value="Garamond">Garamond</option>
                <option value="Georgia">Georgia</option>
                <option value="Impact">Impact</option>
                <option value="Charcoal">Charcoal</option>
                <option value="Lucida Console">Lucida Console</option>
                <option value="Monaco">Monaco</option>
                <option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
                <option value="Lucida Grande">Lucida Grande</option>
                <option value="MS Sans Serif">MS Sans Serif</option>
                <option value="Geneva">Geneva</option>
                <option value="Palatino Linotype">Palatino Linotype</option>
                <option value="Book Antiqua">Book Antiqua</option>
                <option value="Palatino">Palatino</option>
                <option value="Symbol">Symbol</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Trebuchet MS">Trebuchet MS</option>
                <option value="Verdana">Verdana</option>
                <option value="Geneva">Geneva</option>
                <option value="Webdings">Webdings</option>
                <option value="Wingdings">Wingdings</option>
                <option value="Zapf Dingbats">Zapf Dingbats</option>
            </select><br>

            <label>Elegi el tama&ntilde;o:</label>
            <select class="form-control" id="size">
                <?php for($i=7; $i<77; $i+=2){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
            </select><br>

            <label>Elegi la posicion del texto:</label>
            <select class="form-control" id="posicion">
                <option value="left">Izquierda</option>
                <option value="center">Centrada</option>
                <option value="right">Derecha</option>
            </select><br>

            <label>Alineacion horizonal de la frase:</label>
            <input type="range" class="cr-slider" id="alineacionX" name="alineacionX" min="0" value="0">
            <br>

            <label>Alineacion vertical de la frase:</label>
            <input type="range" class="cr-slider" id="alineacionY" name="alineacionY" min="0" value="0">
            <br>

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

                <!--URL de la imagen del diseño -->
                <input type="hidden" name="grilla[imgDesign]" id="imgDesign" value="">
                <button type="submit" id="continuar" style="margin: 1% 0%;" class="continuar btn btn-primary btn-block"><strong>Continuar</strong></button>
            </form>
        </div>
    </div>

</div>

