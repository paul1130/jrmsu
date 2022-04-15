<div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
<!--    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>-->
<nav class="navbar ">
    <div class="container-fluid">
        <div class="navbar-header ">
            <!--<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>-->
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand " href="<?= base_url('admin/appointments') ?>">
                JRMSU Extension Program
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 0px">
            <li>
                <a href="#"> <label><?= $this->session->userdata('user_data')['first_name'] ?> <?= $this->session->userdata('user_data')['last_name'] ?></label></a>
            </li>
            <li>
                <a href="#"> <span style="font-size: 25px;">|</span></a>
            </li>
            </li>
            <li>
                <a href="<?= base_url('user/sign_out') ?>" > Sign Out</a>
            </li> 
            <!-- <div class="btn-group user-helper-dropdown"> -->
                <!-- <div class="row" style="margin-top: 25px; margin-right: 10px">
                    <div class="col-md-10">
                        <label>This is Name</label>
                    </div>
                    <div class="col-md-2" style="height: 100%;">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">expand_more</i>
                        <ul class="dropdown-menu pull-left">
                            <li><a href="<?= base_url('user/sign_out') ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul> 
                    </div>
                </div> -->
            <!-- </div> -->
        </ul>
    </div>
</nav>