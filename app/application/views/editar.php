
<div class="container-fluid">
    <table class="table">
        <thead>
        <tr>
            <th>Usuario</th>
            <th>Linea</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Plan</th>
            <th>Datos</th>
            <th>Observaciones</th>
        </tr>
        </thead>

<?php

echo '<form name="grilla" method="POST" action="actualizar"';

foreach ($lineas as $linea)
{
    if($linea["estado"]==1)
    {
        $estado='<option value="1"> Activo </option>';
    }
    else
        {
            $estado='<option value="0"> Inactivo </option>';
        }

echo
'	
<tr>
    <td>
        '.$linea["nombre"].' '.$linea["apellido"].'
    </td>	  
	<td>
		<input type="hidden" class="form-control" id="" name="grilla['.$linea["id"].'][id]"     value="'.$linea["id"].'"></input>
		<input type="text"   class="form-control" id="" name="grilla['.$linea["id"].'][numero]" value="'.$linea["numero"].'" onchange="campoModificado('.$linea["id"].')"></input>
	</td>
	
	<td>	    
	    <select class="form-control" id="" name="grilla['.$linea["id"].'][estado]" onchange="campoModificado('.$linea["id"].')">
	        '.$estado.'
	        <option value="1"> Activo </option>
	        <option value="0"> Inactivo </option>
        </select>
	</td>
		
	<td><input type="date"   class="form-control" id="" name="grilla['.$linea["id"].'][estadoFecha]" value="'.$linea["estadoFecha"].'" onchange="campoModificado('.$linea["id"].')"></input></td>		
	
	<td>
	    <select class="form-control" id="" name="grilla['.$linea["id"].'][idPlan]" onchange="campoModificado('.$linea["id"].')">
	        <option value="'.$linea["idPlan"].'"> '.$linea["nombrePlan"].' </option>
';
            foreach ($planes as $plan)
            {
            echo '<option value="'.$plan["id"].'">'.$plan["nombre"].'</option>';
            }
echo
'
        </select>	
	</td>
	
	<td>
	    <select class="form-control" id="" name="grilla['.$linea["id"].'][idDatos]" onchange="campoModificado('.$linea["id"].')">
	        <option value="'.$linea["idDatos"].'"> '.$linea["gb"].' GB</option>
';
            foreach ($datos as $dato)
            {
            echo '<option value="'.$dato["id"].'">'.$dato["gb"].' GB</option>';
            }
echo
'
        </select>	
	</td>
	
	<td>
	    <p>'.$linea["observaciones"].'</p>
	    <input type="text"   class="form-control" id="" name="grilla['.$linea["id"].'][observaciones]" onchange="campoModificado('.$linea["id"].')"></input>
	</td>
	
	<td><input type="hidden" class="form-control" id="" name="grilla['.$linea["id"].'][idPlanDatos]" value="'.$linea["idPlanDatos"].'"></input></td>
	<td><input type="hidden" class="form-control" id="'.$linea["id"].'-modificado" name="grilla['.$linea["id"].'][modificado]" value="0"></input></td>
</tr>
';
}

echo '<button type="submit" class="btn btn-primary">Guardar</button>';
echo '</form>';

?>