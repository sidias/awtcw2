<html>
    <?php
        $this->load->helper('url');
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Registration </title>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/bootstrap.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/customecss.css"); ?>">
    </head>
    <body class="bd-bground">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                
                    <div class="navbar-form navbar-right">
                        <button class="btn btn-primary" id="guestsearch">Guest Search</button>
                    </div>                             
              </div>
            </div>
        </nav>
            <div class="container " align="center" style="margin-top: 10px">
                <div class="row img">
                    <div class="col-md-3 backcol col-def">
                        <img src="<?php echo base_url("resources/image/logo.jpg"); ?>" alt="logo" width="85px" height="85px">
                    </div>
                    <div class="col-md-9 extra2">
                        <h2 class="h2_1">Best Answers for Best Developers</h2>
                    </div>
                </div>
                <div class="row extra">
                    <form role="form" action="http://localhost/AWTCW2/index.php/auth/createAccount" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" size="20"/>
                        </div>                    
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" size="15"/>
                        </div>                       
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="password" name="password" size="15"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confpassword" placeholder="Re-enter password" name="confpassword" size="15"/>
                        </div>
                        <button type="submit" class="btn btn-primary margin-left" id="register" name="Register">Register</button>     
                        <button type="button" name="back" id="back" class="btn btn-primary back-btn">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                        </button>
                    </form>          
                    <div class="error">                 
                        <?php echo $errmsg; ?>
                    </div>
                </div>
                <hr>               
                <footer class="font-col">
                    <p class="lheight">Designed and built by Buddhi Nipun Mihara.</p>
                    <p class="lheight">IIT SE</p>
                    <p class="lheight">2011050</p>
                    <p class="lheight">© 2014 QCon</p>
                </footer>            
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
        <script>
            $(document).ready(function(){
                $("#back").click(function(){
                    location.href = 'back';
                });
                
                $("#guestsearch").click(function() {
                    location.href =  'http://localhost/AWTCW2/index.php/search_controller/guestSearch';
                });
            });          
        </script>
    </body>
</html>