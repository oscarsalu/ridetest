<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ride Share</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/user.css">
     <link href="<?= base_url() ?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">


</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><i class="glyphicon glyphicon-vehicle"></i><span class="text-title">Ride Share </span></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active" role="presentation"><a href="#">Home</a></li>
                        <?php if (!$this->ion_auth->logged_in()){ ?>
                        <li role="presentation"><a href="<?= site_url('auth/login/'); ?>">Login </a></li>
                        <li role="presentation"><a href="<?= site_url('auth/create_user/'); ?>">Register</a></li>
                        <?php } elseif ($this->ion_auth->logged_in()) {?>
                           <li role="presentation"><a href="<?= site_url('Getride/create_getride/'); ?>">Share Rides </a></li>
                            <li role="presentation"><a href="<?= site_url('Bookrid/create_bookrid/'); ?>">Available Rides</a></li>
                            <li role="presentation"><a href="<?= site_url('auth/logout/'); ?>">Logout</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron" style="background:none;box-shadow:none; margin-top: 5cm">
            <div class="container">
            <div class="row">
            <?php if(isset($message)){ ?>
                <div class="alert alert-success"><?= $message ?></div>
            <?php } ?>
                    <h2 style="color:black; text-align: center;">Search Ride</h2>       
                    <div class="form-group col-md-6">
                        <label for="origin" class="sr-only">Insert Origin</label>
                        <input type="origin" id="origin" class="form-control" placeholder="Origin" name="origin"  required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="destination" class="sr-only">Insert Destination</label>
                        <input type="destination" id="destination" class="form-control" placeholder="Destination" name="destination"  required>
                    </div>
             </div>
             <div class="row">
             <div class="col-md-4"></div>
             <div class="col-md-4"><button class="btn btn-lg btn-primary btn-block col-md-4" type="submit" id="btn-access">Search Ride</button></div>
             <div class="col-md-4"></div>
                 
             </div>           
            </div>
        </div>
    </header>
    <div id="ajaxreturn">  
            </div>
    <!-- <div class="container">
        <div class="row">
            
        </div>
    </div> -->
    <footer>
        <h5>Rideshare © <?php echo date('Y');?></h5></footer>
   
    
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script> 
    <script src="<?= base_url() ?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>
        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('origin');
                       var destination = document.getElementById('destination');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       var dest_complete = new google.maps.places.Autocomplete(destination);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>
    <script type="text/javascript">
    $("#btn-access").click(function() {
        //if(e.which == 13) {
            $destination = $('#destination').val();
            $origin = $('#origin').val();

            $url = "<?php echo base_url(); ?>";
            $.ajax({
                url: $url+"auth/searchride",
                type: "POST", 
                data: {
                    "origin":$origin,
                    'destination':$destination,
                    '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                },
                success:function(data){  
                $("#ajaxreturn").html(data);
                        //console.log(data);
                    }  
            });
    });
</script>
</body>

</html>