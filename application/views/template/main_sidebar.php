        <aside class="main-sidebar"><!-- Left side column. contains the logo and sidebar -->
            <section class="sidebar"><!-- sidebar: style can be found in sidebar.less -->
                <div class="user-panel"><!-- Sidebar user panel (optional) -->
                    <div class="pull-left image">
<?php if(getUserImage()):?>
                        <img src="<?=getUserImage()?>" class="img-circle" alt="User Image">
<?php endif?>
                    </div>
                    <div class="pull-left info">
                        <p><?=$this->yo['nombre']?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form"><!-- search form (Optional) -->
                    <div class="input-group">
                      <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                          </button>
                        </span>
                    </div>
                </form><!-- /.search form -->
<?php
                $menuSedes->render();
                if(isset($menuGestion)){
                    $menuGestion->render();
                }
                $menuGeneral->render();
?>
            </section><!-- /.sidebar -->
        </aside>
