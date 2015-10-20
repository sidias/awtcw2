<html>
    <head>       
    </head>
    <body>
        <div class="row">
            <?php  
                for($s=1; $s<(sizeof($answers, 0)); $s++) {
                    
                    $answervote = '';
                    $userrate = "";
                    
                    for($k=0; $k<sizeof($answervotes, 0); $k++) {
                        if($answervotes[$k]['answer_id'] == $answers[$s]['answer_id']){
                            $answervote = $answervotes[$k]['votes'];
                        }
                    }
                    
                    $userrate = ($answervote['voteup'] - $answervote['votedown']);
                    $userrateval = $userrate * 5;

                    echo "<div style=\"padding-bottom: 20px\">";
                    echo "<p id=\"description\">";
                    echo $answers[$s]['description'];
                    echo "</p>";
                    echo "<div style=\"float: right\">";
                    echo "<p>Answered by : <span id=\"username\" style=\"background-color: #333;padding: 5px;color: #ffffff;border-radius: 6px\">";
                    echo $answers[$s]['username'];
                    echo "</span></p>";
                    echo "<p>user rate : <span style=\"background-color: #333;padding-left: 3px;padding-right: 3px;color: #ffffff;border-radius: 6px\">";
                    echo $userrateval;
                    echo "<span><p>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div>";
                    echo "<button type=\"button\" class=\"btn btn-primary answer\" id=\"";
                    echo $answers[$s]['answer_id']."_voteup";
                    echo "\" name=\"voteup\">";
                    echo "<span class=\"glyphicon glyphicon-hand-up\">";
                    echo "</span>";
                    echo "<span class=\"badge\">";
                    echo $answervote['voteup'];
                    echo "</span>";
                    echo "</button>";
                    echo "<button style=\"margin-left:4px\" type=\"button\" class=\"btn btn-primary answer\" id=\"";
                    echo $answers[$s]['answer_id']."_votedown";
                    echo "\" name=\"votedown\">";
                    echo "<span class=\"glyphicon glyphicon-hand-down\">";
                    echo "</span>";
                    echo "<span class=\"badge\">";
                    echo $answervote['votedown'];
                    echo "</span>";
                    echo "</button>";
                    echo "</div>";    
                    echo "<hr>";
                }
            ?>
        </div>
    </body>
</html>