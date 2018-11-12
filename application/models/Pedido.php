<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Pedido
{
    public function listar()
    {
        $db=new database();
        $db->conectar();

        $consulta=" SELECT id, post_title
                    FROM wp_posts POS
                    JOIN wp_term_relationships REL ON POS.ID = REL.object_id
                    JOIN wp_term_taxonomy TAX ON REL.term_taxonomy_id = TAX.term_taxonomy_id
                    JOIN wp_terms TER ON TAX.term_id = TER.term_id
                    WHERE TER.term_id = '$categoria'";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los Productos.");

        $productos = array(array("id", "post_title"));

        $i=0;
        while($producto = mysqli_fetch_assoc($resultado))
        {
            $productos[$i]["id"]=$producto["id"];
            $productos[$i]["post_title"]=$producto["post_title"];
            $i++;
        }

        return $productos;
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