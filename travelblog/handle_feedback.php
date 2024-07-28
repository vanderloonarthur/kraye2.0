<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedFeedback = htmlspecialchars($_POST['selectedFeedback']);
    $additionalComments = htmlspecialchars($_POST['additionalComments']);

    $logEntry = date('Y-m-d H:i:s') . " - Feedback: " . $selectedFeedback . " - Comments: " . $additionalComments . PHP_EOL;
    $logFile = 'feedback.log';

    if (is_writable($logFile)) {
        // Append the feedback to the log file
        file_put_contents($logFile, $logEntry, FILE_APPEND);

        $response = [
            'status' => 'success',
            'message' => 'Feedback submitted successfully!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Unable to write to log file.'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method.'
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
