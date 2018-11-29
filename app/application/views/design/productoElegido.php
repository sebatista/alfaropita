<div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-12">
            <input type="file" id="upphoto" style="display:none;" />
            <label for="upphoto">
                <div class="inputLabel" data-toggle="modal" data-target="#myModal">
                    Subi tu foto
                </div>
            </label>
            <form method="POST" action="guardarEstampado" name="grilla">
                <?php foreach ($productoEncontrado as $producto): ?>
                    <input type="hidden" name="grilla[idProducto]" value="<?php echo $producto["id_producto"]; ?>">
                    <input type="hidden" name="grilla[nombre_producto]" value="<?php echo $producto["nombre_producto"]; ?>">
                    <input type="hidden" name="grilla[sku]" value="<?php echo $producto["sku"]; ?>">
                    <input type="hidden" name="grilla[idImagen]" value="<?php echo $producto["id_imagen"]; ?>">
                    <input type="hidden" name="grilla[urlImagen]" value="<?php echo base_url(); ?>wp-content/uploads/<?php echo $producto["url_imagen"]; ?>">
                    <input type="hidden" name="grilla[id_categoria]" value="<?php echo $producto["id_categoria"]; ?>">
                    <input type="hidden" name="grilla[nombre_categoria]" value="">
                    <input type="hidden" name="grilla[imagenRecortada]" id="imagenRecortada" value="">
                <?php endforeach; ?>
                <button type="submit" class="inputLabel"><strong>Continuar</strong></button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php foreach ($productoEncontrado as $producto): ?>
                <!--div style="background-image: url(<?php echo base_url(); ?>wp-content/uploads/<?php echo $producto["url_imagen"]; ?>); height: 800px; width: 1000px;"-->
                <img class="back-img" src="<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>" >
                <img class="front-img" id="croppedImg">
            <?php endforeach; ?>
            </form>
        </div>
    </div>


    <!-- Modal -->
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