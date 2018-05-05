        <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?=$nombre?>: Gesti&oacute;n de personas
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?=BASEURL.'tablero'?>"><i class="fa fa-dashboard"></i> Tablero</a></li>
                    <li><a href="<?=BASEURL.'sede/'.$sedeId?>"><i class="fa fa-university"></i> Sede <?=$nombre?></a></li>
                    <li class="active"><i class="fa fa-user"></i> Gesti&oacute;n de personas</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header"><h3 class="box-title">Personas</h3></div>
                            <div class="box-body">
                                <table id="personas" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>CodPersona</th>
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Tel&eacute;fono</th>
                                            <th>F. Ingreso</th>
                                            <th>Login Canvas</th>
                                            <th>Cr&eacute;ditos</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
            <!-- /.content -->
        </div><!-- /.content-wrapper -->
        <script>
        $(function () {
            $('#personas').DataTable({
                language:{
                    lengthMenu:     "Mostrar _MENU_ resultados",
                    search:         "Buscar",
                    loadingRecords: "Cargando...",
                    processing:     "Procesando...",
                    info:           "Mostrando resultados _START_ a _END_ de _TOTAL_",
                    infoEmpty:      "Sin resultados",
                    infoFiltered:   "(filtrados de _MAX_ registros en total)",
                    zeroRecords:    "No se encontraron resultados coincidentes",
                    paginate: {
                        first:      "Primera",
                        previous:   "Previa",
                        next:       "Pr&oacute;xima",
                        last:       "&Uacute;ltima"
                    }
                },
                serverSide: true,
                searchDelay: 500,
                processing: true,
                ajax: "<?=BASEURL?>persona/ajax"
            });
        });
        </script>