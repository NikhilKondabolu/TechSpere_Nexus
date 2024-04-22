<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--Created By Valusa -->
    <title>Event Details</title>
    <link rel="stylesheet" href="StyleSheet.css">
    <style type="text/css">
        .event-box {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f4f4f4;
        }
        body {
            margin-left: 20px;
            margin-right: 20px;
        }
        select {
            padding: 3px;
            margin-bottom: 10px;
        }
    </style>
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
    <h1>Event Details Lookup</h1>
    <form action="" method="POST">
        <label>Select Event Name: </label>
        <select id="eventselect" name="eventselect">
            <?php
            include("inc_eventsIntermediaryClass.php");
            $intClass = new BusinessTierClass();
            $result = $intClass->fillEventOptions();

            while ($row = $result->fetch_assoc()) {
                $selected = NULL;
                if (isset($_POST['submit']) && $_POST['eventselect'] == $row['eventName']) {
                    $selected = "selected";
                }
                echo "<option value=\"".$row['eventName']."\" ".$selected.">".$row['eventName']."</option>";
            }
            ?>
        </select>
        <input type="submit" value="submit" name="submit"/>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $eventName = $_POST['eventselect'];
        $result = $intClass->getEventData($eventName);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='event-box'>";
                echo "<strong>Event Name:</strong> " . $row['eventName'] . "<br>";
                echo "<strong>Date:</strong> " . date(($row['eventDate'])) . "<br>";
                echo "<strong>Time:</strong> " . date(($row['eventTime'])) . "<br>";
                echo "<strong>Location:</strong> " . $row['eventLocation'] . "<br>";
                echo "<strong>Description:</strong> " . $row['eventDescription'];
                echo "</div>";
            }
        } else {
            echo "<p>Error retrieving details: " . $intClass->error . "</p>";
        }
    }
    ?>
    <footer>
    <p>&copy; 2024 TechSphere Nexus. All rights reserved.</p>
</footer>
</body>
</html>
