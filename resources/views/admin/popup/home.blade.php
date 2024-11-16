<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <style>
        /* Background overlay for popup */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;  /* Hidden by default */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Popup container */
        .popup-content {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }

        /* Close button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        /* Form styles */
        .popup-content h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .popup-content input[type="text"],
        .popup-content input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .popup-content button {
            padding: 10px 20px;
            background-color: #0d5ef4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .popup-content button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <!-- Popup Overlay and Content -->
    <div class="popup-overlay" id="popupForm">
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Subscribe to Our Newsletter</h2>
            <form>
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <script>
        // Show popup after 10 seconds
        window.onload = function() {
            setTimeout(showPopup, 10000); // 10000 ms = 10 seconds
        };

        // Function to display the popup
        function showPopup() {
            document.getElementById("popupForm").style.display = "flex";
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>

</body>
</html>
