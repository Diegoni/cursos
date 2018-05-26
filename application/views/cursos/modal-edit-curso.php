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
                                        $selected = $categoria->id == $modalidad ? 'selected' : '';
                                        $html .= '<option value="'.$categoria->id.'" '.$selected.'>'.$categoria->nombre.'</option>';
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