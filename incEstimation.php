<?php
    define("WEBDESIGN", 50);
    define("WEBDEVELOPMENT", 100);
    define("MOBILEAPP",150);
    define("GRAPGICDESIGN",200);

    $totalCost = NULL;

    if(isset($_POST['submitButton'])){
        $inputName = $_POST["nameTextBox"];

        if(strlen(trim($inputName)) > 0){
            if(isset($_POST['projectSelect'])){
                $typeofProject = $_POST['projectSelect'];
                if(isset($_POST['req'])){
                    // var_dump($_POST['req']);
                    
                    echo "<p> <b>Your Quote reference Number is: ".mt_rand(100000, 999999)."</b></p>";
                    echo "<p>Project Name : $inputName</p>";
                    echo "<p>Type Of Project: ".ucfirst($typeofProject) ."</p>";

                    echo "The Following technologies will be used for this $typeofProject <br>";

                    foreach($_POST['req'] as $selectedReq) {
                        echo $selectedReq . "<br>";
                    }
                    $days = $_POST['durationTextBox'];
                    $price = $_POST['priceTextBox'];

                    // create and call the function...
                    calculateCost($typeofProject, $days, $price);
                    echo "<p>no.of days required to complete: $days </p>";

                    echo "<p>Considering all the factors listed above, The Final Estimation is <strong>$ $totalCost*</strong></p>";
                    echo "*the subjected price is just an estimation, it may varies depending on your requirements";
                    echo "<p>Thank you for connecting with <b>TechSphere_Nexus</b>, hoping to start your ".ucfirst($typeofProject) ." project soon!!!</p>";
                }else{
                    echo "Please select the technologies required in your project ";
                }

            }else{
                echo "Please select your type of project and try again!!";
            }

        }else{
            echo "looks like their is no project name or it doesn't met the naming conventions";
        }
    }

    function calculateCost($typeofProject, $days, $price){
        global $totalCost;
        
        switch($typeofProject){
            case "webDesign":
                $totalCost = (100 - $days) * $price * 7 * WEBDESIGN;
                break;
            case "webDevelopment":
                $totalCost = (100 - $days) * $price * 7 * WEBDEVELOPMENT;
                break;
            case "mobileApp":
                    $totalCost = (100 - $days) * $price * 7 * MOBILEAPP;
                    break;
            case "graphicDesign":
                    $totalCost = (100 - $days) * $price * 7 * GRAPGICDESIGN;
                    break;
        }

    }



?>