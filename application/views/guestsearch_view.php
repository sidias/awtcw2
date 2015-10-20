<!DOCTYPE html>
<html lang="en">
    <?php
        $this->load->helper('url');
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Guest Search</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/bootstrap.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/templatecss.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/customecss.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/typehead.css"); ?>">
    </head>

    <body>
        <div class="container">
            
            <?php
                $this->load->view('logo_view');
            ?>
            
            <div class="row" style="max-width: 400px; margin-left: 120px; margin-bottom: 20px">
                <div>
                    <form role="form" id="form" action="http://localhost/AWTCW2/index.php/search_controller/guestsearch" method="POST">                      
                        <div id="prefetch" class="form-group">
                            <input class="form-control guest" type="text" placeholder="Enter your search term" name="guestsearch" id="guestsearch">
                        </div>  
                        <button type="submit" name="g_search" id="g_search" class="btn btn-primary" style="float: right">Search</button>
                    </form>     
                </div>
            </div>  
           
            <footer class="footer">
                <p>QCon; 2014</p>
            </footer>
        </div> <!-- /container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
        <script src="<?php echo base_url("resources/JQuery/typehead.js"); ?>"></script>
        
    </body>
</html>
