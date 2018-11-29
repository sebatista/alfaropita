
<div class="page-header">
    <div class="container">
        <span class="entry-title">Elegi una categoria</span>
    </div>
</div>

<div class="container">
    <div class="row">
    <?php foreach ($categorias as $categoria): ?>
        <div class="col-md-3">
            <a href="categoriaElegida/?categoria=<?php echo $categoria["term_id"]; ?>">
                <img src="http://localhost/alfaropita/wp-content/plugins/woocommerce/assets/images/placeholder.png" alt="<?php echo $categoria["name"]; ?>" width="250" height="250">
                <h2 class="product-title"> <?php echo $categoria["name"]; ?> </h2>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>



<!--div class="container">
    <form method="POST" action="categoriaElegida">
        <h3 class="subtitulos">Elegi una categoria</h3>

        <select class="form-control" name="categoria">
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria["term_id"]; ?>"><?php echo $categoria["name"]; ?></option>
        <?php endforeach; ?>
        </select>

        <br>
        <button type="submit" class="btn button">Seleccionar</button>
    </form>
</div-->
