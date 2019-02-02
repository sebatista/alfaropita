
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <label for="upload" class="btn btn-primary btn-block" style="margin: 1% 0%;">
                Subi tu foto
            </label>
            <input id="upload" type="file" value="Choose a file" accept="image/*" style="margin: 1% 0%;"/>

            <!--input type="file" id="upload" value="Choose a file" accept="image/*" class="btn btn-primary btn-block"/-->
            <button id="recortar" class="upload-result btn btn-primary btn-block">Recortar</button>

            <!--Controles para el movimiento de la imagen personalizada-->
            <label>Alineacion horizonal de tu imagen:</label>
            <input type="range" class="cr-slider" id="alineacionX-img-custom" name="alineacionX-img-custom">
            <label>Alineacion vertical de tu imagen:</label>
            <input type="range" class="cr-slider" id="alineacionY-img-custom" name="alineacionY-img-custom">


            <h3>Categorias</h3>
            <div id="imagenesPrecargadas" class="img-precargadas"></div>

            <!--Controles para el movimiento de la imagen predeterminada-->
            <label>Alineacion horizonal de la imagen:</label>
            <input type="range" class="cr-slider" id="alineacionX-img" name="alineacionX-img">
            <label>Alineacion vertical de la imagen:</label>
            <input type="range" class="cr-slider" id="alineacionY-img" name="alineacionY-img">
        </div>

        <!--div style="background-image: url(<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>); height: 800px; width: 1000px;"-->
        <div id="img-producto-marco" class="col-md-4 marco">
            <img id="img-producto" class="back-img" src="<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>">

            <!--Imagen personalizada-->
            <img id="image-preview" class="custom-img">

            <!--Imagen predeterminada-->
            <img id="croppedImg" class="front-img">

            <!--Frase personalizada-->
            <div id="widget" class="escribir frase-img"> </div>

            <!--En este div se cargan los elementos del plugin-->
            <div id="upload-demo">
            </div>

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
                <button type="submit" id="continuar" style="margin: 1% 0%;" class="continuar btn btn-primary btn-block"><strong>Continuar</strong></button>
            </form>
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
            <input type="range" class="cr-slider" id="alineacionX" name="alineacionX" min="0" value="0">
            <br>

            <label>Alineacion vertical de la frase:</label>
            <input type="range" class="cr-slider" id="alineacionY" name="alineacionY" min="0" value="0">
            <br>

            <button id="btnSave" class="btn btn-primary btn-block"> Guardar frase </button>
        </div>
    </div>

</div>



<script>

</script>
