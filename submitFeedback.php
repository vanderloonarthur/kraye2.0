<?php
// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the additionalComments field is set and not empty
    if (isset($_POST['additionalComments']) && !empty($_POST['additionalComments'])) {
        // Sanitize input to prevent XSS attacks
        $additionalComments = htmlspecialchars($_POST['additionalComments']);
        
        // Process other feedback data as needed (e.g., selected feedback option)
        $selectedFeedback = isset($_POST['selectedFeedback']) ? htmlspecialchars($_POST['selectedFeedback']) : '';
        
        // You can process the feedback here (store in database, send via email, etc.)
        // For demonstration, we'll just log it to a file
        
        $logFile = 'feedback.log';
        $logData = date('Y-m-d H:i:s') . " - Feedback: $selectedFeedback, Additional Comments: $additionalComments" . PHP_EOL;
        
        // Append to the log file
        file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
        
        // Return a success message or redirect back to the page
        echo json_encode(['success' => true, 'message' => 'Feedback received successfully.']);
        exit;
    } else {
        // Handle if additionalComments field is empty
        echo json_encode(['success' => false, 'message' => 'Please provide additional comments.']);
        exit;
    }
} else {
    // Handle if it's not a POST request
    http_response_code(405); // Method Not Allowed
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}
?>
