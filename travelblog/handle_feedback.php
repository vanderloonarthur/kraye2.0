<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $selectedFeedback = filter_input(INPUT_POST, 'selectedFeedback', FILTER_SANITIZE_SPECIAL_CHARS);
    $additionalComments = filter_input(INPUT_POST, 'additionalComments', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($selectedFeedback !== false && $additionalComments !== false) {
        // Create the log entry
        $logEntry = date('Y-m-d H:i:s') . " - Feedback: " . $selectedFeedback . " - Comments: " . $additionalComments . PHP_EOL;
        $logFile = '/Users/arthurross/Desktop/kraye/travelblog/feedback.log'; // Ensure this path is correct and writable

        // Append the feedback to the log file
        if (file_put_contents($logFile, $logEntry, FILE_APPEND) === false) {
            // Handle error
            header("Location: /kraye/travelblog.html?status=error", true, 303);
            exit();
        }

        // Redirect to travelblog.html with a success status
        header("Location: /kraye/travelblog.html?status=success", true, 303);
        exit();
    } else {
        // Handle invalid input
        header("Location: /kraye/travelblog.html?status=invalid", true, 303);
        exit();
    }
} else {
    // Handle invalid request method
    header("Location: /kraye/travelblog.html?status=invalid_method", true, 303);
    exit();
}
?>
