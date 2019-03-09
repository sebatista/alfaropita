

<div class="container">
    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Precargadas/guardarImagen">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Categoria</label>
            <select name="categoria" class="form-control" required>
                <?php foreach($categorias as $categoria): ?>
                    <option value="<?php echo $categoria["id"]; ?>"> <?php echo $categoria["nombre"]; ?> </option>
                <?php endforeach; ?>
            </select>

            <label for="file"> Seleccione la imagen </label>
            <input type="file" name="file" style="display: block">

            <input type="submit" style="margin: 1% 0%;" class="continuar btn btn-primary btn-block" value="Guardar">
        </div>
    </form>
</div>
