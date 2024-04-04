<!DOCTYPE html>
<!-- Created by Kondabolu
    555555555555555555555
 -->
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Three-Tier Data Access</title>
        <style type="text/css">
            body {font-family: sans-serif;
                    background-color: lightyellow;
                    margin: 50px;}
            table{background-color: lightyellow;
                  border-collapse: collapse;
                    border: 1px solid gray;}
            td{padding: 5px;}
            tr:nth-child(odd){background-color: white;}
            table, td, th {border: 1px solid black;}
        </style>
    </head>
    <body>
        <h1>Querying a Mysql database</h1>
        <form method="post" action="#">
        <p>Select a field to display:
            <!--add a select box containing options -->
            <!-- for SELECT Query -->
            <select name="select">
                <?php 
                function sticky($value){
                    //function to retain value on rountrip in the select/option tag.
                    $selected="";
                    if(isset($_POST['select'])){
                        $_POST['select'] == $value ? $selected = 'selected' :$selected = "";
                    }
                    echo $selected;
                }//end function
                ?>
                <option value="*" <?php sticky("*") ?> >All columns in the table</option>
                <option value="make, model" <?php sticky("make, model") ?>>Car Make and Model</option>
                <option value="model" <?php sticky("model") ?>>Car Model</option>
                <option value="make, model, mileage, year" <?php sticky("make, model, mileage, year") ?>>Car Make, Model, Mileage and Model</option>
            </select>
        </p>
        <p><input type="submit" value="Select Query" name="selectQuery"</p>
        </form>
        <?php
            if(isset($_POST['selectQuery']))
            {include('inc_QueryResults.php');
            }//end if
        ?>
    </body>
</html>