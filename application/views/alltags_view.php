<html>
    <head>       
    </head>
    <body>
        <?php
            $dataSize = sizeof($data, 0);
            
            for($x=0; $x<$dataSize; $x++){
                echo "<div style=\"padding-bottom: 20px\">";
                echo "<a href=\"http://localhost/AWTCW2/index.php/tag_controller/get_questions?tagId=";
                echo $data[$x]['tagid'];
                echo "\">";
                echo $data[$x]['tagname'];
                echo "</a>";
                echo "</div>";            
            }           
        ?> 

    </body>
</html>