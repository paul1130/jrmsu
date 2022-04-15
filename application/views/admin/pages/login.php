<body class="login-page vertical-center" style="margin-top: -50px; width: 300px">
    <div class="login-box">
        <div class="logo">
            <!-- <img class="img-responsive thumbnail" src="<?= base_url("assets/img/logo.png") ?>"> -->
            <a href="javascript:void(0);" style="font-size: 20px">JRMSU Extension Program</a>
        </div>
        <div class="card" style="width: 360px;">
            <div class="body">
                <form id="sign-in-form">
                    <!--$this->session->flashdata('item')-->
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                        <label class="error"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <label class="error"></label>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <!--<a href="forgot-password.html">Forgot Password?</a>-->
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="button" onclick="user.validate_log_in()">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--<a href="javascript:void(0);">DRAiNWIZ</a>-->
    </div>
</body>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
});
</script>