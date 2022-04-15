<body>
    <aside id="leftsidebar" class="sidebar">
        <!-- #User Info -->
        <div class="user-info">
                <div class="image">
                    <img src="<?= base_url("assets/img/dentist.png") ?>" width="60" height="55" alt="User" />
                </div>
                <div class="info-container" style="margin-top: 10px">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</div>
                    <!-- <div class="email">john.doe@example.com</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?= base_url('admin/sign_out') ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <!-- <li id="menu-dashboard">
                    <a href="<?= base_url('admin/dashboard') ?>">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li> -->
                <li id="menu-appointment">
                    <a href="<?= base_url('admin/appointments') ?>">
                        <i class="material-icons">library_books</i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li id="menu-services">
                    <a href="<?= base_url('admin/services') ?>">
                        <i class="material-icons">room_service</i>
                        <span>Services</span>
                    </a>
                </li>
                <li id="menu-medicines">
                    <a href="<?= base_url('admin/medicines') ?>">
                        <i class="material-icons">library_add</i>
                        <span>Medicines</span>
                    </a>
                </li>
                <li id="menu-feedback">
                    <a href="<?= base_url('admin/feedback') ?>">
                        <i class="material-icons">person</i>
                        <span>Feedbacks</span>
                    </a>
                </li>
                <li id="menu-cases">
                    <a href="<?= base_url('admin/othercases') ?>">
                        <i class="material-icons">info</i>
                        <span>Other Cases</span>
                    </a>
                </li>
                <li id="menu-history">
                    <a href="<?= base_url('admin/patrecords') ?>">
                        <i class="material-icons">room_service</i>
                        <span>Patient's History</span>
                    </a>
                </li>
            </ul>
        </div>
<!--        <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="http://mydrainwiz.com/">DRAiNWIZ - www.mydrainwiz.com</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>-->
        <!-- #Footer -->
    </aside>
</body>


