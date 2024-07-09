<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $feedback = htmlspecialchars($_POST["feedback"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $additionalComments = htmlspecialchars($_POST["additional_comments"]);

    // Validate input (optional)
    // You can add validation logic here if required

    // Process the feedback (e.g., store in database, send email, etc.)
    // Replace this example with your actual processing logic

    // Example: Save feedback to a file
    $file = 'feedback.txt';
    $data = "Feedback: $feedback\nRating: $rating\nAdditional Comments: $additionalComments\n\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Respond with success message
    http_response_code(200);
    echo json_encode(array("message" => "Feedback received successfully."));
} else {
    // Respond with error if accessed directly
    http_response_code(403);
    echo json_encode(array("message" => "Forbidden - Access denied."));
}
?>
