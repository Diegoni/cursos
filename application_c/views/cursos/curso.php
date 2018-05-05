<!--<div class="content-wrapper">

    <section class="content-header">
        <h1>
        <?php echo $nombre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-university"></i> Sedes</a></li>
            <li class="active"><a href=""><i class="fa fa-university"></i> Sede</a></li>
        </ol>
    </section>
    
    <section class="content container-fluid">
        <div class="row">
-->

<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3><?php echo count($alumnos); ?></h3>
                    <p>Alumnos inscriptos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-mortar-board"></i>
                </div>
                <a href="#tabla_alumnos" class="small-box-footer">
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
        <!--/. Panel con la Información de curso ./ -->
        <div class="col-lg-9 col-xs-9">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-gray">
                    <div class="widget-user-icon" style="font-size: 65px; color: rgba(0,0,0,0.15);">
                        <i class="fa fa-book" style="height: auto; float: left;"></i>
                    </div>
                    <h3 class="widget-user-username"><?php echo $nombre; ?></h3>
                    <h5 class="widget-user-desc"><?php echo lang('identificacion_curso').": ". $id; ?></h5>
                </div>
                <!-- box-body -->
                <div class="box-body no-padding">
                    <ul class="nav nav-stacked">
                        <li><a><?php echo lang('abreviatura'); ?><span class="pull-right"><?php echo $abreviatura; ?></span></a></li>
                        <li><a><?php echo lang('comienza'); ?><span class="pull-right"><?php echo $comienza; ?></span></a></li>
                        <li><a><?php echo lang('finaliza'); ?><span class="pull-right"><?php echo $finaliza; ?></span></a></li>
                        <li><a><?php echo lang('horas'); ?><span class="pull-right"><?php echo $horas; ?></span></a></li>
                        <li><a><?php echo lang('clase'); ?><span class="pull-right"><?php echo getClaseNombre($clase); ?></span></a></li>
                        <li><a><?php echo lang('tipogral'); ?><span class="pull-right"><?php echo getTipoGralNombre($tipogral); ?></span></a></li>
                        <li><a><?php echo lang('modalidad'); ?><span class="pull-right"><?php echo getModalidadNombre($categorias, $modalidad); ?></span></a></li>
                        <li><a><?php echo lang('tutor'); ?><span class="pull-right"><?php foreach($tutores as $tutor) { if($tutor->id == $codtutor) echo $tutor->nombre; } ?></span></a></li>
                        <li><a><?php echo lang('semanas_teoricas'); ?><span class="pull-right"><?php echo $semanasteoricas; ?></span></a></li>
                        <li><a><?php echo lang('cursocanvas'); ?><span class="pull-right"><input class="minimal" type="checkbox" <?php echo $cursocanvas == 1 ? 'checked' : ''; ?> readonly disabled></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/. Panel con más acciones del curso ./ -->
        <div class="col-lg-3 col-xs-3">
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Acciones</h3>
                </div>
                <!-- box-body -->
                <div class="box-body actions-buttons">
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-curso">Editar <span class="glyphicon glyphicon-pencil"></span></button></p>
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#">Modificar Estado Inscr Alumnos </button></p>
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#">Inscribir Alumnos <span class="glyphicon glyphicon-education"></span></button></p>
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#">Modificar Fecha/Sem Teoricas <span class="glyphicon glyphicon-calendar"></span></button></p>
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#">Cronogramas</span></button></p>
                    <p><a class="btn btn-default <?php echo (empty($curso_canvas)) ? 'disabled' : ''; ?>" href="<?php echo (empty($curso_canvas)) ? '#' : 'https://aden.instructure.com/courses/'.$curso_canvas; ?>" target="_blank" role="button" aria-pressed="true"><?php echo lang('ven_en_canvas'); ?> <img src="https://www.aden.org/sis_test/assets/images/canvas_icon.png"></a></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box" id="tabla_alumnos">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Alumnos Inscriptos</h3>
                </div>
                <!-- box-body -->
                <div class="box-body">
                <?php 
                    $html = '';
                    $cabeceras = array(
    					lang('id'),
    					lang('alumno'),
    					lang('fecha'),
    					lang('estado'),
    					lang('comentario'),
					);
					$html .= startTable($cabeceras);
					if($alumnos)
					{
						foreach ($alumnos as $row_alumnos) 
						{
                            $registro = array(
                                $row_alumnos->codpersona,
								$row_alumnos->nombre,
								formatDate($row_alumnos->fechallamada),
								setSpan('Aprobado', 'success'),
								$row_alumnos->comentario,
                            );
							
							$content = setTableContent($registro, "cursos-row");

       						$html .= $content;
                            	}
                    }
                    $html .= endTable();
					$html .= setDatatables();
							
					echo $html;
                ?>
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
                        <label for="inputNombre" class="col-xs-2 col-sm-3 control-label"><?php echo lang('nombre'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <input type="text" class="form-control" id="inputNombre" name="curso_nombre" placeholder="<?php echo lang('nombre'); ?>" value="<?php echo $nombre; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAbreviatura" class="col-xs-2 col-sm-3 control-label"><?php echo lang('abreviatura'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <input type="text" class="form-control" id="inputAbreviatura" name="curso_abreviatura" placeholder="<?php echo lang('abreviatura'); ?>" value="<?php echo $abreviatura; ?>" maxlength="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputComienza" class="col-xs-2 col-sm-3 control-label"><?php echo lang('comienza'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <input type="text" class="form-control date" id="inputComienza" name="curso_comienza" placeholder="<?php echo lang('comienza'); ?>" value="<?php echo $comienza; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFinaliza" class="col-xs-2 col-sm-3 control-label"><?php echo lang('finaliza'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <input type="text" class="form-control date" id="inputFinaliza" name="curso_finaliza" placeholder="<?php echo lang('finaliza'); ?>" value="<?php echo $finaliza; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputHoras" class="col-xs-2 col-sm-3 control-label"><?php echo lang('horas'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <input type="text" class="form-control" id="inputHoras" name="curso_horas" placeholder="<?php echo lang('horas'); ?>" value="<?php echo $horas; ?>" maxlength="3" pattern="^[0-9]{1,3}$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectClase" class="col-xs-2 col-sm-3 control-label"><?php echo lang('clase'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <select class="form-control select2" id="selectClase" name="curso_clase" style="width: 100%;">
                                <option disabled value="NULL" <?php if (getClaseNombre($clase) == '') echo "selected"; ?>>Seleccione una Clase</option>
                                <option value="5" <?php if ($clase == 5) echo "selected"; ?>><?php echo getClaseNombre(5); ?></option>
                                <option value="9" <?php if ($clase == 9) echo "selected"; ?>><?php echo getClaseNombre(9); ?></option>
                                <option value="6" <?php if ($clase == 6) echo "selected"; ?>><?php echo getClaseNombre(6); ?></option>
                                <option value="0" <?php if ($clase == 1 || $clase == 2 || $clase == 7 || $clase == 80) echo "selected"; ?>>Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectTipogral" class="col-xs-2 col-sm-3 control-label"><?php echo lang('tipogral'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <select class="form-control select2" id="selectTipogral" name="curso_tipogral" style="width: 100%;">
                                <option disabled value="NULL" <?php if (getTipoGralNombre($tipogral) == '') echo "selected"; ?>>Seleccione un Tipo General</option>
                                <option value="4"  <?php if ($tipogral == 4)  echo "selected"; ?>><?php echo getTipoGralNombre(4);  ?></option>
                                <option value="5"  <?php if ($tipogral == 5)  echo "selected"; ?>><?php echo getTipoGralNombre(5);  ?></option>
                                <option value="6"  <?php if ($tipogral == 6)  echo "selected"; ?>><?php echo getTipoGralNombre(6);  ?></option>
                                <option value="7"  <?php if ($tipogral == 7)  echo "selected"; ?>><?php echo getTipoGralNombre(7);  ?></option>
                                <option value="8"  <?php if ($tipogral == 8)  echo "selected"; ?>><?php echo getTipoGralNombre(8);  ?></option>
                                <option value="9"  <?php if ($tipogral == 9)  echo "selected"; ?>><?php echo getTipoGralNombre(9);  ?></option>
                                <option value="10" <?php if ($tipogral == 10) echo "selected"; ?>><?php echo getTipoGralNombre(10); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectModalidad" class="col-xs-2 col-sm-3 control-label"><?php echo lang('modalidad'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <select class="form-control select2" id="selectModalidad" name="curso_modalidad" style="width: 100%;">
                                <?php
                                    $html = '<option value="NULL" '.(($modalidad == 'NULL' || empty($modalidad)) ? 'selected' : '').' disabled>Seleccione una Categoría</option>';

                                    foreach($categorias as $categoria) {
                                        $selected = $categoria->codcategoria == $modalidad ? 'selected' : '';
                                        $html .= '<option value="'.$categoria->codcategoria.'" '.$selected.'>'.$categoria->nombre.'</option>';
                                    }

                                    echo $html;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectTutor" class="col-xs-2 col-sm-3 control-label"><?php echo lang('tutor'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <select class="form-control select2" id="selectTutor" name="curso_tutor" style="width: 100%;">
                            <?php
                                $html = '<option value="NULL" '.($codtutor == 'NULL' ? 'selected' : '').' disabled>Seleccione un Tutor</option>';

                                foreach($tutores as $tutor) {
                                    $selected = $tutor->id == $codtutor ? 'selected' : '';
                                    $html .= '<option value="'.$tutor->id.'" '.$selected.'>'.$tutor->nombre.'</option>';
                                }

                                echo $html;
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSemanasTeoricas" class="col-xs-2 col-sm-3 control-label"><?php echo lang('semanas_teoricas'); ?></label>
                        <div class="col-xs-10 col-sm-8">
                            <input type="text" class="form-control" id="inputSemanasTeoricas" name="curso_semanas_teoricas" placeholder="<?php echo lang('semanas_teoricas'); ?>" value="<?php echo $semanasteoricas; ?>" maxlength="3" pattern="^[0-9]{1,3}$">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardar_curso" value="1">Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<style>
    .actions-buttons button, 
    .actions-buttons a, 
    .actions-buttons input {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 100%;
    }
</style>
<!-- scripts -->
<script>
    // init select2 plugin
    $('.select2').select2();
    // init iCheck plugin
    $('input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
    });
</script>