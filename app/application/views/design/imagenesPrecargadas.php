
    <?php foreach($imagenes as $imagen): ?>
        <img onclick="elegirImagen('<?php echo base_url().'wp-content/'.$imagen["nombre"]; ?>','<?php echo $imagen["id"]; ?>')" class="centrar-img" src="<?php echo base_url().'wp-content/'.$imagen["nombre"]; ?>" height="200" width="200">
    <?php endforeach; ?>

