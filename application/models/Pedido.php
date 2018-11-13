<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Pedido
{
    public function listar()
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT order_item_id, order_item_name, order_item_type, IMG.order_id, url_cropped_img
                    FROM wp_woocommerce_order_items ORD, wp_woocommerce_order_img_cropped IMG
                    WHERE ORD.order_id = IMG.order_id";

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


    public function buscar($idProducto)
    {
        $db=new database();
        $db->conectar();

        $consulta=" SELECT *  
                    FROM wp_postmeta                     
                    WHERE post_id = '$idProducto' 
                    AND meta_key = '_thumbnail_id'";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los Productos.");

        $productoEncontrado = array(array("id", "id_imagen", "url_imagen"));

        $producto = mysqli_fetch_assoc($resultado);

        $productoEncontrado[0]["id"] = $producto["post_id"];
        $productoEncontrado[0]["id_imagen"] = $producto["meta_value"];
        $productoEncontrado[0]["url_imagen"] = $this->buscarImagen($productoEncontrado);

        return $productoEncontrado;
    }


    public function buscarImagen($productoEncontrado)
    {
        $id_imagen = $productoEncontrado[0]["id_imagen"];
        $db=new database();
        $db->conectar();

        $consulta=" SELECT * 
                    FROM wp_postmeta 
                    WHERE post_id = '$id_imagen'
                    AND meta_key = '_wp_attached_file'";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pudo encontrar la imagen del producto.");

        $imagen = mysqli_fetch_assoc($resultado);
        $imagenEncontrada=$imagen["meta_value"];

        return $imagenEncontrada;
    }


}