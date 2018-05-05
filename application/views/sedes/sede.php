        <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?=$nombre?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?=BASEURL.'tableros'?>"><i class="fa fa-dashboard"></i> Tablero</a></li>
                    <li class="active"><i class="fa fa-university"></i> Sede <?=$nombre?></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Personas', 'valor'=>$nPersonas, 'icono'=>'fa fa-users', 'color'=>'bg-olive']);
?>
                    </div>
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Usuarios', 'valor'=>'---', 'icono'=>'glyphicon glyphicon-user', 'color'=>'bg-aqua']);
?>
                    </div>
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Alumnos', 'valor'=>'---', 'icono'=>'fa fa-graduation-cap', 'color'=>'bg-aqua']);
?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Cursos<br><b>IC TOTAL</b>', 'valor'=>$nCursosIC, 'icono'=>'fa fa-book', 'color'=>'bg-blue']);
?>
                    </div>
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Cursos<br><b>IC A&Ntilde;O ACTUAL</b>', 'valor'=>$nCursosICAnioActual, 'icono'=>'fa fa-book', 'color'=>'bg-light-blue']);
?>
                    </div>
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Cursos<br><b>PA TOTAL</b>', 'valor'=>$nCursosPA, 'icono'=>'fa fa-book', 'color'=>'bg-green']);
?>
                    </div>
                    <div class="col-sm-6 col-lg-3">
<?php
                        buildInfoBox(['nombre'=>'Cursos<br><b>PA A&Ntilde;O ACTUAL</b>', 'valor'=>$nCursosPAAnioActual, 'icono'=>'fa fa-book', 'color'=>'bg-lime']);
?>
                    </div>
                </div>
<?php /*
                <h3>
                <div class="row">
                    <div class="col-sm-3 bg-light-blue">bg-light-blue</div>
                    <div class="col-sm-3 bg-green">bg-green</div>
                    <div class="col-sm-3 bg-yellow">bg-yellow</div>
                    <div class="col-sm-3 bg-red">bg-red</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 bg-aqua">bg-aqua</div>
                    <div class="col-sm-3 bg-purple">bg-purple</div>
                    <div class="col-sm-3 bg-blue">bg-blue</div>
                    <div class="col-sm-3 bg-navy">bg-navy</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 bg-teal">bg-teal</div>
                    <div class="col-sm-3 bg-maroon">bg-maroon</div>
                    <div class="col-sm-3 bg-black">bg-black</div>
                    <div class="col-sm-3 bg-gray">bg-gray</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 bg-olive">bg-olive</div>
                    <div class="col-sm-3 bg-lime">bg-lime</div>
                    <div class="col-sm-3 bg-orange">bg-orange</div>
                    <div class="col-sm-3 bg-fuchsia">bg-fuchsia</div>
                </div>
                </h3>
            </section>
 */?>
            <!-- /.content -->
        </div><!-- /.content-wrapper -->
