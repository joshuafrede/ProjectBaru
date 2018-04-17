Test Pemasukan Group Baru
Test Pemasukan Group Baru
Test Pemasukan Group Baru
Test Pemasukan Group Baru
Test Pemasukan Group Baru
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url() ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.png" type="image/png">

        <title>IManage - Stock Keeping in a click</title>

        <link href="css/style.default.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin">


        <section>

            <div class="signinpanel">

                <div class="row">


                    <div class="col-md-8 col-md-push-2">

                        <form method="post" action="Handler/login" id='basicForm'>
                            <h4 class="nomargin">Sign In to IManage</h4>
                            <p class="mt5 mb20">Login to access your account.</p>
                            <?php if (isset($p1) && $p1 == "Wrong") { ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Login Failed</strong> Wrong password, please retype password
                                </div>
                            <?php } ?>
                            <input type="text" class="form-control uname" placeholder="Username" name='username' required autocomplete='off'/>
                            <input type="password" class="form-control pword" placeholder="Password" name='password' required autocomplete='off'/>
                            <br>
                            <a href=""><small>Forgot Your Password?</small></a>
                            <button class="btn btn-success btn-block">Sign In</button>
                            <br>
                            &copy; Puyuh Enterprise <?php echo date("Y") ?>. All Rights Reserved.
                        </form>                        
                    </div><!-- col-sm-5 -->

                </div><!-- row -->

            </div><!-- signin -->

        </section>


        <?php include(APPPATH . "/views/scriptmodule.php") ?>

    </body>
</html>
