<table class="table">
    <thead>
    <tr>
        <th>Numero de orden</th>
        <th>Producto</th>
        <th>Imagen</th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td> <input type="hidden" name="order_id" value="<?php echo $pedido["order_id"]; ?>"> <?php echo $pedido["order_id"]; ?> </td>
            <td> <?php echo $pedido["order_item_name"]; ?> </td>
            <td> <img src="<?php echo base_url().$pedido["url_cropped_img"]; ?>" </td>
            <td> <button onclick="imprimir()">Bajar</button></td>
        </tr>

    </tbody>
</table>
