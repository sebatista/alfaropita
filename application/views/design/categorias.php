<div class="container">
    <form method="POST" action="categoriaElegida">
        <h3>Elegi una categoria</h3>

        <select class="form-control" name="categoria">
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria["term_id"]; ?>"><?php echo $categoria["name"]; ?></option>
        <?php endforeach; ?>
        </select>

        <br>
        <button type="submit" class="btn btn-primary">Seleccionar</button>
    </form>
</div>