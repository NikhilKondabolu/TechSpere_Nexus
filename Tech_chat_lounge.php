<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Created by Valusa -->
    <title>TechSphere Nexus - Homepage</title>
    <link rel="stylesheet" href="StyleSheet.css">
</head>
<body>
<header>
    <h1>Welcome to TechSphere Nexus</h1>
    <p>Unleash innovation and explore the nexus of technology with us!</p>
</header>
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
<h1>Tech Chat Lounge</h1>
<?php
if (isset($_POST['topic_submit'])) {
    $selected_topic = $_POST['topicselect'];
    $questions_answers = [
        'Artificial Intelligence' => [
            'What is Artificial Intelligence?' => 'AI is the simulation of human intelligence processed by machines.',
            'How is AI used in everyday life?' => 'AI is used in navigation apps, personal assistants, streaming services, and more.'
        ],
        'Machine Learning' => [
            'What is Machine Learning?' => 'Machine Learning is a field of AI that gives computers the ability to learn from data.',
            'How do machines learn?' => 'Machines learn by using algorithms to interpret data, make decisions, and improve over time.'
        ],
        'Cloud Computing' => [
            'What is Cloud Computing?' => 'Cloud Computing is the delivery of on-demand computing services over the internet.',
            'What are the benefits of Cloud Computing?' => 'Benefits include cost reduction, scalability, and accessibility from anywhere.'
        ],
        'Internet of Things' => [
            'What is the Internet of Things?' => 'IoT is the network of devices connected to the internet, sharing and collecting data.',
            'How does IoT affect privacy?' => 'IoT poses privacy risks through potential data breaches and unauthorized tracking.'
        ]
    ];

    echo "<h2>Questions about $selected_topic</h2>";
    foreach ($questions_answers[$selected_topic] as $question => $answer) {
        echo "<p><strong>$question</strong><br>$answer</p>";
    }
    echo "<form action='' method='POST'>
            <input type='hidden' name='selected_topic' value='$selected_topic'>
            <p>Was this helpful?</p>
            <input type='radio' name='feedback' value='Yes' id='yes'><label for='yes'>Yes</label>
            <input type='radio' name='feedback' value='No' id='no'><label for='no'>No</label>
            <input type='submit' value='Submit' name='feedback_submit'>
          </form>";
} else {
    echo "<form action='' method='POST'>
            <label>Select a Topic: </label>
            <select id='topicselect' name='topicselect'>
                <option value='Artificial Intelligence'>Artificial Intelligence</option>
                <option value='Machine Learning'>Machine Learning</option>
                <option value='Cloud Computing'>Cloud Computing</option>
                <option value='Internet of Things'>Internet of Things</option>
            </select>
            <input type='submit' value='submit' name='topic_submit'/>
          </form>";
}

if (isset($_POST['feedback_submit'])) {
    if ($_POST['feedback'] == 'Yes') {
        echo "<p>Thank you! Visit again.</p>";
    } else {
        // Display the form again with the error message
        echo "<form action='' method='POST'>
                <label>Name:</label>
                <input type='text' name='name' required>
                <label>Phone Number:</label>
                <input type='text' name='phone' required>
                <input type='submit' value='Submit' name='contact_submit'>
              </form>";
    }
}

if (isset($_POST['contact_submit'])) {
    // Include UserResponse.php
    include("UserResponse.php");

    // Get name and phone number from form
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Validate name and phone number
    if (strlen(trim($name)) > 0 && is_numeric($phone)) {
        // Create HelloWorldClass instance
        $welcomeInstance = new HelloWorldClass($name, $phone);
        // Get welcome message
        $message = $welcomeInstance->Welcome();
        // Display welcome message
        echo "<h3>$message</h3>";
    } else {
        // Display the form again with the error message
        echo "<form action='' method='POST'>
                <label>Name:</label>
                <input type='text' name='name' required>
                <label>Phone Number:</label>
                <input type='text' name='phone' required>
                <input type='submit' value='Submit' name='contact_submit'>
              </form>";
        
        // Display error message if validation fails
        echo "<h3>Invalid input: Enter your name and number correctly and try again!</h3>";
    }
}
?>
<footer>
    <p>&copy; 2024 TechSphere Nexus. All rights reserved.</p>
</footer>
</body>
</html>
