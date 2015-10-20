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
      
        <div class="row" style="padding-bottom: 10px">
            <div>
                <p><span style="font-size: x-large; font-weight: bold">Your Answer</span></p>
            </div>
            <div>
                <form role="form" id="answerform" action="http://localhost/AWTCW2/index.php/answer_controller/submitAnswer" method="POST">                                 
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                        <input name="qid" id="qid" value="<?php echo htmlspecialchars($question['question_id']); ?>" hidden="">
                    </div> 
                    <div id="error"></div>
                    <button type="submit" name="postanswer" id="postquestion" class="btn btn-primary">Post</button>
                </form>     
            </div>
        </div>  
    </body>
</html>