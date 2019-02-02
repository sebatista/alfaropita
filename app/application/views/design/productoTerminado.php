
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="/product-category/<?php echo $productoTerminado["nombre_categoria"]; ?>/?add-to-cart=<?php echo $productoTerminado["idProducto"]; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $productoTerminado["idProducto"]; ?>" data-product_sku="<?php echo $productoTerminado["sku"]; ?>" aria-label="Add “<?php echo $productoTerminado["nombre_producto"]; ?>” to your cart" rel="nofollow">
                A&ntilde;adir al carrito
            </a>
        </div>

        <!--div style="background-image: url(<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>); height: 800px; width: 1000px;"-->
        <div id="imgDesign" class="col-md-6 marco">
            <!--div style="background-image: url(<?php echo $productoTerminado["urlImagen"]; ?>); height: 800px; width: 1000px;"-->
            <!--input type="hidden" name="grilla[idProducto]" value="<?php echo $productoTerminado["idProducto"]; ?>">
                <input type="hidden" name="grilla[idImagen]" value="<?php echo $productoTerminado["idImagen"]; ?>">
                <img class="back-img" style="border: 2px solid rgb(177, 216, 149);" src="<?php echo $productoTerminado["urlImagen"]; ?>" height="700" width="700">
                <img class="front-img" style="display: block; margin: auto;" id="imagenRecortada" src="<?php echo $productoTerminado["imagenRecortada"]; ?>">
                <img class="front-img" style="display: block; margin: auto;" id="urlImagenPrecargada" src="<?php echo $productoTerminado["urlImagenPrecargada"]; ?>">
                <img class="frase" style="display: block; margin: auto;" src="<?php if(isset($productoTerminado["imagenFrase"])){echo $productoTerminado["imagenFrase"];} ?>">
            </div-->
            <input type="hidden" name="grilla[idProducto]" value="<?php echo $productoTerminado["idProducto"]; ?>">
            <input type="hidden" name="grilla[idImagen]" value="<?php echo $productoTerminado["idImagen"]; ?>">
            <img class="back-img" src="<?php echo $productoTerminado["imgDesign"]; ?>">
        </div>

        <div class="col-md-3">
            <button onclick="printDesign()" class="btn btn-primary btn-block">Bajar</button>
        </div>
    </div>
</div>



