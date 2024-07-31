<?php
// No PHP code required here if it’s just for the HTML part
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Feedback page for Arthur Ross's travel blog.">
    <title>Feedback - Reis door Europa met Arthur Ross!</title>
    <style>
        :root {
            --background-color: black;
            --container-bg: #333;
            --button-bg: red;
            --button-hover-bg: green;
            --text-color: white;
            --box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .feedback-container {
            background-color: var(--container-bg);
            padding: 20px;
            border-radius: 10px;
            box-shadow: var(--box-shadow);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .feedback-container h2 {
            margin: 0;
        }

        .feedback-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .feedback-container label {
            text-align: left;
        }

        .feedback-container select,
        .feedback-container textarea,
        .feedback-container button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1em;
        }

        .feedback-container select,
        .feedback-container textarea {
            background-color: var(--container-bg);
            color: var(--text-color);
            border: 1px solid #444;
        }

        .feedback-container button {
            background-color: var(--button-bg);
            color: var(--text-color);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .feedback-container button:hover {
            background-color: var(--button-hover-bg);
        }

        @media (max-width: 600px) {
            .feedback-container {
                width: 90%;
                padding: 10px;
            }
        }

        .feedback-container select:focus,
        .feedback-container textarea:focus,
        .feedback-container button:focus {
            outline: 2px solid var(--button-bg);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h2>Hoe blij bent u met de website?</h2>
        <form action="https://arpross.com/travelblog/handle_feedback.php" method="POST">
            <fieldset id="feedback-form">
                <legend>Feedback Form</legend>
                <label for="selectedFeedback">Select Feedback:</label>
                <select id="selectedFeedback" name="selectedFeedback" required>
                    <option value="" disabled selected>-- Select an option --</option>
                    <option value="Zeer gelukkig">Zeer gelukkig</option>
                    <option value="Gelukkig">Gelukkig</option>
                    <option value="Neutraal">Neutraal</option>
                    <option value="Ongelukkig">Ongelukkig</option>
                    <option value="Zeer ongelukkig">Zeer ongelukkig</option>
                </select>
                <label for="additionalComments">Additional Comments:</label>
                <textarea id="additionalComments" name="additionalComments" rows="4" placeholder="Voer hier uw commentaar in..." required></textarea>
                <button type="submit">Submit Feedback</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
