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

        <title>Category Question</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/bootstrap.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/templatecss.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/customecss.css"); ?>">
    </head>

    <body>
        <div class="container">
         
            <?php
                $this->load->view('homepage_action');
                //load all questions under given tag
                $this->load->view('allquestions_view',$questions);
            ?>           
            <footer class="footer">
                <p>QCon; 2014</p>
            </footer>      
        </div> <!-- /container -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
        <script src="<?php echo base_url("resources/js/autoload.js");?>"></script>
    </body>
</html>
