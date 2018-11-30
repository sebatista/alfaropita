<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "Database.php";

class Productos
{
    public function buscarTodos($categoria)
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

        $productos = array(array("id", "post_title", "id_categoria", "nombre_categoria"));

        $i=0;
        while($producto = mysqli_fetch_assoc($resultado))
        {
            $productos[$i]["id"]=$producto["id"];
            $productos[$i]["post_title"]=$producto["post_title"];
            $productos[$i]["id_categoria"]=$categoria;
            $i++;
        }

        return $productos;
    }


    public function buscarEditables($categoria)
    {
        $db=new database();
        $db->conectar();

        $consulta=" SELECT id, post_title
                    FROM wp_posts POS
                    JOIN wp_term_relationships REL ON POS.ID = REL.object_id
                    JOIN wp_term_taxonomy TAX ON REL.term_taxonomy_id = TAX.term_taxonomy_id
                    JOIN wp_terms TER ON TAX.term_id = TER.term_id
                    WHERE TER.term_id = '$categoria'
                    AND POS.post_excerpt LIKE '%editable%'";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los Productos.");

        $productos = array(array("id", "post_title", "id_categoria", "nombre_categoria","sku", "url_imagen"));

        $i=0;
        while($producto = mysqli_fetch_assoc($resultado))
        {
            $productos[$i]["id"] = $producto["id"];
            $productos[$i]["post_title"] = $producto["post_title"];
            $productos[$i]["id_categoria"] = $categoria;

            $productoEncontrado = $this->buscar($producto["id"]);

            $productos[$i]["sku"] = $productoEncontrado["sku"];
            $productos[$i]["id_imagen"] = $productoEncontrado["id_imagen"];
            $productos[$i]["url_imagen"] = $productoEncontrado["url_imagen"];
            $i++;
        }

        return $productos;
    }


    //Busca el metakey y el meta value asociado a la imagen
    public function buscar($id_producto)
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                     FROM wp_postmeta
                     WHERE post_id = '$id_producto';";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los Productos.");

        //$wp_postmeta = array(array("meta_key", "meta_value"));
        $wp_postmeta = array("meta_key", "meta_value");


        while($prod = mysqli_fetch_assoc($resultado))
        {
            $wp_postmeta["meta_key"]=$prod["meta_key"];
            $wp_postmeta["meta_value"]=$prod["meta_value"];

            if($prod["meta_key"]=="_sku"){
                $productoEncontrado["sku"] = $prod["meta_value"];
            }
            if($prod["meta_key"]=="_thumbnail_id"){
                $productoEncontrado["id_imagen"] = $prod["meta_value"];
                $id_imagen = $prod["meta_value"];
            }

        }

        //$productoEncontrado["id_producto"] = $id_producto;
        //$productosEncontrados[$j]["id_categoria"] = $id_categoria;
        $productoEncontrado["url_imagen"] = $this->buscarImagen($id_imagen);

        return $productoEncontrado;
    }


    //Busca la url de la imagen por medio de su id.
    public function buscarImagen($id_imagen)
    {
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