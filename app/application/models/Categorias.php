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
}		
?>