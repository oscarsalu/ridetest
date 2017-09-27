<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SR</h1>
                <p><?php echo lang('create_user_subheading');?></p>
            </div>
            <div id="infoMessage"><?php echo $message;?></div>
            <h3>Register</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="<?= site_url('auth/create_user') ?>" method="post">
                <div class="form-group">
                    <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                    <?php echo form_input($first_name);?>
                </div>
                <div class="form-group">
                    <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                    <?php echo form_input($last_name);?>
                </div>
                <?php
                    if($identity_column!=='email') {
                        echo '<p>';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</p>';
                    }
                    ?>
                <div class="form-group">
                    <label for="username">Username:</label> <br />
                    <?php echo form_input($username);?>
                </div>
                <div class="form-group">
                    <?php echo lang('create_user_email_label', 'email');?> <br />
                    <?php echo form_input($email);?>
                </div>
                <div class="form-group">
                  <?php echo lang('create_user_phone_label', 'phone');?> <br />
                  <?php echo form_input($phone);?>
                </div>
                <div class="form-group">
                    <?php echo lang('create_user_password_label', 'password');?> <br />
                    <?php echo form_input($password);?>
                </div>
                <div class="form-group">
                    <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                  <?php echo form_input($password_confirm);?>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= site_url('auth/login/'); ?>">Login</a>
            </form>
            <p class="m-t"> <small>Rideshare © <?php echo date('Y');?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>