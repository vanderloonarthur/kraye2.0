<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $selectedFeedback = $_POST['selectedFeedback'];
    $additionalComments = $_POST['additionalComments'];
    
    // Here you would typically process and store the feedback
    // Example: Save to database, send email, etc.
    
    // For now, let's just print the received data
    echo "Feedback: $selectedFeedback\n";
    echo "Additional Comments: $additionalComments\n";
} else {
    // Handle other HTTP methods or direct access attempts gracefully
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>
