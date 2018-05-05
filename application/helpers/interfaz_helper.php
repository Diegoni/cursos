<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

function buildInfoBox($nombre="", $valor="", $icono="", $color=""){
?>
        <div class="info-box">
            <span class="info-box-icon <?=$color?>"><i class="<?=$icono?>"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><?=$nombre?></span>
                <span class="info-box-number"><?=$valor?></span>
            </div>
        </div>
<?php
}
