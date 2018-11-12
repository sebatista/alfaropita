<?php

foreach($categorias as $categoria)
{
    echo'    
	<tr>	
        <td>'.$categoria["term_id"].'</td>
        <td>'.$categoria["name"].'</td>
        <td>'.$categoria["slug"].'</td>
        <td>'.$categoria["term_group"].'</td>
        <td>'.$categoria["term_taxonomy_id"].'</td>
        <td>'.$categoria["term_id"].'</td>
        <td>'.$categoria["taxonomy"].'</td>
        <td>'.$categoria["description"].'</td>
        <td>'.$categoria["parent"].'</td>
        <td>'.$categoria["count"].'</td>
    </tr>  		
    ';
}

?>