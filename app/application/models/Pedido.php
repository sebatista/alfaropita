<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "Database.php";

class Pedido
{
    public function listar()
    {
        $db=new database();
        $db->conectar();

        $consulta ="SELECT *
                    FROM wp_woocommerce_order_items ORD
                    JOIN wp_woocommerce_order_img_cropped IMG ON ORD.order_id = IMG.order_id;";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los pedidos.");

        $pedidos = array(array("order_item_id", "order_item_name", "order_item_type", "order_id", "url_cropped_img"));

        $i=0;
        while($pedido = mysqli_fetch_assoc($resultado))
        {
            $pedidos[$i]["order_item_id"]=$pedido["order_item_id"];
            $pedidos[$i]["order_item_name"]=$pedido["order_item_name"];
            $pedidos[$i]["order_item_type"]=$pedido["order_item_type"];
            $pedidos[$i]["order_id"]=$pedido["order_id"];
            $pedidos[$i]["url_cropped_img"]=$pedido["url_cropped_img"];
            $i++;
        }

        return $pedidos;
    }


    public function guardar($order, $img)
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                     FROM wp_woocommerce_order_img_cropped
                     WHERE order_id = '$order'
                     AND url_cropped_img = '$img';";

        $resultado = mysqli_query($db->conexion, $consulta) or die ("No se puede guardar el pedido.");

        if(mysqli_num_rows($resultado))
        {
            echo "El pedido ya fue procesado";
        }
        else
        {
            $consulta = "INSERT INTO wp_woocommerce_order_img_cropped (order_id, url_cropped_img)
                         VALUES ('$order', '$img')";

            $resultado=mysqli_query($db->conexion, $consulta) or die ("No se puede guardar el pedido.");
        }

    }


    public function buscar($order_id)
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                     FROM wp_woocommerce_order_items ORD
                     JOIN wp_woocommerce_order_itemmeta META ON ORD.order_item_id = META.order_item_id
                     JOIN wp_woocommerce_order_img_cropped IMG ON ORD.order_id = IMG.order_id
                     WHERE ORD.order_id = '$order_id';";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden ver el pedido.");

        $pedido = array(array("order_item_id", "order_item_name", "order_item_type", "order_id", "url_cropped_img"));

        while($p = mysqli_fetch_assoc($resultado))
        {
            $pedido["order_item_id"]=$p["order_item_id"];
            $pedido["order_item_name"]=$p["order_item_name"];
            $pedido["order_item_type"]=$p["order_item_type"];
            $pedido["order_id"]=$p["order_id"];
            $pedido["url_cropped_img"]=$p["url_cropped_img"];
        }
        /*
        $i=0;
        while($pedido = mysqli_fetch_assoc($resultado))
        {
            $pedidos[$i]["order_item_id"]=$pedido["order_item_id"];
            $pedidos[$i]["order_item_name"]=$pedido["order_item_name"];
            $pedidos[$i]["order_item_type"]=$pedido["order_item_type"];
            $pedidos[$i]["order_id"]=$pedido["order_id"];
            $pedidos[$i]["url_cropped_img"]=$pedido["url_cropped_img"];
            $i++;
        }
        */
        return $pedido;
    }
}
