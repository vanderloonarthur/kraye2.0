<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve input data
    $selectedFeedback = filter_input(INPUT_POST, 'selectedFeedback', FILTER_SANITIZE_SPECIAL_CHARS);
    $additionalComments = filter_input(INPUT_POST, 'additionalComments', FILTER_SANITIZE_SPECIAL_CHARS);

    // Define the log file path
    $logFile = __DIR__ . '/feedback.log';

    // Prepare the log entry
    $logEntry = sprintf(
        "%s - Feedback: %s - Comments: %s%s",
        date('Y-m-d H:i:s'),
        $selectedFeedback,
        $additionalComments,
        PHP_EOL
    );

    // Write feedback to the log file and redirect
    if ($selectedFeedback && $additionalComments && file_put_contents($logFile, $logEntry, FILE_APPEND)) {
        header("Location: ../travelblog.html?status=success", true, 303);
    } else {
        header("Location: ../travelblog.html?status=error", true, 303);
    }
    exit();
}

// Handle invalid request method
header("Location: ../travelblog.html?status=invalid_method", true, 303);
exit();
?>
