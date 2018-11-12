<div class="container">
    <form method="POST" action="productoElegido">
        <h3>Elegi un producto</h3>

        <select class="form-control" name="idProducto">
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto["id"]; ?>"><?php echo $producto["post_title"]; ?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <button type="submit" class="btn btn-primary">Seleccionar</button>
    </form>
</div>