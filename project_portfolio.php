<?php
    include('clientReviewSession.php')
?>

<!-- Created By Eswar Kandula -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Portfolio</title>
    <link rel="stylesheet" href="portStyleSheet.css">
</head>
<body>
    <nav>
        <a href="HomePage.html">Home</a>
        <a href="about.html">About Us</a>
        <a href="service_inquiry.php"> Service Inquiry </a>
        <a href="project_portfolio.php"> Project Portfolio</a>
        <a href="tech_trends_poll.php"> Tech Trends Poll</a>
        <a href="tech_chat_lounge.php"> Tech Chat Lounge </a>
        <a href="knowledge_base.php"> Knowledge Base </a>
        <a href="career_opportunities.php"> Career Opportunities</a>
        <a href="event_calendar.php"> Event Calendar</a>
        <a href="feedback.php"> Feedback </a>
    </nav>
    <h1>Project Portfolio of TechSphere_Nexus</h1>

    <div class="container">
        <h2>Recent Accomplishments from Us!</h2>

        <div class="project">
            <img src="./images/image1.jpg" alt="Project 1">
            <h2>Project 1</h2>
            <p>Description of Project 1 goes here.</p>
            <p><b>Technologies used:</b> </p>
        </div>

        <div class="project">
            <img src="./images/image2.jpg" alt="Project 2">
            <h2>Project 2</h2>
            <p>Description of Project 2 goes here.</p>
            <p><b>Technologies used:</b> </p>
        </div>

        <div class="project">
            <img src="./images/image1.jpg" alt="Project 3">
            <h2>Project 3</h2>
            <p>Description of Project 3 goes here.</p>
            <p><b>Technologies used:</b> </p>
        </div>
    </div>

    <div id="client-reviews">
        <h2>Clients Testimonials</h2>
        <ul id="reviews-list">
            <?php
            // Loop through session reviews and display them
            foreach ($_SESSION['client_reviews'] as $review) {
                echo '<li>';
                echo '<img src="' . $review['image'] . '" alt="' . $review['name'] . '">';
                echo '<strong>' . $review['name'] . '</strong>: ' . $review['review'];
                echo '</li>';
            }
            ?>
        </ul>

        <br>
        <!-- Button to toggle the form for adding a review -->
        <button id="add-review-btn">Add Review</button>

        <!-- Form to add a review -->
        <form id="add-review-form" style="display: none;" method="post">
            <input type="text" name="name" placeholder="Your Company name" required><br>
            <textarea name="review" placeholder="Your review" required></textarea><br>
            <input type="text" name="image" placeholder="Image URL (optional)"><br>
            <input type="submit" name="submit" value="Submit Review">
        </form>
    </div>

    <!-- JS to toggle the form -->
    <script>
        document.getElementById('add-review-btn').addEventListener('click', function() {
            document.getElementById('add-review-form').style.display = 'block'; // changing the display from none to block.
        });
    </script>


    <h2>Need an Estimate for your Project? </h2>
    <form action="incResultEstimation.php" method="POST">
        <p>
            <label for="nameTextBox">Please enter your Project name</label>
            <input type="text" name="nameTextBox" id="nameTextBox" >
        </p>
        <p>
            <label for="projSelect">Select Type of Project</label>
            <select name="projectSelect" id="projSelect">
                <option value="webDesign">Web Design</option>
                <option value="webDevelopment">Web Development</option>
                <option value="mobileApp">Mobile Application</option>
                <option value="graphicDesign">Graphic Design</option>
            </select>
        </p>
        <p>Select the requirements for your Project</p>

        <input type="checkbox" id="frontend" name="req[]" value="Frontend (HTML, CSS, JavaScript)">
        <label for="frontend">Frontend (HTML, CSS, JavaScript)</label><br>
        
        <input type="checkbox" id="backend" name="req[]" value="Backend (PHP, Java, Python, Ruby)">
        <label for="backend">Backend (PHP, Java, Python, Ruby)</label><br>
        
        <input type="checkbox" id="database" name="req[]" value="Databases (MySQL, MongoDB, PostgreSQL, Cassandra )">
        <label for="database">Databases (MySQL, MongoDB, PostgreSQL, Cassandra )</label><br>
        
        <input type="checkbox" id="fullstack" name="req[]" value="FullStack [Frontend (HTML, CSS, JavaScript)+Backend (PHP, Java, Python, Ruby)]">
        <label for="fullstack">FullStack (Frontend+Backend)</label><br>

        <p>
            <label> Enter the Duration in Number of Days for project completion:</label>
            <input type="number" name="durationTextBox" min="10" max="50" required>
        </p>

        <p>
            <label> Enter the $ per hour:</label>
            <input type="number" name="priceTextBox" min="20" max="40" required>
        </p>

        <p>
            <input type="submit" name="submitButton" value="Calculate Cost" id="cost">
        </p>
   
    </form>

<!-- created by Eswar   -->
    
</body>
</html>