<?php

foreach($pedidos as $pedido)
{
    echo'    
	<tr>
        <td>'.$pedido["order_item_id"].'</td>
        <td>'.$pedido["order_item_name"].'</td>
        <td>'.$pedido["order_item_type"].'</td>
        <td>'.$pedido["order_id"].'</td>
        <td>'.$pedido["url_cropped_img"].'</td>
        <td><button onclick="imprimir()">Bajar</button></td>
    </tr>  		
    ';
}

?>