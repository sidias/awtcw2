<html>
    <head>       
    </head>
    <body>
        <div class="header">
            <nav>
                <ul class="nav nav-pills pull-right"> 
                    <li role="presentation" class="active">
                        <a href="http://localhost/AWTCW2/index.php/home_controller">
                           <span class="glyphicon glyphicon-home"></span>
                           <span>Home</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="http://localhost/AWTCW2/index.php/category_controller">
                           <span class="glyphicon glyphicon-tasks"></span>
                           <span>Category</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="http://localhost/AWTCW2/index.php/tag_controller">
                           <span class="glyphicon glyphicon-tags"></span>
                           <span>Tags</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="http://localhost/AWTCW2/index.php/profile_controller">
                           <span class="glyphicon glyphicon-user"></span>
                           <span>Profile</span>
                        </a>
                    </li>
              </ul>
            </nav>      
            <img class="pad" src="<?php echo base_url("resources/image/logobrand.jpg");?>" alt="brand">
        </div>
        <div style="margin-bottom: 35px; height: 50px">            
            <ul class="list-inline">           
                <li>
                    <div id="prefetch">
                        <form role="form" class="form-inline" action="http://localhost/AWTCW2/index.php/search_controller/searchResult" method="POST">
                            <div class="form-group">
                               <input type="text" class="form-control search form-custom typeahead" placeholder="Search" name="term">
                            </div>
                            <button type="submit" name="btn_search" class="btn btn-primary" style="border-radius: 20px">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </div>
                </li>
                <li style="padding-left:335px">
                    <button type="button" class="btn btn-primary btn-sm" id="askquestion">
                        <span class="glyphicon glyphicon-question-sign"></span>
                        <span>Ask Question</span>
                    </button> 
                </li>
            </ul>
        </div>  
    </body>
</html>