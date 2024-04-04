<!-- Using Session -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tech Trends Poll</title>
    <style>
        .poll-container {
            margin: 50px auto;
            width: 400px;
            text-align: center;
        }
        .poll-container h2 {
            margin-bottom: 20px;
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
    </style>
</head>
<body>
    <div class="poll-container">
        <h2>What is the hottest technology trend right now?</h2>
        <form method="post">
            <div class="poll-options">
                <label><input type="radio" name="vote" value="AI"> Artificial Intelligence</label><br>
                <label><input type="radio" name="vote" value="ML"> Machine Learning</label><br>
                <label><input type="radio" name="vote" value="Cloud"> Cloud Computing</label><br>
                <label><input type="radio" name="vote" value="IoT"> Internet of Things</label><br>
            </div>
            <input type="submit" name="submit" value="Vote">
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
    </div>
</body>
</html>
