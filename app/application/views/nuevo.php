
<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading">Elegi la marca</div>
        <div class="panel-body">
            <form name="grilla" method="POST" action="guardar">
                <div class="form-group">
                    <label for="plan"> Marcas </label>
                    <select class="form-control" id="plan" name="linea[idPlan]">
                        <option value=""> </option>
                        <?php
                        foreach ($planes as $plan)
                        {
                        echo '<option value="'.$plan["id"].'"> '.$plan["nombre"].' </option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="text-right">
                    <br>
                    <button type="submit" class="btn btn-primary">Elegir</button>
                </div>

            </form>
        </div>
    </div>
    </div>

    <div class="col-md-2"></div>
</div>

