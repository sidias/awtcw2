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

        <title>Tags</title>

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
                $this->load->view('alltags_view',$data);
            ?>           
            <footer class="footer">
                <p>QCon; 2014</p>
            </footer>      
        </div> <!-- /container -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url("resources/boostrap/js/bootstrap.js"); ?>"></script>
        <script src="<?php echo base_url("resources/JQuery/typehead.js"); ?>"></script>
      
        <script>

            $(document).ready(function(){
                 
                //ask question button click
                $("#askquestion").click(function(){
                   location.href =  'http://localhost/AWTCW2/index.php/askquestion_controller/';
                });
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
