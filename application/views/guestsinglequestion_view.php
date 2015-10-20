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

    <title>Single Question</title>

    <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/bootstrap.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/templatecss.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/customecss.css"); ?>">
  </head>

  <body>

    <div class="container">
      
        <?php
            $this->load->view('logo_view');
            $this->load->view('questionpartial_view');
            $this->load->view('guestanswerpartial_view');
        ?>
      <footer class="footer">
        <p>QCon; 2014</p>
      </footer>

    </div> <!-- /container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
     
        <script>          
            var voteup = '',
            votedown = '';
            var val = '';
            //do this after if insert to database is success
            //database 1th upvote downvote kiyala 2k thiyaganna wei.
            //key 1k 1 user kenekuta 1 parakata wada click krananna bariwena ona.
            //ekata button 1 click karahama ajax call 1k yawala balanna me user me button 1 click karalada
            //kiyala ehemanam disable karanna.
            $(document).ready(function(){
                
                var questionid = $(".question").attr("id");
                          
                //load questions votes
                $.ajax({     
                    //remove query string later
                    url: "http://localhost/AWTCW2/index.php/vote_controller/questionvote_total",
                    data  : {qid : questionid},
                    success : function(result) {         
                        voteup = result['voteup'];
                        votedown = result['votedown'];
                        
                        var rate = (voteup - votedown) * 5;
                        
                        $("#rate span").html(rate);
                        $("#q_voteup span.badge").html(result['voteup']);
                        $("#q_votedown span.badge").html(result['votedown']);
                        
                    }
                });
                
               //question votes 
                $("#q_voteup").click(function(){
                    $.ajax({    
                        //remove query string later
                        url: "http://localhost/AWTCW2/index.php/vote_controller/updateQuestion_vote",
                        data  : {qid : questionid, action : 'up', currval : voteup},
                        success : function(result) {         
                            
                            voteup++;       
                            $("#q_voteup span.badge").html(voteup);
                        }
                    });	                   
                    
                    //disable button after clicked
                });
                
                $("#q_votedown").click(function(){
                    $.ajax({    
                        //remove query string later
                        url: "http://localhost/AWTCW2/index.php/vote_controller/updateQuestion_vote",
                        data  : {qid : questionid, action : 'down', currval : votedown},
                        success : function(result) {         
                           
                            votedown++;
                            $("#q_votedown span.badge").html(votedown);
                        }
                    });	                      
                });
                
                //answer votes
                $(".answer").click(function(){
          
                    var id = $(this).attr('id');
                    var idsplit = id.split("_");   
                    val = $(this).text();
                  
                    $.ajax({    
                        //remove query string later
                        url: "http://localhost/AWTCW2/index.php/vote_controller/updateAnswer_vote",
                        data  : {aid : idsplit[0], action : idsplit[1], currval : val},
                        success : function(result) {         
                            val++;
                            $("#"+id+" span.badge").html(val);
                        }
                    });	   
                });
               
            });
          
        </script>
    </body>
</html>
