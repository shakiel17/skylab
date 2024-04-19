
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SkyLab Booking System</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?=base_url();?>design/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?=base_url();?>design/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?=base_url();?>design/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?=base_url();?>design/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/jpeg" href="<?=base_url();?>design/images/skylablogo.jpg">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body style="background: url(<?=base_url();?>design/images/skylabbackground.jpg) no-repeat; background-size: cover;">

        <div class="container">            
            <div class="row">                
                <div class="col-md-4 col-md-offset-4">
                <center>
                <h1 style="color:white;">Skylab Booking System</h1>
                </center>
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <?=form_open(base_url()."user_authentication");?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        Not yet a member? <a href="">Register here</a>
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?=base_url();?>design/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=base_url();?>design/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?=base_url();?>design/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?=base_url();?>design/js/startmin.js"></script>

    </body>

</html>
