<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
<div class="main">
    <div class="container">
        <center>
            <div class="middle">
                <div id="login">
                    <form action="<?php echo site_url('auth/login'); ?>" method="post">
                        <fieldset class="clearfix">
                            <p><span class="fa fa-user"></span><input type="text" name="username" placeholder="Username" required></p>
                            <p><span class="fa fa-lock"></span><input type="password" name="password" placeholder="Password" required></p>
                            <div>
                                <!-- <span style="width:48%; text-align:left; display: inline-block;"><a class="small-text" href="#">Forgot password?</a></span> -->
                                <span style="width:48%; text-align:left; display: inline-block;"><a class="small-text" href="#"></a></span>
                                <span style="width:50%; text-align:right; display: inline-block;"><input type="submit" value="Sign In"></span>
                            </div>
                        </fieldset>
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="logo"><img style="width: 200px;" src="<?php echo base_url('assets/images/logo_cp.png'); ?>" alt="Logo"><div class="clearfix"></div></div>
            </div>
        </center>
    </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<link rel="stylesheet" href="<?= base_url('assets/css/toastr.min.css'); ?>">
<script src="<?= base_url('assets/js/toastr.min.js'); ?>"></script>
<script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "onclick": null,
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "width": "auto",
            "white-space": "nowrap" 
        };
    

        $(document).ready(function() {
            <?php if ($this->session->flashdata('success')): ?>
                toastr.success("<?= $this->session->flashdata('success'); ?>");
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                toastr.error("<?= $this->session->flashdata('error'); ?>");
            <?php endif; ?>
        });
</script>