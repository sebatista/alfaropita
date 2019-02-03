<?php $i=1; ?>

<div class="panel-default">
    <?php foreach($categorias as $categoria): ?>
        <div class="titulo-categoria">
            <h4 class="panel-title text-center">
                <a data-toggle="collapse" href="#collapse<?php echo $i; ?>"><?php echo ucfirst($categoria["nombre"]); ?></a>
            </h4>
        </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
        <div class="panel-body">
            <div id="images<?php echo $i; ?>" class="carousel slide" data-ride="carousel">
                <?php $indicatorActive=1; ?>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <?php foreach($cat_img as $imagen): ?>
                    <?php if($categoria["id"]==$imagen["cat_id"]): ?>
                        <?php if($indicatorActive==1): ?>
                            <li data-target="#images<?php echo $i; ?>" data-slide-to="<?php echo $i; ?>" class="active"></li>
                            <?php $indicatorActive=0; ?>
                        <?php else: ?>
                            <li data-target="#images<?php echo $i; ?>" data-slide-to="<?php echo $i; ?>"></li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ol>

                <?php $isActive=1; ?>
                <div class="carousel-inner">
                    <?php foreach($cat_img as $imagen): ?>
                        <?php if($categoria["id"]==$imagen["cat_id"]): ?>
                            <!-- Wrapper for slides -->
                            <?php if($isActive==1): ?>
                                <div class="item active">
                                    <img onclick="elegirImagen('<?php echo base_url().'wp-content/'.$imagen["img_nombre"]; ?>','<?php echo $imagen["img_id"]; ?>')" class="centrar-img" src="<?php echo base_url().'wp-content/'.$imagen["img_nombre"]; ?>" height="200" width="200">
                                </div>
                                <?php $isActive=0; ?>
                            <?php else: ?>
                                <div class="item">
                                    <img onclick="elegirImagen('<?php echo base_url().'wp-content/'.$imagen["img_nombre"]; ?>','<?php echo $imagen["img_id"]; ?>')" class="centrar-img" src="<?php echo base_url().'wp-content/'.$imagen["img_nombre"]; ?>" height="200" width="200">
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#images<?php echo $i; ?>" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#images<?php echo $i; ?>" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>


