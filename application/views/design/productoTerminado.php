<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div style="background-image: url(<?php echo $productoTerminado["urlImagen"]; ?>); height: 800px; width: 1000px;">
                <input type="hidden" name="grilla[idProducto]" value="<?php echo $productoTerminado["idProducto"]; ?>">
                <input type="hidden" name="grilla[idImagen]" value="<?php echo $productoTerminado["idImagen"]; ?>">
                <div style="padding: 300px 0;">
                    <img id="imagenRecortada" style="display: block; margin: auto;" src="<?php echo $productoTerminado["imagenRecortada"]; ?>">
                </div>
            </div>
        </div>
        <a href="/product-category/<?php echo $productoTerminado["nombre_categoria"]; ?>/?add-to-cart=<?php echo $productoTerminado["idProducto"]; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $productoTerminado["idProducto"]; ?>" data-product_sku="<?php echo $productoTerminado["sku"]; ?>" aria-label="Add “<?php echo $productoTerminado["nombre_producto"]; ?>” to your cart" rel="nofollow">Add to cart</a>
    </div>
</div>