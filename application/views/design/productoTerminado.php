<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div style="background-image: url(<?php echo $productoTerminado["urlImagen"]; ?>); height: 800px; width: 1000px;">
                <input type="hidden" name="grilla[idProducto]" value="<?php echo $productoTerminado["idProducto"]; ?>">
                <input type="hidden" name="grilla[idImagen]" value="<?php echo $productoTerminado["idImagen"]; ?>">
                <div style="padding: 300px 0;">
                    <img id="imagenRecortada" style="display: block; margin: auto;" src="<?php echo $productoTerminado["imagenRecortada"]; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button onclick="imprimir()">Bajar</button>
        </div>
    </div>
</div>