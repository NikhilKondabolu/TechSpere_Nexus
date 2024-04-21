<?php
    // Created by Eswar Kandula. 
    // Start the session
    session_start();

    // Function to check if the reviews session variable exists, if not, initialize it with predefined reviews
    function initializeReviews() {
        if (!isset($_SESSION['client_reviews'])) {
            $_SESSION['client_reviews'] = array(
                array(
                    'name' => 'Amazon',
                    'review' => "Working with TechSphere_nexus has been a game-changer for our e-commerce operations. Their expertise in software development and cloud solutions helped us streamline our processes, improve scalability, and deliver a seamless shopping experience to our customers. The team's professionalism, commitment to quality, and innovative approach have made them a valuable partner in our journey towards continued growth and success.",
                    'image' => 'images/amazon.png'
                ),
                array(
                    'name' => 'Google',
                    'review' => 'TechSphere_nexus played a pivotal role in helping us tackle complex challenges and drive innovation across our platforms. Their deep understanding of Google Cloud technologies combined with their proactive approach to problem-solving has enabled us to optimize our infrastructure, enhance security, and deliver reliable services to our users. We highly recommend TechSphere_nexus to any organization seeking expert guidance and support in the digital space.',
                    'image' => 'images/google.png',
                ),
                array(
                    'name' => 'IBM',
                    'review' => "We've had the pleasure of collaborating with TechSphere_nexus on multiple projects, and each time, they have exceeded our expectations. Their team's technical proficiency, attention to detail, and ability to deliver results within tight deadlines have made them a trusted partner for IBM. Whether it's developing custom solutions, providing strategic consulting, or supporting our digital transformation initiatives, TechSphere_nexus consistently demonstrates a commitment to excellence that sets them apart in the industry.",
                    'image' => 'images/IBM.jpeg'
                )
            );
        }
    }

    // Function to add a review to the session
    function addReviewToSession($name, $review, $image) {
        initializeReviews();
        array_push($_SESSION['client_reviews'], array(
            'name' => $name,
            'review' => $review,
            'image' => $image
        ));
    }

    // Check if the form is submitted and add the review to the session
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $review = $_POST['review'];
        $image =  !empty($_POST['image'])? $_POST['image'] : 'images/image2.jpg'; // Default image if none provided
        addReviewToSession($name, $review, $image);
        
        // Redirect to prevent form resubmission on refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    // Initialize reviews at the start of the session
    initializeReviews();
?>