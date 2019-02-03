<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "Database.php";

class ImagenesPrecargadas
{
    public function listarImagenes()
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                    FROM img_precargadas;";

        $resultado = mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar las imagenes.");

        $imagenes = array(array("id", "nombre"));

        $i=0;
        while($imagen = mysqli_fetch_assoc($resultado))
        {
            $imagenes[$i]["id"]=$imagen["id"];
            $imagenes[$i]["nombre"]=$imagen["nombre"];
            $i++;
        }

        return $imagenes;
    }


    public function listarCategorias()
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                    FROM img_categorias;";

        $resultado = mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar las categorias.");

        $imagenes = array(array("id", "nombre"));

        $i=0;
        while($imagen = mysqli_fetch_assoc($resultado))
        {
            $imagenes[$i]["id"]=$imagen["id"];
            $imagenes[$i]["nombre"]=$imagen["nombre"];
            $i++;
        }

        return $imagenes;
    }


    public function listarRelCatImg()
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT REL.id rel_id, CAT.id cat_id, CAT.nombre cat_nombre, IMG.id img_id, IMG.nombre img_nombre
                    FROM rel_cat_img REL
                    JOIN img_categorias CAT ON REL.id_categoria = CAT.id
                    JOIN img_precargadas IMG ON REL.id_imagen = IMG.id";

        $resultado = mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar las categorias.");

        $cat_img = array(array("rel_id, cat_id, cat_nombre, img_id, img_nombre"));

        $i=0;
        while($imagen = mysqli_fetch_assoc($resultado))
        {
            $cat_img[$i]["rel_id"]=$imagen["rel_id"];
            $cat_img[$i]["cat_id"]=$imagen["cat_id"];
            $cat_img[$i]["cat_nombre"]=$imagen["cat_nombre"];
            $cat_img[$i]["img_id"]=$imagen["img_id"];
            $cat_img[$i]["img_nombre"]=$imagen["img_nombre"];
            $i++;
        }

        return $cat_img;
    }
}
?>