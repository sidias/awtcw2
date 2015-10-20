<html>
    <head>       
    </head>
    <body>
        <p id="anscount" style="padding-top :30px; font-size : x-large; font-weight: bold">
            <?php
                echo $answers[0];
                echo " Answers";
                ?>
        </p>
        <hr>
        <?php
            $this->load->view('allanswers_view');
        ?>
    </body>
</html>