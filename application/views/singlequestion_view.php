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
        <link rel="stylesheet" href="<?php echo base_url("resources/boostrap/css/typehead.css"); ?>">
  </head>

  <body>

    <div class="container">
      
        <?php
            $this->load->view('homepage_action');
            $this->load->view('questionpartial_view');
            $this->load->view('answerpartial_view');
        ?>
      <footer class="footer">
        <p>QCon; 2014</p>
      </footer>

    </div> <!-- /container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
        <script src="<?php echo base_url("resources/JQuery/typehead.js"); ?>"></script>
        <script>          
            var voteup = '',
            votedown = '';
            var val = '';
            
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
               
                //ask question button click
                $("#askquestion").click(function(){
                   location.href =  'http://localhost/AWTCW2/index.php/askquestion_controller/';
                });
            });
            
            $('#answerform').submit(function(event) {
                event.preventDefault();
                
                var description = $('#answerform textarea').val();
                var qid = $("#qid").val();
             alert(description);
                var form = $(this);
                
                $.ajax({ 
                    url   : form.attr('action'),
                    type  : form.attr('method'),
              
                    data  : {description: description , qid: qid},
                    success: function(response){
                
                        if(response == ''){
                            
                            $('#error').empty().append("<div id=\"errormsg\" class=\"alert alert-success aligh-cen\" role=\"alert\"><span class=\"glyphicon glyphicon-ok-sign\" aria-hidde=\"true\"></span><span class=\"sr-only\">Error</span> Yor answer has been Posted Successfully</div>");                                 
                            
                        } else {
                            $('#error').empty().append("<div id=\"errormsg\" class=\"alert alert-danger aligh-cen\" role=\"alert\"><span class=\"glyphicon glyphicon-question-sign\" aria-hidde=\"true\"></span><span class=\"sr-only\">Error</span>Database update failed</div>");                      
                        }
                    }
                });
                return false;
            });
            
            var tags = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 10,
                prefetch: {
                  // url points to a json file that contains an array of country names, see
                  // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                  url: 'http://localhost/AWTCW2/index.php/search_controller/autoload_searchResult',
                  filter: function(list) {                  
                    return $.map(list, function(tags) { return { name: tags }; });
                  }
                }
              });
            tags.initialize();

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            $('#prefetch .search').typeahead(null, {
              name: 'tags',
              displayKey: 'name',
              // `ttAdapter` wraps the suggestion engine in an adapter that
              // is compatible with the typeahead jQuery plugin
              source: tags.ttAdapter()
            });
            
        </script>
    </body>
</html>
