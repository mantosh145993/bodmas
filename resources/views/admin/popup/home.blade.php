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
            display: none;
            /* Hidden by default */
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
            <h2>Book An Appointment</h2>
            <form>
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="number" name="number" placeholder="Your Number" required oninput="validateNumberInput(this)"> <br>
                <select name="state" required>
                    <option value="" disabled selected>Select Your State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Ladakh">Ladakh</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Puducherry">Puducherry</option>
                </select>
                <button type="submit">Reach Us</button>
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

        function validateNumberInput(input) {
            if (input.value.length > 12) {
                input.value = input.value.slice(0, 12);
            }
        }
    </script>

</body>

</html>

<style>
       
        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        form input, form select, form button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        form input:focus, form select:focus {
            border-color: #6200ea;
            box-shadow: 0 0 5px rgba(98, 0, 234, 0.2);
        }
        form button {
            background-color: #6200ea;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #3700b3;
        }
    </style>