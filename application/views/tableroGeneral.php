        <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tablero General
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard active"></i> Tablero</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-sm-3">
<?php
                        buildInfoBox("Personas", $numeroPersonas, "fa fa-users", "bg-green");
?>
                    </div>
                    <div class="col-sm-3">
<?php
                        buildInfoBox("Usuarios", $numeroUsuarios, "glyphicon glyphicon-user", "bg-aqua");
?>
                    </div>
                </div>

              <!--------------------------
                | Your Page Content Here |
                -------------------------->

            </section>
            <!-- /.content -->
        </div><!-- /.content-wrapper -->
