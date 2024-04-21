<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tech Chat Lounge</title>
    <!-- created by Kondabolu -->
    <style type="text/css">
        table {
            border: 1px solid black; border-collapse: collapse; padding: 3px; width:50%; margin-left: auto;  margin-right: auto;
        }
        th, td {
            border: 1px solid black; border-collapse: collapse; }
        td { padding: 5px; }
        body {
            margin-left: 20px;
            margin-right: 20px;
        }
        select {
            padding: 3px;
        }
    </style>
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
            <select id="topicselect" name="topicselect">
                <?php
                include("Inc_IntermediaryClass.php");
                $intClass = new BusinessTierClass();
                $result = $intClass->filloptions();

                while ($row = $result->fetch_assoc()) {
                    $selected = NULL;
                    if (isset($_POST['submit'])) {
                        if ($_POST['topicselect'] == $row['topic']) {
                            $selected = "selected";
                        }
                    }
                    echo "<option value=".$row['topic']." ".$selected.">".$row['topic']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="submit" name="submit"/>
        </span>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['topicselect']; // Corrected variable name
        $result = $intClass->getData($id); // Corrected variable name

        if ($result) {
            echo "</br></br>";
            echo "<table><tr><td>Topic</td><td>Description</td><td>Description</td><td>Pro_tip</td><td>Trick</td></tr>";

            while ($row = $result->fetch_assoc()) { // Corrected method name
                echo "<tr>";
                echo "<td>".$row['topic']."</td>";
                echo "<td>".$row['post_title']."</td>";
                echo "<td>".$row['post_content']."</td>";
                echo "<td>".$row['pro_tip']."</td>";
                echo "<td>".$row['trick']."</td>";
            }
            echo "</table>";
        } else {
            echo $intClass->error; // Added missing arrow (->) operator
        }
    }
    ?>
</body>
</html>
