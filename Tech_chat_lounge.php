<!--inc_QueryResults.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tech Chat Lounge</title>
    <!-- created by Kondabolu -->
    <link rel="stylesheet" href="StyleSheet.css">
    <style type="text/css">
        table {
            border: 1px solid black; border-collapse: collapse; padding: 3px; width:100%; margin-left: auto;  margin-right: auto;
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
    <h1>Tech Chat Lounge</h1>
    <form action="" method="POST">
        <span>
            <label>Select a Topic: </label>
            <select id="topicselect" name="topicselect[]" multiple>
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
        $id = $_POST['topicselect'];   
        if (!is_array($id)) {
            $id = array($id);
        }   
            $result = $intClass->getData($id);

        if ($result) {
            echo "</br></br>";
            echo "<table><tr><td>Topic</td><td>Title</td><td>Description</td><td>Pro_tip</td><td>Trick</td></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['topic']."</td>";
                echo "<td>".$row['post_title']."</td>";
                echo "<td>".$row['post_content']."</td>";
                echo "<td>".$row['pro_tip']."</td>";
                echo "<td>".$row['trick']."</td>";
            }
            echo "</table>";
        } else {
            echo $intClass->error;
        }
    }
    ?>
</body>
</html>
