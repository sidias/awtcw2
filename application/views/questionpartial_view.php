<html>
    <head>       
    </head>
    <body>
        <div class="row">
            <?php               
                echo "<div style=\"padding-bottom: 20px\">";
                echo "<p style=\"font-weight: bold;font-size: 18px\" class=\"question\" id=\"";
                echo $question['question_id'];
                echo "\">";
                echo $question['question'];
                echo "</p>";
                echo "<hr>";
                echo "<p>";
                echo $question['description'];
                echo "</p>";
                echo "<div style=\"float: right\">";
                echo "<p>posted by : <span style=\"background-color: #333;padding: 5px;color: #ffffff;border-radius: 6px\">";
                echo $question['username'];
                echo "</span></p>";
                echo "<p id=\"rate\">user rate : <span style=\"background-color: #333;padding-left: 3px;padding-right: 3px;color: #ffffff;border-radius: 6px\">";
                echo "<span><p>";
                echo "</div>";
                echo "</div>";
            ?> 
            <div>
                <button type="button" class="btn btn-primary" id="q_voteup" name="voteup">
                    <span class="glyphicon glyphicon-hand-up"></span> <span class="badge"></span>
                </button>
                <button type="button" class="btn btn-primary" id="q_votedown" name="votedown">
                    <span class="glyphicon glyphicon-hand-down"></span> <span class="badge"></span>
                </button>
            </div>
            <hr>
        </div>
    </body>
</html>