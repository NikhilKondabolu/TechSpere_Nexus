<!-- Using Session -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tech Trends Poll</title>
    <script type="text/javascript" src="play.js"></script>
    <style>
        .poll-container {
            margin: 10px auto;
            width: 2000px;
            text-align: left;
            text-align: center;
            table-layout: cent;
        }

        .poll-options {
            margin-bottom: 20px;
        }
        .poll-options input[type="radio"] {
            margin-right: 10px;
        }
        .poll-results {
            font-weight: bold;
        }
        #poll-table {
            display: none;
            margin: 0 auto;
        }
        #topicCountsBody {
            background-color: darkgray;
            font-weight: bold;
            border: 2px solid black;
        }
    </style>
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
    <div class="poll-container">
        <h2>What is the hottest technology trend right now?</h2>
        <form method="post">
            <div class="poll-options">
                <label><input type="radio" name="vote" value="AI"> Artificial Intelligence</label><br>
                <label><input type="radio" name="vote" value="ML"> Machine Learning</label><br>
                <label><input type="radio" name="vote" value="Cloud"> Cloud Computing</label><br>
                <label><input type="radio" name="vote" value="IoT"> Internet of Things</label><br><br>
            </div>
            <input type="submit" name="submit" value="Vote"><br><br>
        </form>

        <?php
        // Handle form submission
        if(isset($_POST['submit'])) {
            if(isset($_POST['vote'])) {
                $vote = $_POST['vote'];

                // Initialize session variables if not already set
                if(!isset($_SESSION['poll_votes'])) {
                    $_SESSION['poll_votes'] = [
                        'AI' => 0,
                        'ML' => 0,
                        'Cloud' => 0,
                        'IoT' => 0
                    ];
                }

                // Update vote count
                if(array_key_exists($vote, $_SESSION['poll_votes'])) {
                    $_SESSION['poll_votes'][$vote]++;
                }

                // Display poll results
                echo '<div class="poll-results">';
                echo '<h3>Poll Results:</h3>';
                foreach($_SESSION['poll_votes'] as $option => $count) {
                    echo $option . ': ' . $count . '<br>';
                }
                echo '</div>';
            } else {
                echo '<div class="poll-results">Please select an option to vote.</div>';
            }
        }
        ?>
        <p>Please visit the page "<a href="knowledge_base.php">Knowledge Base</a>", return to vote again, and repeat this process. Finally, check the final vote count to determine the current hottest technology trend, according to you.</p></br></br>
        <p>If you are unable to determine the current hottest technology trend, play a game to allow the system decide.  </p><input type="button" id="play" value="Play">   <input type="button" id="retry" value="Retry">
        </br></br></br>
        <table  id="poll-table">
            <thead><tr><td>Trail #</td><td>Topic</td></tr></thead>
            <tbody id="tablebody"></tbody>
            <tbody id="topicCountsBody"></tbody></table>
    </div>
    <footer>
        <p> &copy; 2024 TechSphere Nexus. All rights reserved. </p>
    </footer>
</body>
</html>
