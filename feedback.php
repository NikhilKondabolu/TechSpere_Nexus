<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Created by Valusa -->
    <title>TechSphere Nexus - Homepage</title>
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

<?php
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    // Send response
    $submitted = true;
}

if ($submitted) {
    echo "<h3 id='thankYouMessage' style='text-align: center; font-weight: bold;'>$name, Thanks for your feedback!</h3>";
} else {
    echo "<form id='feedbackForm' action='' method='POST'>
            <h2>Feedback Form</h2>
            <label for='name'>Name:</label>
            <input type='text' id='name' name='name'>

            <label for='email'>Email:</label>
            <input type='text' id='email' name='email'>

            <p>
            <label for='message'>Message:</label>
            <textarea id='message' name='message'></textarea>
            </p>

            <input type='submit' value='Submit'>
        </form>";
}
?>

<footer>
    <p>&copy; 2024 TechSphere Nexus. All rights reserved.</p>
</footer>
</body>
</html>
