<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Base</title>
    <link rel="stylesheet" href="knowledgeStyleSheet.css">
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

    <div class="container">
        <h1>Technology Articles and Tutorials</h1>
        <label for="article-select">Select an Article:</label>
        <select id="article-select">
            <option value="">Select</option>
            <!-- Options will be added here using JavaScript function populateDropdown() -->
        </select>
        <div id="article-info">
            <h2 id="article-title"></h2>
            <p id="article-content"></p>
            <a id="tutorial-link" href="#" target="_blank">Link to Tutorial</a>
        </div>
    </div>

    <div class="faq-container">
        <h2>Frequently Asked Questions! </h2>
        <div class="faq-item">
            <div class="question">Question 1: What is TechSphereNexus?</div>
            <div class="answer">Answer 1: Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="faq-item">
            <div class="question">Question 2: Why do we do in TechSphereNexus?</div>
            <div class="answer">Answer 2: It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</div>
        </div>
        <div class="faq-item">
            <div class="question">Question 3: Where does it come from?</div>
            <div class="answer">Answer 3: Contrary to popular belief, Lorem Ipsum is not simply random text.</div>
        </div>
        <!-- Add more FAQ items as needed -->
    </div>


    <!-- Changing the Background Color of the page  -->
    <div id="color-selector">
        <label for="color"><b>Don't like the backgroundColor of this page? Change it here!!</b> </label>
        <input type="color" id="color" onchange="changeBackgroundColor()">
        <button id="reset-button" onclick="resetBackgroundColor()">Reset Color</button>
    </div>

    <script type="text/javascript" src="knowledgeJS.js"></script>
</body>
</html>