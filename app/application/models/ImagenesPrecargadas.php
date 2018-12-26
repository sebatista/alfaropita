<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "Database.php";

class ImagenesPrecargadas
{
    public function listar()
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

}
?>