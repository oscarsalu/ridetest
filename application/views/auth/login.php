<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown" style="margin-top: 4cm">
        <div>
            <div>
            <h2>Share Ride</h2>
            </div>
            <?php if($this->session->flashdata('message')){ ?>
                <div class="alert alert-info"><?= $this->session->flashdata('message'); ?></div>
            <?php } ?>
           <!--  <div id="infoMessage"><?php echo $message;?></div> -->
            <p>Login in Using your Email. To see it in action.</p>
            <form class="m-t" role="form" action="<?= site_url('auth/login') ?>" method="post">
                <div class="form-group">
                        <h5>Email</h5>
                      <?php echo form_input($identity);?>
                </div>
                <div class="form-group">
                  <?php echo lang('login_password_label', 'password');?>
                  <?php echo form_input($password);?>
                  <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                </div>
                <div class="form-group">
                  <?php echo lang('login_remember_label', 'remember');?>
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                </div>
                <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

               <p><a href="<?= base_url() ?>assets/forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= base_url() ?>auth/create_user">Create an account</a>
            </form>
            <p class="m-t"> <small> &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

</body>

</html>