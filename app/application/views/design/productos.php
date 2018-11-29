
<div class="page-header">
    <div class="container">
        <span class="entry-title">Elegi una categoria</span>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>productoElegido/?id_producto=<?php echo $producto["id"]; ?>&nombre=<?php echo $producto["post_title"]; ?>&id_categoria=<?php echo $productos[0]["id_categoria"]; ?>">
                    <img src="http://localhost/alfaropita/wp-content/plugins/woocommerce/assets/images/placeholder.png" alt="<?php echo $producto["post_title"]; ?>" width="250" height="250">
                    <h2 class="product-title"> <?php echo $producto["post_title"]; ?> </h2>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<!--div class="container">
    <form method="POST" action="productoElegido" name="grilla">
        <h3 class="subtitulos">Elegi un producto</h3>
        <input type="hidden" name="grilla[id_categoria]" value="<?php echo $productos[0]["id_categoria"]; ?>">
        <select class="form-control" name="grilla[id_producto]">
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto["id"].",".$producto["post_title"]; ?>"><?php echo $producto["post_title"]; ?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <button type="submit" class="btn button">Seleccionar</button>
    </form>
</div-->