<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "Database.php";

class Categorias
{
    //sin uso
    public function listar_campos()
    {
        $db = new database();
        $db->conectar();
        $nombres_campos = array();

        $consulta = "SHOW columns FROM wp_terms";
        $resultado = mysqli_query($db->conexion, $consulta) or die ("No se pueden mostrar los campos.");

        $i = 0;
        while ($nombre_campo = mysqli_fetch_assoc($resultado))
        {
            $nombres_campos[$i] = $nombre_campo["Field"];
            $i++;
        }

        return $nombres_campos;
    }


    public function listar()
	{
	$db=new database();
	$db->conectar();
	
    $consulta=" SELECT * 
                FROM wp_terms AS terms 
                JOIN wp_term_taxonomy AS termtax ON terms.term_id = termtax.term_id 
                WHERE termtax.taxonomy = \"product_cat\"";

	$resultado=mysqli_query($db->conexion, $consulta) 
	or die ("No se pueden mostrar las Categorias.");

    $categorias = array(array("term_id", "name", "slug", "term_group", "term_taxonomy_id", "term_id", "taxonomy", "description", "parent", "count"));

	$i=0;
	while($categoria = mysqli_fetch_assoc($resultado))
	{
        if($categoria["name"]!="Uncategorized")
        {
            $categorias[$i]["term_id"]=$categoria["term_id"];
            $categorias[$i]["name"]=$categoria["name"];
            $categorias[$i]["slug"]=$categoria["slug"];
            $categorias[$i]["term_group"]=$categoria["term_group"];
            $categorias[$i]["term_taxonomy_id"]=$categoria["term_taxonomy_id"];
            $categorias[$i]["term_id"]=$categoria["term_id"];
            $categorias[$i]["taxonomy"]=$categoria["taxonomy"];
            $categorias[$i]["description"]=$categoria["description"];
            $categorias[$i]["parent"]=$categoria["parent"];
            $categorias[$i]["count"]=$categoria["count"];
            $i++;
        }
	}

	return $categorias;
	}


    public function listarEditables()
    {
        $db=new database();
        $db->conectar();

        $consulta=" SELECT *
                    FROM wp_terms AS terms
                    JOIN wp_term_taxonomy AS termtax ON terms.term_id = termtax.term_id
                    WHERE termtax.taxonomy = \"product_cat\"
                    AND description = \"editable\" ;";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar las Categorias.");

        $categorias = array(array("term_id", "name", "slug", "term_group", "term_taxonomy_id", "term_id", "taxonomy", "description", "parent", "count", "url_imagen"));

        $i=0;
        while($categoria = mysqli_fetch_assoc($resultado))
        {
            if($categoria["name"]!="Uncategorized")
            {
                $categorias[$i]["term_id"]=$categoria["term_id"];
                $categorias[$i]["name"]=$categoria["name"];
                $categorias[$i]["slug"]=$categoria["slug"];
                $categorias[$i]["term_group"]=$categoria["term_group"];
                $categorias[$i]["term_taxonomy_id"]=$categoria["term_taxonomy_id"];
                $categorias[$i]["term_id"]=$categoria["term_id"];
                $categorias[$i]["taxonomy"]=$categoria["taxonomy"];
                $categorias[$i]["description"]=$categoria["description"];
                $categorias[$i]["parent"]=$categoria["parent"];
                $categorias[$i]["count"]=$categoria["count"];
                $categorias[$i]["url_imagen"]=$this->buscarImagen($categoria["term_id"]);
                $i++;
            }
        }

        return $categorias;
    }


    public function buscarImagen($id_categoria)
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                     FROM `wp_termmeta`
                     WHERE term_id = $id_categoria
                     AND meta_key = 'thumbnail_id' ;";

        $resultado = mysqli_query($db->conexion, $consulta)
        or die ("No se pudo cargar las imagenes.");

        $categoria = mysqli_fetch_assoc($resultado);
        $id_imagen = $categoria["meta_value"];//contiene el id de la imagen

        $consulta = "SELECT *
                     FROM wp_postmeta
                     WHERE post_id = '$id_imagen'
                     AND meta_key = '_wp_attached_file'";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pudo encontrar la imagen del producto.");

        $imagen = mysqli_fetch_assoc($resultado);
        $url_imagen = $imagen["meta_value"];//contiene al url de la imagen

        return $url_imagen;
    }


    public function nombreCategoria($productoTerminado)
    {
        $db=new database();
        $db->conectar();

        $consulta=" SELECT *
                    FROM wp_terms
                    WHERE term_id = ".$productoTerminado['id_categoria'].";";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar las Categorias.");

        $categoria = mysqli_fetch_assoc($resultado);
        return $categoria["slug"];
    }


    /*****************************CATEGORIAS DE IMAGENES PRECARGADAS*****************************/
    public function guardarCategoria($categoria)
    {
        $db=new database();
        $db->conectar();

        $consulta = "INSERT INTO img_categorias(nombre) VALUES ('$categoria')";
        $resultado = mysqli_query($db->conexion, $consulta) or die ("No se puede guardar la categoria");
    }


    public function listarCategoriasPredeterminadas()
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT * FROM img_categorias;";
        $resultado = mysqli_query($db->conexion, $consulta) or die ("No se pueden listar las categorias");

        $categoriasPredeterminadas = array(array("id", "nombre"));

        $i=0;
        while($categoria = mysqli_fetch_assoc($resultado))
        {
            $categoriasPredeterminadas[$i]["id"]=$categoria["id"];
            $categoriasPredeterminadas[$i]["nombre"]=$categoria["nombre"];
            $i++;
        }

        return $categoriasPredeterminadas;
    }

}		
?>