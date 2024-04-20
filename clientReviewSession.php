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
                    'review' => 'Great service! Very satisfied with the quality.Great service!',
                    'image' => 'images/image1.jpg'
                ),
                array(
                    'name' => 'Google',
                    'review' => 'Excellent company to work with. Highly recommended.',
                    'image' => 'images/image2.jpg',
                ),
                array(
                    'name' => 'IBM',
                    'review' => 'Outstanding support team. They helped me every step of the way.',
                    'image' => 'images/image2.jpg'
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