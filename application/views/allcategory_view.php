<html>
    <head>       
    </head>
    <body>
        <?php
            $dataSize = sizeof($data, 0);
            
            for($x=0; $x<$dataSize; $x++){
                echo "<div style=\"padding-bottom: 20px\">";
                echo "<a href=\"http://localhost/AWTCW2/index.php/category_controller/get_questions?catId=";
                echo $data[$x]['categoryid'];
                echo "\">";
                echo $data[$x]['categoryname'];
                echo "</a>";
                echo "</div>";            
            }           
        ?>        
    </body>
</html>