<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
#popupForm {
    display: none; /* Initially hidden */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: maroon; /* Light gray for a clean and neutral background */
    color: #212529; /* Dark gray text for excellent readability */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Subtle shadow for professionalism */
    padding: 30px; /* Spacing inside the form */
    z-index: 1000;
    width: 90%; /* Responsive width */
    max-width: 400px; /* Maximum width */
    border-radius: 8px; /* Slightly rounded corners for a professional touch */
    animation: fadeIn 0.5s ease-out; /* Smooth fade-in effect */
    font-family: 'Roboto', 'Arial', sans-serif; /* Clean and modern font */
    text-align: left; /* Left-aligned text */
    border: 1px solid #dee2e6; /* Light border for subtle definition */
}

        #popupForm h5 {
            color: #ffffff;
            text-align: center;
        }

        #popupOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        button[type="submit"] {
            display: inline-block;
            width: 100%;
            /* Full width for a unified look */
            padding: 12px 20px;
            /* Balanced padding */
            background: linear-gradient(135deg, #0D5EF4, #0B4EC8);
            /* Gradient background */
            color: #ffffff;
            /* White text for contrast */
            font-size: 16px;
            /* Readable font size */
            font-weight: bold;
            /* Emphasize text */
            text-transform: uppercase;
            /* Capitalize text */
            border: none;
            /* No border */
            border-radius: 8px;
            /* Smooth rounded corners */
            cursor: pointer;
            /* Pointer on hover */
            transition: background 0.3s ease, transform 0.2s ease;
            /* Smooth hover and click effects */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
        }

        /* Hover Effect */
        button[type="submit"]:hover {
            background: linear-gradient(135deg, #0B4EC8, #0941A6);
            /* Darker gradient on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* More prominent shadow */
        }

        /* Active (Click) Effect */
        button[type="submit"]:active {
            transform: scale(0.98);
            /* Slightly reduce size for a "pressed" effect */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            /* Reduce shadow */
        }
    </style>
</head>

<body>
    <div id="popupOverlay"></div>
    <div id="popupForm">
        <h4>Reach Us</h4>
        <form id="enquiryForm">
            @csrf
            <div>
                <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
            </div>
            <div>
                <input type="email" id="email" name="email" placeholder="Enter Your Mail*" required>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control style-white" name="number" id="number" placeholder="Phone Number*" required pattern="[0-9]{10}">
            </div>
            <div class="form-group">
                <select name="subject" id="subject" class="form-select style-white" required>
                    <option value="" disabled selected hidden>Select Course*</option>
                    <option value="mbbs">MBBS</option>
                    <option value="bds">BDS</option>
                    <option value="bums">BUMS</option>
                    <option value="bhms">BHMS</option>
                </select>
            </div>
            <div>
                <textarea id="message" name="message" placeholder="Enter Your Message" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('popupOverlay').style.display = 'block';
            document.getElementById('popupForm').style.display = 'block';
        }, 4000);

        document.getElementById('popupOverlay').addEventListener('click', () => {
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('popupForm').style.display = 'none';
        });

        document.getElementById('enquiryForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);
            const response = await fetch("{{ route('enquiry.contact') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            if (response.ok) {
                alert("Enquiry submitted successfully!");
                document.getElementById('popupOverlay').style.display = 'none';
                document.getElementById('popupForm').style.display = 'none';
            } else {
                alert("Failed to submit enquiry. Please try again.");
            }
        });
    </script>
</body>

</html>