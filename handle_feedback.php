---
title: Gallery
layout: collection
permalink: /travelblog.html
collection: recipes
excerpt: "Baz Boom design system including logo mark, website design, and branding applications."
sidebar:
  - title: "Arthur Robert Pieter Ross"
    image: /assets/images/top_hat.jpeg
    image_alt: "Huldiging Diok"
    text: "Globetrotter"
---
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reis door Europa met Arthur Ross! Ontdek de schoonheid van Europa met deze boeiende reisverhalen.">
    <title>Gallery - Reis door Europa met Arthur Ross!</title>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HB19E314J8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-HB19E314J8');
    </script>
    <!-- Styling -->
    <style>
        body {
            color: red;
            background-color: black;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .image-item {
            overflow: hidden;
            border: 2px solid green;
            transition: border-color 0.3s;
        }
        .image-item img {
            width: 100%;
            height: auto;
            border: 2px solid transparent;
            transition: transform 0.3s ease-in-out, border-color 0.3s;
        }
        .image-item:hover img {
            transform: scale(1.1);
            border-color: white;
        }
        .image-caption {
            text-align: center;
            margin-top: 10px;
            color: green;
        }
        .golden-link {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        .golden-link:hover {
            text-decoration: underline;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #f8f8f8;
            color: #333;
            padding: 20px;
            border: 1px solid #888;
            max-width: 800px;
            border-radius: 5px;
            text-align: center;
            position: relative;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }
        .close:hover {
            color: black;
        }
        .feedback-text {
            color: #FFD700;
        }
        @media only screen and (max-width: 768px) {
            .image-gallery {
                grid-template-columns: 1fr;
            }
            .modal-content {
                width: 90%;
            }
        }
        .selected-feedback {
            background-color: #FFD700 !important;
        }
    </style>
</head>

<body>
    <div class="image-gallery">
        <!-- Gallery Items -->
        <div class="image-item">
            <a href="{{ site.baseurl }}/kraye/posts/milaan.html" class="golden-link">
                <img src="{{ site.baseurl }}/assets/images/il_duomo.jpeg" alt="Milaan">
                <div class="image-caption">
                    <p>Naar Milaan zonder geld of plan [mei 2016]</p>
                </div>
            </a>
        </div>
        <div class="image-item">
            <a href="{{ site.baseurl }}/kraye/posts/madrid.html" class="golden-link">
                <img src="{{ site.baseurl }}/assets/images/bear-1.jpg" alt="Madrid">
                <div class="image-caption">
                    <p>Vincent van Gogh achterna [juni/ juli 2020]</p>
                </div>
            </a>
        </div>
        <div class="image-item">
            <a href="{{ site.baseurl }}/kraye/posts/stuttgart.html" class="golden-link">
                <img src="{{ site.baseurl }}/assets/images/stag3.jpeg" alt="Stuttgart">
                <div class="image-caption">
                    <p>Marshall Stuttgart [december 2020]</p>
                </div>
            </a>
        </div>
        <div class="image-item">
            <a href="{{ site.baseurl }}/kraye/posts/edinburgh.html" class="golden-link">
                <img src="{{ site.baseurl }}/assets/images/Edinburgh.webp" alt="Edinburgh">
                <div class="image-caption">
                    <p>D'Arthur is coming home! [april 2024]</p>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Feedback Button -->
    <button onclick="openModal()">Geef Feedback</button>
    
    <!-- Feedback Modal -->
    <div id="feedback-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Hoe blij bent u met de website?</h2>
            <!-- PHP Feedback Form -->
            <?php
            // Define variables for feedback and comments
            $selectedFeedback = '';
            $additionalComments = '';
            $successMessage = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'])) {
                // Sanitize and process feedback data
                $selectedFeedback = isset($_POST['selectedFeedback']) ? htmlspecialchars($_POST['selectedFeedback']) : '';
                $additionalComments = isset($_POST['additionalComments']) ? htmlspecialchars($_POST['additionalComments']) : '';

                // Example: Log to a file
                $logFile = 'feedback.log';
                $logData = date('Y-m-d H:i:s') . " - Feedback: $selectedFeedback, Additional Comments: $additionalComments" . PHP_EOL;
                
                // Append to log file (create if not exists)
                file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);

                // Set success message
                $successMessage = "Bedankt voor uw feedback!";
            }
            ?>
            <!-- Display success message if set -->
            <?php if (!empty($successMessage)) : ?>
                <div style="color: green; font-weight: bold;"><?php echo $successMessage; ?></div>
            <?php endif; ?>
            
            <!-- Form to submit feedback -->
            <form id="feedbackForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div id="feedback-buttons">
                    <button type="button" onclick="selectFeedback(this, 'Zeer gelukkig', '😃')" aria-label="Zeer gelukkig">Zeer gelukkig 😃</button>
                    <button type="button" onclick="selectFeedback(this, 'Gelukkig', '😊')" aria-label="Gelukkig">Gelukkig 😊</button>
                    <button type="button" onclick="selectFeedback(this, 'Neutraal', '😐')" aria-label="Neutraal">Neutraal 😐</button>
                    <button type="button" onclick="selectFeedback(this, 'Ongelukkig', '😞')" aria-label="Ongelukkig">Ongelukkig 😞</button>
                    <button type="button" onclick="selectFeedback(this, 'Zeer ongelukkig', '😢')" aria-label="Zeer ongelukkig">Zeer ongelukkig 😢</button>
                </div>
                <div>
                    <label for="additionalComments">Kritiek:</label><br>
                    <textarea id="additionalComments" name="additionalComments" rows="4" placeholder="Voer hier uw commentaar in..."><?php echo $additionalComments; ?></textarea>
                </div>
                <input type="hidden" id="selectedFeedback" name="selectedFeedback" value="<?php echo htmlspecialchars($selectedFeedback); ?>">
                <button type="submit" name="feedback">Plaats kritiek</button>
            </form>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollUpBtn" onclick="scrollToTop()" aria-label="Scroll naar boven">Scroll naar boven</button>

    <!-- JavaScript -->
    <script>
        function openModal() {
            document.getElementById("feedback-modal").style.display = "flex";
        }
        function closeModal() {
            document.getElementById("feedback-modal").style.display = "none";
            // Clear selected feedback and additional comments after modal closes
            document.querySelectorAll('#feedback-buttons button').forEach(function (btn) {
                btn.classList.remove('selected-feedback');
            });
            document.getElementById('additionalComments').value = '';
        }
        function selectFeedback(button, feedback, reaction) {
            document.querySelectorAll('#feedback-buttons button').forEach(function (btn) {
                btn.classList.remove('selected-feedback');
            });
            button.classList.add('selected-feedback');
            document.getElementById('selectedFeedback').value = feedback; // Set hidden input value
            console.log('Geselecteerde Feedback:', feedback, 'Reactie:', reaction);
        }
        function submitFeedback() {
            // JavaScript form submission to stay on the same page
            var form = document.getElementById('feedbackForm');
            var formData = new FormData(form);

            // Example: AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open(form.method, form.action, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Handle success message or other actions if needed
                    alert('Bedankt voor uw feedback!');
                    closeModal(); // Close modal after successful submission
                } else {
                    // Handle errors or display error messages
                    alert('Er is een fout opgetreden. Probeer het later opnieuw.');
                }
            };
            xhr.send(formData);
        }
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        window.onscroll = function () {
            var scrollUpBtn = document.getElementById("scrollUpBtn");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollUpBtn.style.display = "block";
            } else {
                scrollUpBtn.style.display = "none";
            }
        };
    </script>
</body>
</html>
