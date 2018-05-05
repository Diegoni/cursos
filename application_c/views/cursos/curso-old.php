<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>44</h3>
                    <p>Alumnos inscriptos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-mortar-board"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>2</h3>
                    <p>Alumnos Nuevos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>8</h3>
                    <p>Cantidad Horas Sem.</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-clock-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-9 col-xs-9">
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title"><!-- Title --></h3>
                    <div class="box-tools pull-right">
                        <!--<span class="badge bg-green">3</span>-->
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- box-body -->
                <div class="box-body">
                    <img class="profile-user-img img-responsive img-circle" src="/sis/assets/uploads/img/aula.png" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php echo $nombre; ?></h3>
                    <p class="text-muted text-center"><?php echo lang('identificacion_curso').": ". $id; ?></p>
                    <ul class="list-group list-group-unbordered" style="margin-bottom: 0;">
                        <li class="list-group-item">
                            <?php echo lang('abreviatura'); ?> <a class="pull-right"><?php echo $abreviatura; ?></a>
                        </li>
                        <li class="list-group-item">
                            <?php echo lang('comienza'); ?> <a class="pull-right"><?php echo $comienza; ?></a>
                        </li>
                        <li class="list-group-item">
                            <?php echo lang('finaliza'); ?> <a class="pull-right"><?php echo $finaliza; ?></a>
                        </li>
                        <!--
                        <li class="list-group-item">
                            Clase (Tipo) <a class="pull-right"></a>
                        </li>
                        -->
                        <li class="list-group-item">
                            <?php echo lang('tipogral'); ?> <a class="pull-right"><?php echo $tipogral; ?></a>
                        </li>
                        <li class="list-group-item">
                            <?php echo lang('modalidad'); ?> <a class="pull-right"><?php echo $modalidad; ?></a>
                        </li>
                        <!--
                        <li class="list-group-item">
                            Aula Canvas (acredita) <a class="pull-right"></a>
                        </li>
                        <li class="list-group-item">
                            Curso Canvas (cerrado) <a class="pull-right"></a>
                        </li>
                        -->
                    </ul>
                </div>
                <!-- box-footer -->
                <div class="box-footer" style="border-top-width: 0;">
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-edit-curso">
                        Editar
                    </button>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-xs-3">
            <div class="box box-default">
                <!-- box-body -->
                <div class="box-body">
                    <blockquote class="pull-right">
                        <small>Vamos a llenar este panel con acciones</small>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<div class="modal fade" id="modal-edit-curso" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Editar Curso</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputNombre" class="col-sm-3 control-label"><?php echo lang('nombre'); ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputNombre" name="curso_nombre" placeholder="<?php echo lang('nombre'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAbreviatura" class="col-sm-3 control-label"><?php echo lang('abreviatura'); ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAbreviatura" name="curso_abreviatura" placeholder="<?php echo lang('abreviatura'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputComienza" class="col-sm-3 control-label"><?php echo lang('comienza'); ?></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="inputComienza" name="curso_comienza" placeholder="<?php echo lang('comienza'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFinaliza" class="col-sm-3 control-label"><?php echo lang('finaliza'); ?></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="inputFinaliza" name="curso_finaliza" placeholder="<?php echo lang('finaliza'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTipogral" class="col-sm-3 control-label"><?php echo lang('tipogral'); ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputTipogral" name="curso_tipogral" placeholder="<?php echo lang('tipogral'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputModalidad" class="col-sm-3 control-label"><?php echo lang('modalidad'); ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputModalidad" name="curso_modalidad" placeholder="<?php echo lang('modalidad'); ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
