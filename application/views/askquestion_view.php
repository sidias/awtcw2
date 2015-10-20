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

    <title>Ask Qustion</title>

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
    ?>
        <div class="container" >
            <div class="row" style="max-width: 400px; margin-left: 120px; margin-bottom: 20px">
                <div>
                    <form role="form" id="form" action="http://localhost/AWTCW2/index.php/askquestion_controller/submitQuestion" method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="What is your programming question?" name="title" size="100"/>
                        </div>                    
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                        </div>   
                        <div class="form-group btn-group">
                            <button class="btn btn-default dropdown-toggle" id="dropdown-button" name="category" data-toggle="dropdown">Category
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="dropdownlist" aria-labelledby="category"></ul>
                        </div>                 
                        <div class="div_border"></div>
                        <div id="prefetch" class="form-group">
                            <label for="tags">Tags</label>
                            <input class="form-control tags" type="text" placeholder="tags will easy search" name="tags" id="tags">
                        </div>  
                        <div id="error"></div>
                        <button type="submit" name="postquestion" id="postquestion" class="btn btn-primary">Post Your Question</button>
                    </form>     
                </div>
            </div>  
        </div>
      <footer class="footer">
        <p>QCon; 2014</p>
      </footer>

    </div> <!-- /container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/JQuery/typehead.js"); ?>"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
        <script>
            var selText = '';
           
            $(document).ready(function(){
                
                //ask question button click
                $("#askquestion").click(function(){
                   location.href =  'http://localhost/AWTCW2/index.php/askquestion_controller/';
                });
 
                //load category items
                $.ajax({                 
                    url: "http://localhost/AWTCW2/index.php/category_controller/getAllCategory",
                    success : function(result) {         
                        for(var key in result) {
                            $( ".dropdown-menu" ).append( "<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\">"+result[key]+"</a></li>" );                     
                        }
                        
                        //bind event to dropdown.
                        $(".dropdown-menu li a").click(function(){
                            selText = $(this).text();
                            $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
                        });
                    }
                });
                
            });                           
            
            //stop form submitting if all textboxes are not filled
            $('#form').submit(function(event) {
                 
                //stop default post machanism
                event.preventDefault();
                 //in this function check if all values are filled in every text box and category.
                var title = $("#title").val();
                var description = $('#description').val();
                var categoryVal = selText;
                var tagVal = $("#tags").val();
                                   
                //add new tag to database
                $.ajax({
                    url: "http://localhost/AWTCW2/index.php/tag_controller/insertTag",
                    data: {tag : tagVal},
                    success: function(result){
                    }
                });

                if(title == '' || description == '' || categoryVal == '' || tagVal == '') {
    
                    $('#error').empty().append("<div id=\"errormsg\" class=\"alert alert-danger aligh-cen\" role=\"alert\"><span class=\"glyphicon glyphicon-question-sign\" aria-hidde=\"true\"></span><span class=\"sr-only\">Error</span> All values must be filled</div>");                      
                    return;
                } 
                var form = $(this);
  
                //var form = $(this);
                $.ajax({ 
                    url   : form.attr('action'),
                    type  : form.attr('method'),
                    data  : {title : title, description : description, category : categoryVal, tags : tagVal},
                    success: function(response){
                
                        if(response != ''){
                            $('#error').empty().append("<div id=\"errormsg\" class=\"alert alert-success aligh-cen\" role=\"alert\"><span class=\"glyphicon glyphicon-ok-sign\" aria-hidde=\"true\"></span><span class=\"sr-only\">Error</span> Yor Question has been Posted Successfully</div>");                                 
                            $("#title").val('');
                            $('#description').val('');
                            $(".dropdown-menu li a").parents('.btn-group').find('.dropdown-toggle').html('Category'+' <span class="caret"></span>');
                            $("#tags").val('');
                        } else {
                            $('#error').empty().append("<div id=\"errormsg\" class=\"alert alert-danger aligh-cen\" role=\"alert\"><span class=\"glyphicon glyphicon-question-sign\" aria-hidde=\"true\"></span><span class=\"sr-only\">Error</span>Database update failed</div>");                      
                        }
                    }
                });
                return false;
            });         
                            
            //tags autocomplete
            var tags = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 10,
                prefetch: {
                  
                  url: 'http://localhost/AWTCW2/index.php/tag_controller/tagsJSON',
                  filter: function(list) {                  
                    return $.map(list, function(tags) { return { name: tags }; });
                  }
                }
              });
            tags.initialize();

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            $('#prefetch .tags').typeahead(null, {
              name: 'tags',
              displayKey: 'name',
              // `ttAdapter` wraps the suggestion engine in an adapter that
              // is compatible with the typeahead jQuery plugin
              source: tags.ttAdapter()
            });
            
            //search autocomplete
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
            $('#prefetch .typeahead').typeahead(null, {
              name: 'tags',
              displayKey: 'name',
              // `ttAdapter` wraps the suggestion engine in an adapter that
              // is compatible with the typeahead jQuery plugin
              source: tags.ttAdapter()
            });
            
        </script>
    </body>
</html>
