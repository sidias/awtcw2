<html>
    <head>       
    </head>
    <body>
        <?php
            $dataSize = sizeof($questions, 0);
                   
            for($x=0; $x<$dataSize; $x++){
                echo "<div style=\"padding-bottom: 20px\">";
                echo "<a href=\"http://localhost/AWTCW2/index.php/question_controller/get_answers?qid=";
                echo $questions[$x]['questionId'];
                echo "\">";
                echo $questions[$x]['title'];
                echo "</a>";
                echo "</div>";            
            }           
        ?>        
    </body>
</html>