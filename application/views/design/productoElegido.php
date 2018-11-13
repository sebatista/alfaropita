<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <input type="file" id="upphoto" style="display:none;" />
            <label for="upphoto">
                <div class="inputLabel">
                    click here to upload an image
                </div>
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="guardarEstampado" name="grilla">
            <?php foreach ($productoEncontrado as $producto): ?>
                <div style="background-image: url(<?php echo base_url(); ?>wp-content/uploads/<?php echo $producto["url_imagen"]; ?>); height: 800px; width: 1000px;">
                    <input type="hidden" name="grilla[idProducto]" value="<?php echo $producto["id_producto"]; ?>">
                    <input type="hidden" name="grilla[nombre_producto]" value="<?php echo $producto["nombre_producto"]; ?>">
                    <input type="hidden" name="grilla[sku]" value="<?php echo $producto["sku"]; ?>">
                    <input type="hidden" name="grilla[idImagen]" value="<?php echo $producto["id_imagen"]; ?>">
                    <input type="hidden" name="grilla[urlImagen]" value="<?php echo base_url(); ?>wp-content/uploads/<?php echo $producto["url_imagen"]; ?>">
                    <input type="hidden" name="grilla[id_categoria]" value="<?php echo $producto["id_categoria"]; ?>">
                    <input type="hidden" name="grilla[nombre_categoria]" value="">
                    <input type="hidden" name="grilla[imagenRecortada]" id="imagenRecortada" value="">

                    <div style="padding: 300px 0;">
                        <img id="croppedImg" style="display: block; margin: auto;">
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        </div>

        <div class="cropHolder col-md-12">
            <div id="cropWrapper">
                <img id="inputImage" src="<?php echo base_url(); ?>scripts/crop/images/face.jpg">
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
                <button id="cropSubmit">submit</button>
                <button id="closeCrop">Close</button>
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