<div class="container">
    <form method="POST" action="productoElegido" name="grilla">
        <h3>Elegi un producto</h3>
        <input type="hidden" name="grilla[id_categoria]" value="<?php echo $productos[0]["id_categoria"]; ?>">
        <select class="form-control" name="grilla[id_producto]">
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto["id"].",".$producto["post_title"]; ?>"><?php echo $producto["post_title"]; ?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <button type="submit" class="btn btn-primary">Seleccionar</button>
    </form>
</div>