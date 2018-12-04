
<div class="page-header">
    <div class="container">
        <span class="entry-title">Elegi una categoria</span>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>productoElegido/?id_producto=<?php echo $producto["id"]; ?>&nombre_producto=<?php echo $producto["post_title"]; ?>&id_categoria=<?php echo $productos[0]["id_categoria"]; ?>&id_imagen=<?php echo $producto["id_imagen"]; ?>&url_imagen=<?php echo $producto["url_imagen"]; ?>&sku=<?php echo $producto["sku"]; ?>">
                    <img src="<?php echo base_url().'wp-content/uploads/'.$producto["url_imagen"]; ?>" alt="<?php echo $producto["post_title"]; ?>" width="250" height="250">
                    <h2 class="product-title"> <?php echo $producto["post_title"]; ?> </h2>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

