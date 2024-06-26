<!DOCTYPE html>
<html>
<head>
    <!-- Created by Kondabolu -->
    <title>Service Inquiry</title>
    <meta charset="UFT-8">
    <link rel="stylesheet" href="StyleSheet.css">
</head>

<body>
    <nav>
        <a href="HomePage.html">Home</a>
        <a href="about.html">About Us</a>
        <a href="service_inquiry.php">Service Inquiry</a>
        <a href="project_portfolio.php">Project Portfolio</a>
        <a href="tech_trends_poll.php">Tech Trends Poll</a>
        <a href="tech_chat_lounge.php">Tech Chat Lounge</a>
        <a href="knowledge_base.php">Knowledge Base</a>
        <a href="career_opportunities.php">Career Opportunities</a>
        <a href="event_calendar.php">Event Calendar</a>
        <a href="feedback.php">Feedback</a>
    </nav>
    <h1>Inquiry Form</h1></br>
    <form  method="post" action="Service_Inquiry.php">
        <p>
            <label for="Name">Please Enter Your Name:</label>
            <input type="text" name="Name" value="<?php if(isset($_POST['Name'])) echo $_POST['Name'] ?>" pattern="[A-Za-z ]+" title="Please enter only alphabets" required>
        </p></br>
        <p>
            <label for="Company">Please Enter your Company:</label>
            <input type="text" name="Company" value="<?php if(isset($_POST['Company'])) echo $_POST['Company'] ?>" required>
        </p></br>
        <p>
            <label for="Email_ID">Please Enter your Email_ID:</label>
            <input type="text" name="Email_ID" value="<?php if(isset($_POST['Email_ID'])) echo $_POST['Email_ID'] ?>" pattern="[A-Za-z@a-z.a-z ]+" title="Please enter correct mailId" required>
        </p></br>
        <p>
            <label for="Phone">Please Enter your Phone:</label>
            <input type="text" name="Phone" value="<?php if(isset($_POST['Phone'])) echo $_POST['Phone'] ?>" pattern="[0-9]+" title="Please enter correct phone number" required>
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
        </p></br><p>
        <input type="Submit" name="Submit" value="Submit"> </p>
        <?php
        if(isset($_POST['Submit'])) {
        // Form submitted, display thank you message
        echo "<p>Your Reference number is : ". rand(100000, 900000) ."</p>";
        echo "<script>alert('Thank you, we will get back to you soon.');</script>";
        }    ?></p>
         </form>
    <footer>
        <p> &copy; 2024 TechSphere Nexus. All rights reserved. </p>
    </footer>
</body>
</html>