<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $nombre?>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-university"></i> Cursos</a></li>
            <li class="active"><a href=""><i class="fa fa-university"></i> Curso</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">

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
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-inscribir-alumnos">Inscribir Alumnos <span class="glyphicon glyphicon-education"></span></button></p>
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#">Modificar Fecha/Sem Teoricas <span class="glyphicon glyphicon-calendar"></span></button></p>
                    <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-cronogramas">Cronogramas</span></button></p>
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
							
				$array_estados = array();
							
				if($estados)
				{
					foreach ($estados as $estado) 
					{
						$array_estados[$estado->id] = array(
							'nombre'		=> $estado->nombre,
							'abreviatura'	=> $estado->abreviatura,
						);
					}
				}
							
                $cabeceras = array(
					lang('id'),
					lang('alumno'),
					lang('fecha'),
					lang('estado'),
					lang('comentario'),
				);
				
				$html .= startTable($cabeceras);
							
				$array_personas = array();
							
				if($alumnos)
				{
					foreach ($alumnos as $row_alumnos) 
					{
						if(!in_array($row_alumnos->codpersona, $array_personas))
						{
							$array_personas[] = $row_alumnos->codpersona;
										
							$registro = array(
								$row_alumnos->codpersona,
								$row_alumnos->nombre,
								formatDate($row_alumnos->fechallamada),
								setSpanEstadoAlumno($array_estados[$row_alumnos->codestado]),
								$row_alumnos->comentario,
							);
								
							$content = setTableContent($registro, "cursos-row");
	
	       					$html .= $content;
						}
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

<!--     modals      -->
<?php include_once 'modal-cronogramas.php'; ?>
<?php include_once 'modal-edit-curso.php'; ?>
<?php include_once 'modal-inscribir-alumnos.php'; ?>

<!--    styles      -->
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

<!-- GLOBAL INSTANCES -->
<!--     scripts      -->
<script>
    /**
     * @param {string} base url function like Codeigniter
     */
    const base_url = function() { return '<?= BASEURL ?>'; };
</script>

<?php echo setJs('main/cursos/js/curso.js'); ?>