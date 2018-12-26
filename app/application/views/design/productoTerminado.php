
<div class="container">
    <div class="inputLabel">
        <a href="/product-category/<?php echo $productoTerminado["nombre_categoria"]; ?>/?add-to-cart=<?php echo $productoTerminado["idProducto"]; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $productoTerminado["idProducto"]; ?>" data-product_sku="<?php echo $productoTerminado["sku"]; ?>" aria-label="Add “<?php echo $productoTerminado["nombre_producto"]; ?>” to your cart" rel="nofollow">
            A&ntilde;adir al carrito
        </a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!--div style="background-image: url(<?php echo $productoTerminado["urlImagen"]; ?>); height: 800px; width: 1000px;"-->
                <input type="hidden" name="grilla[idProducto]" value="<?php echo $productoTerminado["idProducto"]; ?>">
                <input type="hidden" name="grilla[idImagen]" value="<?php echo $productoTerminado["idImagen"]; ?>">
                <img class="back-img" style="border: 2px solid rgb(177, 216, 149);" src="<?php echo $productoTerminado["urlImagen"]; ?>" height="700" width="700">
                <img class="front-img" style="display: block; margin: auto;" id="imagenRecortada" src="<?php echo $productoTerminado["imagenRecortada"]; ?>">
                <img class="front-img" style="display: block; margin: auto;" id="urlImagenPrecargada" src="<?php echo $productoTerminado["urlImagenPrecargada"]; ?>">
                <img class="frase" style="display: block; margin: auto;" src="<?php if(isset($productoTerminado["imagenFrase"])){echo $productoTerminado["imagenFrase"];} ?>">
            </div>
        </div>
    </div>
</div>

