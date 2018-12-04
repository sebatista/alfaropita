
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
                <img src="<?php echo base_url().'wp-content/uploads/'.$categoria["url_imagen"]; ?>" alt="<?php echo $categoria["name"]; ?>" width="250" height="250">
                <h2 class="product-title"> <?php echo $categoria["name"]; ?> </h2>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>



