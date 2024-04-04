<!DOCTYPE html>
<html>
<style>
</style>
<head>
    <!-- Created by Kondabolu -->
    <title>Service Inquiry</title>
    <meta charset="UFT-8">
    <style type="text/css">
        body {background-color: lightgray; margin: 50px;}
    </style>
</head>

<body>
    <h1>Inquiry Form</h1></br>
    <form method="post" action="Service_Inquiry.php">
        <p>
            Please Enter Your Name:
            <input type="text" name="Name" value="<?php if(isset($_POST['Name'])) echo $_POST['Name'] ?>">
</p></br>
<p>
            Please Enter your Company:
            <input type="text" name="Company" value="<?php if(isset($_POST['Company'])) echo $_POST['Company'] ?>">
        </p></br>
        <p>
            Please Enter your Email_ID:
            <input type="text" name="Email_ID" value="<?php if(isset($_POST['Email_ID'])) echo $_POST['Email_ID'] ?>">
        </p></br>
        <p>
            Please Enter your Phone:
            <input type="text" name="Phone" value="<?php if(isset($_POST['Phone'])) echo $_POST['Phone'] ?>">
        </p></br>
        <?php
        $servicearray = array("Consulting","Development","Training"); //array with all services
        ?>
        <p>
            <label for="service">Select Service:</label>
            <select name="selectservice" id="service">
                <option value="0" <?php if(isset($_POST['selectservice']) && $_POST['selectservice'] == '0') echo 'selected'; ?>><?php echo $servicearray[0]; ?></option>
                <option value="1" <?php if(isset($_POST['selectservice']) && $_POST['selectservice'] == '1') echo 'selected'; ?>><?php echo $servicearray[1]; ?></option>
                <option value="2" <?php if(isset($_POST['selectservice']) && $_POST['selectservice'] == '2') echo 'selected'; ?>><?php echo $servicearray[2]; ?></option>
            </select>
        </p></br>
        <input type="Submit" value="Submit">
         </form>
</body>
</html>