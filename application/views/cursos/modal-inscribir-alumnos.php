
<!-- modal -->
<div class="modal fade" id="modal-inscribir-alumnos" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Inscripción Alumnos</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputBuscarAlumnos" placeholder="Buscar por Nombre y/o Apellido">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="buttonBuscarAlumnos" type="button">Buscar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12">
                            <select class="form-control" multiple="multiple" id="selectInscAlumnos" name="curso_inscr_alumno[]">
                                
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
