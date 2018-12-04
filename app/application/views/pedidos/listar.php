<table class="table">
    <thead>
    <tr>
        <th>Numero de orden</th>
        <th>Producto</th>
        <th>Imagen</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($pedidos as $pedido): ?>
            <form method="POST" action="verPedido">
            <tr>
                <td> <input type="hidden" name="order_id" value="<?php echo $pedido["order_id"]; ?>"> <?php echo $pedido["order_id"]; ?> </td>
                <td> <?php echo $pedido["order_item_name"]; ?> </td>
                <td> <img src="<?php echo base_url().$pedido["url_cropped_img"]; ?>" height="200" width="200"> </td>
                <td> <button type="submit" class="btn btn-primary">Ver pedido</button type> </td>
            </tr>
            </form>
        <?php endforeach; ?>
    </tbody>
</table>
