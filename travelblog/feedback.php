<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Feedback page for Arthur Ross's travel blog.">
    <title>Feedback - Reis door Europa met Arthur Ross!</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .feedback-container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .feedback-container h2 {
            margin-top: 0;
        }

        .feedback-container form {
            display: flex;
            flex-direction: column;
        }

        .feedback-container label {
            margin: 10px 0 5px;
        }

        .feedback-container select,
        .feedback-container textarea,
        .feedback-container button {
            padding: 10px;
            margin-bottom: 10px;
        }

        .feedback-container button {
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }

        .feedback-container button:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h2>Hoe blij bent u met de website?</h2>
        <form action="/kraye/travelblog/handle_feedback.php" method="POST">
            <label for="selectedFeedback">Select Feedback:</label>
            <select id="selectedFeedback" name="selectedFeedback" required>
                <option value="Zeer gelukkig">Zeer gelukkig</option>
                <option value="Gelukkig">Gelukkig</option>
                <option value="Neutraal">Neutraal</option>
                <option value="Ongelukkig">Ongelukkig</option>
                <option value="Zeer ongelukkig">Zeer ongelukkig</option>
            </select>
            <label for="additionalComments">Additional Comments:</label>
            <textarea id="additionalComments" name="additionalComments" rows="4" placeholder="Voer hier uw commentaar in..." required></textarea>
            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
